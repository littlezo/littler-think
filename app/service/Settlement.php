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
use little\member\model\Flowing;
use little\member\model\FlowingDays;
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

	/**
	 * 订单锁
	 * @Inject()
	 * @var FlowingLock
	 */
	protected $lock;

	/**
	 * 日流水.
	 * @Inject()
	 * @var FlowingDays
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

	// public function __construct(
	// 	Config $config,
	// 	Spl $spl,
	// 	Detail $order,
	// 	FlowingLock $lock,
	// 	FlowingDays $days,
	// 	Flowing $flowing,
	// 	Balance $balance,
	// 	User $user,
	// 	Level $level
	// ) {
	// 	$this->config = $config;
	// 	$this->spl = $spl;
	// 	$this->order = $order;
	// 	$this->lock = $lock;
	// 	$this->days = $days;
	// 	$this->flowing = $flowing;
	// 	$this->balance = $balance;
	// 	$this->user = $user;
	// 	$this->level = $level;
	// }

	/**
	 * 自动结算.
	 * @return bool
	 */
	public function auto()
	{
		$member = new User();
		return $this->upgrade(1);
		foreach ($list = $member->where('id', '<=', 60)->order('id', 'desc')->column('id') as $item) {
			// $upgrade[] = $item;
			// return $item;
			$upgrade[] = [$item => $this->upgrade($item)];
		}
		// 配置
		$config = $this->config->getConfig();
		// 已结算订单
		$locks = $this->lock->column('order_id');
		// 待结算订单
		$orders = $this->order
			->where([['order_detail->is_spl', '=', 1], ['member_id', '<=', 60], ['order_id', 'not in', $locks]])
			->field('order_id,member_id,order_type,pay_money,order_detail')
			->select();
		return $this->lvDiff($orders);
		// return $this->upgrade(88);
		// 升级逻辑
		$upgrade = [];
		$member->order('id', 'desc')->chunk(100, function ($items) {
			foreach ($items as $item) {
				var_dump($this->upgrade($item->id));
				// return $item;
				// $upgrade[]=$item;
			}
		});
		return $upgrade;
		// return count($member->column('id'));
		foreach ($member->order('id', 'desc')->column('id') as $item) {
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
	public function lvDiff(array|object $orders)
	{
		$member = new User();
		$map = [];
		foreach ($orders as $order) {
			return $orders;
			$parents = $this->getParents($order->member_id, $member->where('id', $order->member_id)->value('parent'));
			// return $parents;
			// return $parents[0];
			if ($parents) {
				$map[] =    $this->lookupDiff($parents[0], 1, $order);
			}
		}
		return $map;
	}

	/**
	 * 会员升级.
	 *
	 * @return void
	 */
	public function upgrade($id)
	{
		var_dump($id);
		if (! $id) {
			return;
		}
		$member = new User();
		// 获取团队ID合集 不包含自己
		$ids = $member->select()->getAllChildrenIds([$id], 'parent', 'id');

		$ids = array_unique($ids);
		// 获取会员信息
		$info =  $member->where('id', $id)->field('id,level_id,parent,mobile,nickname,username,spl_id,spl_status,status')->find();
		$this->upgrade($info->parent);
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
		$team_tree = $member->where([['id', 'in', $ids]])->field('id,level_id,parent,spl_id,spl_status')->select()->toTree($id);
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
		if ($member->updateBy($id, ['spl_id' => $next_level->id])) {
			// dd(3);
			return $this->upgrade($id);
		}
		return $info;
	}

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
			echo '当前结算订单:' . $order['order_id'] . ' 订单金额:' . (float) $order['pay_money'] . ' 下单会员:' . $order['member_id'] . PHP_EOL;
			echo '当前结算等级:' . $tree['spl_id'] . ' 比例:' . (float) $tree['spl']['ratio'] . ' 当前结算比例:' . (float) $tree['spl']['ratio'] - (float) $ratio . ' 会员:' . $tree['id'] . PHP_EOL .
				'会员等级:' . $tree['spl']['name'] . ' 佣金:' . (float) $order['pay_money'] * ((float) $tree['spl']['ratio'] - (float) $ratio) . ' 下次结算等级:' . $next . PHP_EOL;
			echo '========================================================' . PHP_EOL;

			if ($tree['children'] ?? false) {
				// $this->lookupDiff($tree['children'][0], $current, $order);
				$this->lookupDiff($tree['children'][0], $next, $order, (float) $tree['spl']['ratio']);
			}
		} elseif ($tree['children'] ?? false) {
			// echo 'children:' . $current . PHP_EOL;
			$this->lookupDiff($tree['children'][0], $current, $order, $ratio);
		}
		// return false;
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
		$ids = array_unique($member->select()->getAllChildrenIds([$id], 'id', 'parent'));
		// 获取父级树
		$parent_tree = $member->withOnlyRelation('spl')
			->where([['id', 'in', $ids]])
			->field('id,level_id,parent,spl_id,spl_status')
			->select()
			->toTree($parent, 'parent', 'id');
		return $parent_tree;
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
		$ids = array_unique($member->select()->getAllChildrenIds([$id], 'parent', 'id'));
		if ($self) {
			$ids = [$id, ...$ids];
		}
		return $this->level->order('level_id', 'asc')->field('level_id')->select()->each(function ($item) use ($member, $ids) {
			$item->key = $item->level_id;
			$item->value = $member->whereIn('id', $ids)->order('level_id', 'asc')->where('level_id', $item->level_id)->count();
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
		$ids = array_unique($member->select()->getAllChildrenIds([$id], 'parent', 'id'));
		if ($self) {
			$ids = [$id, ...$ids];
		}
		return $this->spl->order('id', 'asc')->field('id,parent')->select()->each(function ($item) use ($member, $ids) {
			$item->key = $item->id;
			$item->value = $member->whereIn('id', $ids)->order('level_id', 'asc')->where('spl_id', $item->id)->count();
			$item->parent = $this->spl->where('parent', $item->id)->value('id');
			unset($item->id);
		})->toArray();
	}
}
