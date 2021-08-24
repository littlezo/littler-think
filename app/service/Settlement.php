<?php

/**
 * #logic 做事不讲究逻辑，再努力也只是重复犯错
 * ## 何为相思：不删不聊不打扰，可否具体点：曾爱过。何为遗憾：你来我往皆过客，可否具体点：再无你。
 * ## 只要思想不滑稽，方法总比苦难多！
 * @version 1.0.0
 * @author @小小只^v^ <littlezov@qq.com>  littlezov@qq.com
 * @contact  littlezov@qq.com
 * @see     https://github.com/littlezo
 * @document https://github.com/littlezo/wiki
 * @license  https://github.com/littlezo/MozillaPublicLicense/blob/main/LICENSE
 */

declare(strict_types=1);

namespace app\service;

use app\model\Config;
use Exception;
use little\member\model\Balance;
use little\member\model\Days;
use little\member\model\Flowing;
use little\member\model\FlowingLock;
use little\member\model\Level;
use little\member\model\Spl;
use little\member\model\User;
use little\order\model\Detail;
use littler\annotation\Inject;
use littler\exceptions\FailedException;

class Settlement
{
	/**
	 * 订单.
	 * @Inject()
	 * @var Detail
	 */
	protected $order;

	// /**
	//  * 订单锁
	//  * @Inject()
	//  * @var FlowingLock
	//  */
	// protected $lock;

	/**
	 * 日流水.
	 * @Inject()
	 * @var Days
	 */
	protected $days;

	/**
	 * 流水.
	 * @Inject()
	 * @var Flowing
	 */
	protected $flowing;

	/**
	 * 余额记录.
	 * @Inject()
	 * @var Balance
	 */
	protected $balance;

	/**
	 * 会员.
	 * @Inject()
	 * @var User
	 */
	protected $member;

	/**
	 * 会员等级.
	 * @Inject()
	 * @var Level
	 */
	protected $level;

	/**
	 * 服务商等级.
	 * @Inject()
	 * @var Spl
	 */
	protected $spl;

	/**
	 * 配置.
	 * @Inject()
	 * @var Config
	 */
	protected $config;

	/**
	 * 自动升级.
	 * @return bool
	 */
	public function autoUpgrade()
	{
		$s = microtime(true);
		// foreach ($list = $this->member->order('id', 'desc')->column('id') as $item) {
		// $this->upgrade($item);
		// $upgrade[] = [$item => $this->upgrade($item)];
		// }
		$e = microtime(true);
		// $upgrade[] = '耗时' . round($s - $e, 3) . '秒';
		return '耗时' . round($s - $e, 3) . '秒';
	}

	/**
	 * 自动结算.
	 * @return bool
	 */
	public function auto()
	{
		$t1 = microtime(true);
		$this->order->startTrans();
		try {
			// 已结算订单
			$orders = $this->order->order('order_id', 'desc')
			->where([['order_detail->is_spl', '=', 1], ['is_lock', '=', 0], ['member_id', '<=', 60]])
			->field('order_id,member_id,order_type,pay_money,order_detail')
			->select();
			$t2 = microtime(true);
			return $this->lvDiff($orders);
			return '耗时' . round($t2-$t1, 3) . '秒';
		} catch (\Throwable $e) {
			// throw new FailedException($e->getMessage(), $e->getCode(), $e);
			throw new Exception($e->getMessage(), $e->getCode(), $e);
		}
	}

	/**
	 * 级差结算.
	 *
	 * @return void
	 */
	private function lvDiff(array|object $orders)
	{
		foreach ($orders as $order) {
			// return $orders;
			$parents = $this->getParents($order->member_id, $this->member->where('id', $order->member_id)->value('parent'));
			if ($parents) {
				$result = $this->lookupDiff($parents[0], 1, $order);
				foreach ($result as $item) {
					$flowing = new Flowing();
					$days = new Days();
					$flowing->storeBy($item);
					$record = $days->whereDay('create_time')->where('member_id', $item['member_id'])->find();
					if (! $record) {
						$days->storeBy($item);
					} else {
						$days->updateBy($record['member_id'], [
							'money' => $record['money'] + $item['money'],
							'cash' => $record['cash'] + $item['cash'],
							'deduct' => $record['deduct'] + $item['deduct'],
						]);
					}
				}
				return $result;
			}
			// $order->is_lock = 1;
			// $order->save();
		}
	}

	/**
	 * 查找级差.
	 *
	 * @param mixed $tree
	 * @param mixed $current
	 * @param mixed $order
	 * @return array
	 */
	private function lookupDiff($tree, $current, $order, float $ratio = 0.00, $result = [])
	{
		// 配置
		$config = $this->config->getConfig();
		if ($tree['spl_id'] >= $current) {
			// return $tree;
			$next = $this->spl->where('parent', $tree['spl_id'])->value('id');
			$real_ratio = (float) $tree['spl']['ratio'] - (float) $ratio;
			$money  =(float) round((float) $order['pay_money'] * $real_ratio);
			$member = $this->member->where('id', $order->member_id)->field('nickname,mobile,level_id')->find();
			$result[] = [
				'member_id' => $tree['id'],
				'order_id' =>  $order['order_id'],
				'orig_money' => (float) $order['pay_money'],
				'ratio' => $real_ratio,
				'money' => round($money * (float) $config['income_balance_scale'], 2),
				'cash' => round($money *  (float) $config['income_cash_scale'], 2),
				'deduct' => round(($money *  (float) $config['income_deduction_scale']) / (float) $member['level']['buy_ratio'], 2),
				'remarks' => "来自[{$member['nickname']}/{$member['mobile']}]的{$tree['spl']['name']}分润",
			];
			if ($tree['children'] ?? false) {
				$subsidy = $this->subsidy($tree['children'][0], (float) $money, $order['order_id'], $tree['nickname'] . '/' . $tree['mobile']);
				if ($subsidy) {
					$result = array_merge($result, $subsidy);
				}
				return $this->lookupDiff($tree['children'][0], $next, $order, (float) $tree['spl']['ratio'] ?? $ratio, $result);
			}
		} elseif ($tree['children'] ?? false) {
			return $this->lookupDiff($tree['children'][0], $current, $order, $ratio, $result);
		}
		return $result;
	}

	private function subsidy($tree, $money, $order_id, $remarks, $lv = 1, $result = [], )
	{
		$current = $this->spl->find($tree['spl_id']);
		if ($lv > 3) {
			return $result;
		}
		if ($current) {
			switch ($lv) {
				case 1:
					$text = '一级';
					$ratio = (float) $current->subsidy_one;
					break;
				case 2:
					$text = '二级';
					$ratio =  (float) $current->subsidy_tow;
					break;
				case 3:
					$text = '三级';
					$ratio =  (float) $current->subsidy_three;
					break;
				default:
					break;
			}
			$result[] = [
				'member_id' => $tree['id'],
				'order_id' =>  $order_id,
				'orig_money' => $money,
				'ratio' => $ratio,
				'cash' => 0,
				'deduct' => 0,
				'money' => (float) round($money * $ratio),
				'remarks' => "来自[$remarks]的{$text}津贴",
			];
			if ($tree['children'] ?? false) {
				return $this->subsidy($tree['children'][0], $money, $order_id, $tree['nickname'] . '/' . $tree['mobile'], ++$lv, $result);
			}
		} elseif ($tree['children'] ?? false) {
			return $this->subsidy($tree['children'][0], $money, $order_id, $tree['nickname'] . '/' . $tree['mobile'], ++$lv, $result);
		}
		return $result;
	}

	/**
	 * 获取父级.
	 * lookup.
	 * @return array
	 */
	private function getParents(int $id, int $parent)
	{
		// 获取父级ID合集 不包含自己
		$ids = array_unique($this->member->select()->getAllChildrenIds([$id], 'id', 'parent'));
		// 获取父级树
		$parent_tree = $this->member->withOnlyRelation('spl')
			->where([['id', 'in', $ids]])
			->field('id,level_id,nickname,mobile,parent,spl_id,spl_status')
			->select()
			->toTree($parent, 'parent', 'id');
		return $parent_tree;
	}

	/**
	 * 会员升级.
	 *
	 * @return void
	 */
	private function upgrade($id)
	{
		if (! $id) {
			return;
		}
		// 获取团队ID合集 不包含自己
		$ids = $this->member->select()->getAllChildrenIds([$id], 'parent', 'id');

		$ids = array_unique($ids);
		// 获取会员信息
		$info =  $this->member->where('id', $id)->field('id,level_id,parent,mobile,nickname,username,spl_id,spl_status,status')->find();
		//  $this->upgrade($info->parent);
		if (! $info) {
			return '未找到用户';
		}
		$info->member_map = $this->teamCount($id);
		$info->spl_map = $this->splCount($id);

		// 获取下一等级
		$next_level = $this->spl->where('parent', $info->spl_id)->find();
		if (! $next_level) {
			return '等级上限';
		}
		// 获取团队树
		$team_tree = $this->member->where([['id', 'in', $ids]])->field('id,level_id,parent,spl_id,spl_status')->select()->toTree($id);
		// 等级是否满足条件
		if (! ($next_level->user_level === $info->level_id)) {
			return '等级条件不满足';
		}
		// 团队是否满足条件
		if (! $this->verifyTeam($next_level->market_sum, $info)) {
			return '团队条件不满足';
		}
		// 市场是否满足条件
		if (! $this->verifyMarket($next_level->market, $team_tree)) {
			return '市场条件不满足';
		}
		if ($this->member->updateBy($id, ['spl_id' => $next_level->id])) {
			return $this->upgrade($id);
		}
		return $info;
	}

	/**
	 * 团队验证
	 *
	 * @param mixed $id
	 * @return \littler\ModelCollection|null
	 */
	private function verifyTeam($next_level, $info)
	{
		// 市场是否满足条件
		$type = $next_level['type'] ?? false;
		$key = $next_level['key'] ?? false;
		$value = $next_level['value'] ?? false;
		$map = [];
		if ($type && $key && $value) {
			foreach ($info[$type . '_map'] as $item) {
				$map[$item['key']] = $item;
			}
		}
		if ($this->diffCount($map, $key) >= (int) $value) {
			return true;
		}
		return false;
	}

	/**
	 * 市场验证
	 *
	 * @param mixed $id
	 * @return \littler\ModelCollection|null
	 */
	private function verifyMarket($next_level, $team_tree)
	{
		// 市场是否满足条件
		$type = $next_level['type'] ?? false;
		$key = $next_level['key'] ?? false;
		$value = $next_level['value'] ?? false;
		if (count($team_tree) < (int) $value) {
			return false;
		}
		$stepping = 0;
		$is_adopt = true;
		if ($type && $key && $value) {
			$is_adopt = false;
			$maps = [];
			foreach ($team_tree as $item) {
				$item['member_map'] = $this->teamCount($item['id'], true);
				$item['spl_map'] = $this->splCount($item['id'], true);
				$map = [];
				foreach ($item[$type . '_map'] as $info) {
					$map[$info['key']] = $info;
				}
				$maps[$item['id']] = $item[$type . '_map'];
				if ($this->diffCount($map, $key) >= 1) {
					++$stepping;
				}
				if ($stepping >= (int) $value) {
					$is_adopt = true;
					continue;
				}
			}
		}
		return $is_adopt;
	}

	private function diffCount($map, $parent = 0, $value = 0)
	{
		if ($map[$parent] ?? false) {
			return $this->diffCount($map, $map[$parent]['parent'], $value + $map[$parent]['value']);
		}
		return $value;
	}

	/**
	 * 团队总数.
	 *
	 * @return void
	 */
	private function teamCount($id, $self = false): ?array
	{
		// 获取团队ID合集
		$ids = array_unique($this->member->select()->getAllChildrenIds([$id], 'parent', 'id'));
		if ($self) {
			$ids = [$id, ...$ids];
		}
		return $this->level->order('level_id', 'asc')->field('level_id')->select()->each(function ($item) use ($ids) {
			$item->key = $item->level_id;
			$item->value = $this->member->whereIn('id', $ids)->order('level_id', 'asc')->where('level_id', $item->level_id)->count();
			$item->parent = $this->level->where('parent', $item->level_id)->value('level_id');
			unset($item->level_id);
		})->toArray();
	}

	/**
	 * 服务商总是.
	 *
	 * @return void
	 */
	private function splCount($id, $self = false): ?array
	{
		// 获取团队ID合集
		$ids = array_unique($this->member->select()->getAllChildrenIds([$id], 'parent', 'id'));
		if ($self) {
			$ids = [$id, ...$ids];
		}
		return $this->spl->order('id', 'asc')->field('id,parent')->select()->each(function ($item) use ($ids) {
			$item->key = $item->id;
			$item->value = $this->member->whereIn('id', $ids)->order('level_id', 'asc')->where('spl_id', $item->id)->count();
			$item->parent = $this->spl->where('parent', $item->id)->value('id');
			unset($item->id);
		})->toArray();
	}
}
