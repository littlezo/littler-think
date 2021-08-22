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

	/**
	 * 自动结算.
	 * @return bool
	 */
	public function auto()
	{
		return $this->upgrade(88);
		// 配置
		$config = $this->config->getConfig();
		// 已结算订单
		$locks = $this->lock->column('order_id');
		// 待结算订单
		$orders = $this->order
			->where([['order_detail->is_spl', '=', 1], ['order_id', 'not in', $locks]])
			->field('order_id,member_id,order_type,pay_money,order_detail')
			->select();
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
	 * 会员升级.
	 *
	 * @return void
	 */
	private function upgrade($id)
	{
		// 获取团队ID合集 不包含自己
		$ids = array_unique($this->member->select()->getAllChildrenIds([$id], 'parent', 'id'));
		// 获取会员信息
		$info =  $this->member->where('id', $id)->field('id,level_id,parent,mobile,nickname,username,spl_id,spl_status,status')->find();
		$info->member_map = $this->teamCount($id);
		$info->spl_map = $this->splCount($id);

		// 获取下一等级
		$next_level = $this->spl->where('parent', $info->spl_id)->find();
		if (! $next_level) {
			return $info;
		}
		// 获取团队树
		$team_tree = $this->member->where([['id', 'in', $ids]])->field('id,level_id,parent,spl_id,spl_status')->select()->toTree($id);
		// 等级是否满足条件
		if (! $next_level->user_level === $info->level_id) {
			return $info;
		}
		// 团队是否满足条件
		if (! $this->verifyTeam($next_level->market_sum, $info)) {
			return $info;
		}
		// 市场是否满足条件
		if (! $this->verifyMarket($next_level->market, $team_tree)) {
			return $info;
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
	private function verifyTeam($next_level, $info, $ratio = 1)
	{
		// 市场是否满足条件
		$type = $next_level['type'] ?? false;
		$key = $next_level['key'] ?? false;
		$value = $next_level['value'] ?? false;
		$is_adopt = true;
		if ($type && $key && $value) {
			$is_adopt = false;
			foreach ($info[$type . '_map'] as $item) {
				if ($item->key === $key && $item->value >= (int) $value) {
					$is_adopt = true;
					continue;
				}
			}
		}
		return $is_adopt;
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
		if (count($team_tree) < $value) {
			return false;
		}
		$stepping = 0;
		$is_adopt = true;
		if ($type && $key && $value) {
			$is_adopt = false;
			foreach ($team_tree as $item) {
				$item['member_map'] = $this->teamCount($item['id']);
				$item['spl_map'] = $this->splCount($item['id']);
				foreach ($item[$type . '_map'] as $info) {
					if ($info->key === $key && $info->value >= 1) {
						++$stepping;
						continue;
					}
				}
				if ($stepping >= $value) {
					$is_adopt = true;
					continue;
				}
			}
		}
		return $is_adopt;
	}

	/**
	 * 团队总数.
	 *
	 * @return void
	 */
	private function teamCount($id): ?\littler\ModelCollection
	{
		// 获取团队ID合集
		$ids = array_unique($this->member->select()->getAllChildrenIds([$id], 'parent', 'id'));
		// 团队总数
		return $this->member->whereIn('id', $ids)->order('level_id', 'asc')->field('id,level_id,COUNT(id) AS count')->group('level_id')->select()->each(function (&$item) {
			unset($item->level, $item->id);
			$item->key = $item->level_id;
			$item->value = $item->count;
			$item->parent = $item->level('parent', $item->level_id)->value('level_id');
		});
	}

	/**
	 * 服务商总是.
	 *
	 * @return void
	 */
	private function splCount($id): ?\littler\ModelCollection
	{
		// 获取团队ID合集
		$ids = array_unique($this->member->select()->getAllChildrenIds([$id], 'parent', 'id'));
		// 获取服务商总数
		return $this->member->whereIn('id', $ids)->order('spl_id', 'asc')->field('id,spl_id,COUNT(id) AS count')->group('spl_id')->select()->each(function ($item) {
			unset($item->spl, $item->id);
			$item->key = $item->spl_id;
			$item->value = $item->count;
			$item->parent = $item->level('parent', $item->id)->value('id');
		});
	}
}
