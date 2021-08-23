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
use little\member\model\Balance;
use little\member\model\Days;
use little\member\model\Flowing;
use little\member\model\FlowingLock;
use little\member\model\Level;
use little\member\model\Spl;
use little\member\model\User;
use little\order\model\Detail;
use littler\annotation\Inject;

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
		foreach ($list = $this->member->order('id', 'desc')->column('id') as $item) {
			$this->upgrade($item);
			// $upgrade[] = [$item => $this->upgrade($item)];
		}
		$e = microtime(true);
		$upgrade[] = '耗时' . round($s - $e, 3) . '秒';
		return $upgrade;
	}

	/**
	 * 自动结算.
	 * @return bool
	 */
	public function auto()
	{
		// return $this->upgrade(1); ->where('id', '<=', 60)
		$t1 = microtime(true);

		// foreach ($list = $this->member->order('id', 'desc')->column('id') as $item) {
		// 	// $upgrade[] = $item;
		// 	// return $item;
		// 	$upgrade[] = [$item => $this->upgrade($item)];
		// }

		// return $upgrade;
		// 配置
		$config = $this->config->getConfig();
		// 已结算订单
		// $locks = $this->lock->column('order_id');
		// 待结算订单 ['order_id', 'not in', $locks] ['member_id', '<=', 60]]
		$orders = $this->order->order('order_id', 'desc')
			->where([['order_detail->is_spl', '=', 1], ['member_id', '<=', 60]])
			->field('order_id,member_id,order_type,pay_money,order_detail')
			->select();
		$t2 = microtime(true);
		$res = $this->lvDiff($orders);
		// echo '耗时' . round($t2-$t1, 3) . '秒';
		return $res;
		// return $this->upgrade(88);
		// 升级逻辑
		$upgrade = [];
		$this->member->order('id', 'desc')->chunk(100, function ($items) {
			foreach ($items as $item) {
				var_dump($this->upgrade($item->id));
				// return $item;
				// $upgrade[]=$item;
			}
		});
		return $upgrade;
		// return count($this->member->column('id'));
		foreach ($this->member->order('id', 'desc')->column('id') as $item) {
			// $upgrade[] = $item;
			$upgrade[] = [$item => $this->upgrade($item)];
		}
		return [
			'升级人数' => count($upgrade),
			'升级详情' => $upgrade,
		];
		return $this->upgrade(1351);
	}

	/**
	 * 级差结算.
	 *
	 * @return array|object
	 */
	private function lvDiff(array|object $orders)
	{
		$map = [];
		foreach ($orders as $order) {
			// return $orders;
			$parents = $this->getParents($order->member_id, $this->member->where('id', $order->member_id)->value('parent'));
			// $map[$order->order_id] =$parents;
			// return $parents[0];
			if ($parents) {
				echo PHP_EOL;
				echo PHP_EOL;
				$map[] =    $this->lookupDiff($parents[0], 1, $order);
			}
		}
		return $map;
	}

	/**
	 * 查找级差.
	 *
	 * @param mixed $tree
	 * @param mixed $current
	 * @param mixed $order
	 * @return void
	 */
	private function lookupDiff($tree, $current, $order, float $ratio = 0.00)
	{
		// $info = [
		// 	'id' => $tree['id'],
		// 	'level_id' => $tree['level_id'],
		// 	'parent' => $tree['parent'],
		// 	'spl_id' => $tree['spl_id'],
		// 	'spl_status' => $tree['spl_status'],
		// 	'spl' =>  $tree['spl'],
		// ];
		// return $tree;
		// dd($tree);
		if ($tree['spl_id'] >= $current) {
			// dd(0);
			$next = $this->spl->where('parent', $tree['spl_id'])->value('id');
			// echo 'next:' . $next . PHP_EOL;
			// return $tree;

			echo "====================极差 {$order['order_id']} ============================" . PHP_EOL;
			echo '订单金额:' . (float) $order['pay_money'] . ' 下单会员:' . $order['member_id'] . PHP_EOL;
			echo '当前结算等级:' . $tree['spl_id'] . ' 比例:' . (float) $tree['spl']['ratio'] . ' 当前结算比例:' . (float) $tree['spl']['ratio'] - (float) $ratio . ' 会员:' . $tree['id'] . PHP_EOL .
				' 会员等级:' . $tree['spl']['name'] . ' 下次结算等级:' . $next . ' 分润:' . (float) $order['pay_money'] * ((float) $tree['spl']['ratio'] - (float) $ratio) . PHP_EOL;
			echo '====================极差============================' . PHP_EOL;
			// return $tree['children'][0];
			if ($tree['children'] ?? false) {
				$this->subsidy($tree['children'][0], (float) $order['pay_money'] * ((float) $tree['spl']['ratio'] - (float) $ratio));
				// return $tree['children'][0];
				// var_dump($tree['children'][0]);
				// $this->lookupDiff($tree['children'][0], $current, $order);
				$this->lookupDiff($tree['children'][0], $next, $order, (float) $tree['spl']['ratio'] ?? $ratio);
			}
		} elseif ($tree['children'] ?? false) {
			// echo 'children:' . $current . PHP_EOL;
			$this->lookupDiff($tree['children'][0], $current, $order, $ratio);
		}
		// return false;
	}

	private function subsidy($tree, $money, $lv = 1)
	{
		$current = $this->spl->find($tree['spl_id']);
		if ($lv>3) {
			return;
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
			echo '====================管理津贴============================' . PHP_EOL;
			echo '当前结算等级:' . $text . ' 比例:' . $ratio . ' 会员等级:' . $tree['spl']['name'] . ' 会员:' . $tree['id'] . PHP_EOL .
				' 津贴金额:' . (float) $money . ' 津贴:' . (float) $money * $ratio . PHP_EOL;
			echo '===================管理津贴=============================' . PHP_EOL;
			if ($tree['children'] ?? false) {
				$this->subsidy($tree['children'][0], $money, ++$lv);
			}
		} elseif ($tree['children'] ?? false) {
			// echo 'children:' . $current . PHP_EOL;
			$this->subsidy($tree['children'][0], $money, ++$lv);
		}
	}

	/**
	 * 获取父级.
	 * lookup.
	 * @return array
	 */
	private function getParents(int $id, int $parent)
	{
		$member = new User();
		// 获取父级ID合集 不包含自己
		$ids = array_unique($this->member->select()->getAllChildrenIds([$id], 'id', 'parent'));
		// 获取父级树
		$parent_tree = $this->member->withOnlyRelation('spl')
			->where([['id', 'in', $ids]])
			->field('id,level_id,parent,spl_id,spl_status')
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
		// $this->upgrade($info->parent);
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
		// return $next_level;
		// return $info->parent;
		// 获取团队树
		$team_tree = $this->member->where([['id', 'in', $ids]])->field('id,level_id,parent,spl_id,spl_status')->select()->toTree($id);
		// 等级是否满足条件
		if (! $next_level->user_level === $info->level_id) {
			// dd(0);
			return '等级条件不满足';
		}
		// return $info;
		// 团队是否满足条件
		// return $this->verifyTeam($next_level->market_sum, $info);
		if (! $this->verifyTeam($next_level->market_sum, $info)) {
			// dd(1);
			return '团队条件不满足';
		}
		// return $this->verifyMarket($next_level->market, $team_tree);
		// 市场是否满足条件
		if (! $this->verifyMarket($next_level->market, $team_tree)) {
			// dd(2);
			return '市场条件不满足';
		}
		// return $info;
		if ($this->member->updateBy($id, ['spl_id' => $next_level->id])) {
			// dd(3);
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
		$member = new User();
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
		$member = new User();
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
