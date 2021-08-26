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
use think\facade\Log;

class Settlement
{
	/**
	 * 订单.
	 * @Inject()
	 * @var Detail
	 */
	protected $orderModel;

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
	protected $daysModel;

	/**
	 * 流水.
	 * @Inject()
	 * @var Flowing
	 */
	protected $flowingModel;

	/**
	 * 余额记录.
	 * @Inject()
	 * @var Balance
	 */
	protected $balanceModel;

	/**
	 * 会员.
	 * @Inject()
	 * @var User
	 */
	protected $memberModel;

	/**
	 * 会员等级.
	 * @Inject()
	 * @var Level
	 */
	protected $levelModel;

	/**
	 * 服务商等级.
	 * @Inject()
	 * @var Spl
	 */
	protected $splModel;

	/**
	 * 配置.
	 * @Inject()
	 * @var Config
	 */
	protected $configModel;

	/**
	 * 自动升级.
	 * @return bool
	 */
	public static function autoUpgrade()
	{
		return self::upgrade(1);
		// $manager = app('\think\swoole\Manager');
		// // dd();
		// return $manager;

		// echo PHP_SAPI;
		// $cars = ['Volvo', 'BMW', 'Toyota', 'Honda', 'Mercedes', 'Opel'];
		// $memberModel = new User();
		// $list = $memberModel->order('id', 'desc')->column('id');
		// $count = count($list);
		// return array_chunk($list, (int) ceil($count / 8));
		// echo PHP_SAPI; 1

		// $client = new \WebSocket\Client('ws://10.21.0.11:9910', ['timeout'=>6000]);
		// if (! $client) {
		// 	exit('can not connect');
		// }
		// $result = $client->receive();
		// $client->close();
		// return $result;

		// $client = stream_socket_client('tcp://10.21.0.1:9910');
		// if (! $client) {
		// 	exit('can not connect');
		// }
		// return fwrite($client, '1');
		$log_dir = runtime_path() . 'logs/task/';
		$log_file = $log_dir . date('Y-m-d-H') . '.log';

		$upgrade = [];
		$memberModel = new User();
		foreach ($memberModel->order('id', 'desc')->column('id') as $item) {
			// $client->text((string) $item);
			// $upgrade[] = $client->receive();
			$s = microtime(true);
			$result =    self::upgrade($item);
			$e = microtime(true);
			$result .= '-耗时' . round($s - $e, 3) . '秒';
			$upgrade[] = $result;
			Log::channel('task')->write($result, 'task');

			// return 0; // file_get_contents($log_file);
		}
		// $client->close();
		// return $upgrade;

		return $upgrade;
	}

	/**
	 * 自动结算.
	 * @return bool
	 */
	public static function auto()
	{
		$t1 = microtime(true);
		$orderModel = new Detail();
		$orderModel->startTrans();
		try {
			// 已结算订单
			$orders = $orderModel->order('order_id', 'desc')
				->where([['order_detail->is_spl', '=', 1], ['is_lock', '=', 0], ['member_id', '<=', 60]])
				->field('order_id,member_id,order_type,pay_money,order_detail')
				->select();
			$t2 = microtime(true);
			return self::lvDiff($orders);
			return '耗时' . round($t2 - $t1, 3) . '秒';
		} catch (\Throwable $e) {
			// throw new FailedException($e->getMessage(), $e->getCode(), $e);
			throw new Exception($e->getMessage(), $e->getCode(), $e);
		}
	}

	/**
	 * 会员升级.
	 *
	 * @return void
	 */
	public static function upgrade($id)
	{
		return self::auto();
		// sleep(5);
		// return $id;
		// echo "upgrade id:$id";
		// return $id;
		if (! $id) {
			return '参数错误' . $id;
		}
		// return $id;
		$memberModel = new User();
		$splModel = new Spl();
		// 获取团队ID合集 不包含自己
		$ids =$memberModel->select()->getAllChildrenIds([(int) $id], 'parent', 'id');

		$ids = array_unique($ids);

		// 获取会员信息
		$info =  $memberModel->where('id', $id)->field('id,level_id,parent,mobile,nickname,username,spl_id,spl_status,status')->find();
		//  self::upgrade($info->parent);
		if (! $info) {
			return "{$id}未找到用户";
		}
		$info->member_map = self::teamCount($id);
		$info->spl_map = self::splCount($id);
		// return $info;
		// 获取下一等级
		$next_level = $splModel->where('parent', $info->spl_id)->find();
		if (! $next_level) {
			return "{$id}等级上限";
		}
		// 获取团队树
		$team_tree = $memberModel->where([['id', 'in', $ids]])->field('id,level_id,parent,spl_id,spl_status')->select()->toTree($id);
		return $team_tree;
		// 等级是否满足条件
		if (! ($next_level->user_level === $info->level_id)) {
			return "{$id}等级条件不满足";
		}
		// 团队是否满足条件
		if (! self::verifyTeam($next_level->market_sum, $info)) {
			return "{$id}团队条件不满足";
		}
		// 市场是否满足条件
		if (! self::verifyMarket($next_level->market, $team_tree)) {
			return "{$id}市场条件不满足";
		}
		return "用户{$id}" . $memberModel->updateBy($id, ['spl_id' => $next_level->id]) . "升级{$next_level->id}";
		return $info;
	}

	/**
	 * 级差结算.
	 *
	 * @return void
	 */
	private static function lvDiff(array|object $orders)
	{
		$memberModel = new User();
		foreach ($orders as $current_order) {
			$parents = self::getParents((int) $current_order->member_id, (int) $memberModel->where('id', $current_order->member_id)->value('parent'));
			if ($parents) {
				return $parents;
				$result = self::lookupDiff($parents[0], 1, $current_order);
				foreach ($result as $item) {
					$flowingModel = new Flowing();
					$daysModel = new Days();
					$flowingModel->storeBy($item);
					$record = $daysModel->whereDay('create_time')->where('member_id', $item['member_id'])->findOrEmpty();
					// dd($record->isEmpty());
					if ($record->isEmpty()) {
						$daysModel->storeBy($item);
					} else {
						$record->money +=  $item['money'];
						$record->cash +=  $item['cash'];
						$record->deduct +=  $item['deduct'];
						$record->save();
					}
				}
				return $result;
			}
			// $current_order->is_lock = 1;
			// $current_order->save();
		}
	}

	/**
	 * 查找级差.
	 *
	 * @param mixed $tree
	 * @param mixed $current
	 * @param mixed $current_order
	 * @return array
	 */
	private static function lookupDiff($tree, $current, $current_order, float $ratio = 0.00, $result = [])
	{
		$memberModel = new User();
		$configModel = new Config();
		$splModel = new Spl();

		// 配置
		$config = $configModel->getConfig();
		if ($tree['spl_id'] >= $current) {
			// return $tree;
			$next = $splModel->where('parent', $tree['spl_id'])->value('id');
			$real_ratio = (float) $tree['spl']['ratio'] - (float) $ratio;
			$money  = (float) round((float) $current_order['pay_money'] * $real_ratio);
			$current_member = $memberModel->where('id', $current_order->member_id)->field('nickname,mobile,level_id')->find();
			$result[] = [
				'member_id' => $tree['id'],
				'order_id' =>  $current_order['order_id'],
				'orig_money' => (float) $current_order['pay_money'],
				'ratio' => $real_ratio,
				'money' => round($money * (float) $config['income_balance_scale'], 2),
				'cash' => round($money *  (float) $config['income_cash_scale'], 2),
				'deduct' => round(($money *  (float) $config['income_deduction_scale']) / (float) $current_member['level']['buy_ratio'], 2),
				'remarks' => "来自[{$current_member['nickname']}/{$current_member['mobile']}]的{$tree['spl']['name']}分润",
			];
			if ($tree['children'] ?? false) {
				$subsidy = self::subsidy($tree['children'][0], (float) $money, $current_order['order_id'], $tree['nickname'] . '/' . $tree['mobile']);
				if ($subsidy) {
					$result = array_merge($result, $subsidy);
				}
				return self::lookupDiff($tree['children'][0], $next, $current_order, (float) $tree['spl']['ratio'] ?? $ratio, $result);
			}
		} elseif ($tree['children'] ?? false) {
			return self::lookupDiff($tree['children'][0], $current, $current_order, $ratio, $result);
		}
		return $result;
	}

	private static function subsidy($tree, $money, $order_id, $remarks, $lv = 1, $result = [], )
	{
		$memberModel = new User();
		$configModel = new Config();
		$splModel = new Spl();
		$current = $splModel->find($tree['spl_id']);
		if ($lv > 3) {
			return $result;
		}
		// 配置
		$config = $configModel->getConfig();
		$current_member = $memberModel->where('id', $tree['id'])->field('nickname,mobile,level_id')->find();
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
				'money' => round(((float) round($money * $ratio)) * (float) $config['income_balance_scale'], 2),
				'cash' => round(((float) round($money * $ratio)) *  (float) $config['income_cash_scale'], 2),
				'deduct' => round((((float) round($money * $ratio)) *  (float) $config['income_deduction_scale']) / (float) $current_member['level']['buy_ratio'], 2),
				'remarks' => "来自[$remarks]的{$text}津贴",
			];
			if ($tree['children'] ?? false) {
				return self::subsidy($tree['children'][0], $money, $order_id, $tree['nickname'] . '/' . $tree['mobile'], ++$lv, $result);
			}
		} elseif ($tree['children'] ?? false) {
			return self::subsidy($tree['children'][0], $money, $order_id, $tree['nickname'] . '/' . $tree['mobile'], ++$lv, $result);
		}
		return $result;
	}

	/**
	 * 获取父级.
	 * lookup.
	 * @return array
	 */
	private static function getParents(int $id, int $parent)
	{
		$memberModel = new User();
		// 获取父级ID合集 不包含自己
		$ids = array_unique($memberModel->select()->getAllChildrenIds([$id], 'id', 'parent'));
		return $ids;
		// 获取父级树
		$parent_tree = $memberModel->withOnlyRelation('spl')
			->where([['id', 'in', $ids]])
			->field('id,level_id,nickname,mobile,parent,spl_id,spl_status')
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
	private static function verifyTeam($next_level, $info)
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
		if (self::diffCount($map, $key) >= (int) $value) {
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
	private static function verifyMarket($next_level, $team_tree)
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
				$item['member_map'] = self::teamCount($item['id'], true);
				$item['spl_map'] = self::splCount($item['id'], true);
				$map = [];
				foreach ($item[$type . '_map'] as $info) {
					$map[$info['key']] = $info;
				}
				$maps[$item['id']] = $item[$type . '_map'];
				if (self::diffCount($map, $key) >= 1) {
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

	private static function diffCount($map, $parent = 0, $value = 0)
	{
		if ($map[$parent] ?? false) {
			return self::diffCount($map, $map[$parent]['parent'], $value + $map[$parent]['value']);
		}
		return $value;
	}

	/**
	 * 团队总数.
	 *
	 * @return void
	 */
	private static function teamCount($id, $self = false): ?array
	{
		$memberModel = new User();
		$levelModel = new Level();
		// 获取团队ID合集
		$ids = array_unique($memberModel->select()->getAllChildrenIds([$id], 'parent', 'id'));
		if ($self) {
			$ids = [$id, ...$ids];
		}
		return $levelModel->order('level_id', 'asc')->field('level_id')->select()->each(function ($item) use ($ids) {
			$memberModel = new User();
			$levelModel = new Level();
			$item->key = $item->level_id;
			$item->value = $memberModel->whereIn('id', $ids)->order('level_id', 'asc')->where('level_id', $item->level_id)->count();
			$item->parent = $levelModel->where('parent', $item->level_id)->value('level_id');
			unset($item->level_id);
		})->toArray();
	}

	/**
	 * 服务商总是.
	 *
	 * @return void
	 */
	private static function splCount($id, $self = false): ?array
	{
		$memberModel = new User();
		$splModel = new Spl();
		// 获取团队ID合集
		$ids = array_unique($memberModel->select()->getAllChildrenIds([$id], 'parent', 'id'));
		if ($self) {
			$ids = [$id, ...$ids];
		}
		return $splModel->order('id', 'asc')->field('id,parent')->select()->each(function ($item) use ($ids) {
			$item->key = $item->id;
			$memberModel = new User();
			$item->value = $memberModel->whereIn('id', $ids)->order('level_id', 'asc')->where('spl_id', $item->id)->count();
			$splModel = new Spl();
			$item->parent = $splModel->where('parent', $item->id)->value('id');
			unset($item->id);
		})->toArray();
	}
}
