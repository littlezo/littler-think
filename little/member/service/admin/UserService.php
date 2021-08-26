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

namespace little\member\service\admin;

use little\member\model\Level;
use little\member\model\User;
use little\order\model\Detail;
use littler\annotation\Inject;
use littler\Request;

class UserService
{
	/**
	 * @Inject()
	 * @var User
	 */
	private $model;

	/**
	 * @Inject()
	 * @var Level
	 */
	private $level;

	/**
	 * @Inject()
	 * @var Detail
	 */
	private $order;

	/**
	 * @Inject()
	 * @var Request
	 *              desc  Request对象 request->user 可以取当前用户信息
	 */
	private $request;

	/**
	 * #title 分页.
	 * @return User
	 */
	public function paginate(): array|object
	{
		$list = $this->model->getList();
		$spl_levels = $this->level->where([['is_spl', '=', 1]])->column('level_id');

		$list->each(function (&$item) use ($spl_levels) {
			$ids=array_unique($this->model->select()->getAllChildrenIds([$item->id], 'parent', 'id'));
			$item->level_count=$this->model->whereIn('id', $ids)->order('level_id', 'asc')->field('id,level_id,COUNT(id) AS count')->group('level_id')->select();
			$item->spl_count=$this->model->whereIn('id', $ids)->order('spl_id', 'asc')->field('id,spl_id,COUNT(id) AS count')->group('spl_id')->select();
			if (in_array($item->level_id, $spl_levels, true)) {
				$item['my_order_money']=$this->order->where([['order_type', '=', 3], ['order_detail->is_spl', '=', 1], ['order_detail->level', 'in', $spl_levels], ['member_id', '=', $item->id], ['pay_status', '=', 1]])->sum('pay_money');
			} else {
				$item['my_order_money']=0;
			}
			$item['team_order_money']=$this->order->where([['order_type', '=', 3], ['order_detail->is_spl', '=', 1], ['order_detail->level', 'in', $spl_levels], ['member_id', 'in', $ids], ['pay_status', '=', 1]])->sum('pay_money');
		});
		// dd($list->toArray());
		return $list;
	}

	/**
	 * #title 列表.
	 * @return User
	 */
	public function list(): ?object
	{
		return $this->model->getList(false);
	}

	/**
	 * #title 树.
	 * @return User
	 */
	public function tree($argv)
	{
		$type = $argv['type']??'sub';
		$id =(int) $argv['id'];
		$spl_levels = $this->level->where([['is_spl', '=', 1]])->column('level_id');
		$condition = ['parent', 'id'];
		if ($type ==='up') {
			$condition = ['id', 'parent'];
		}
		$ids=array_unique([$id, ...$this->model->select()->getAllChildrenIds([$id], ...$condition)]);
		// return $ids;
		$list = $this->model->where([['id', 'in', $ids]])->field('id,level_id,parent,mobile,nickname,username,spl_id,spl_status,status')->select()->each(function ($item) use ($spl_levels) {
			$ids=array_unique($this->model->select()->getAllChildrenIds([$item->id], 'parent', 'id'));
			unset($ids[$item->id]);
			$item->expand = true;
			$item->level_count=$this->model->whereIn('id', $ids)->order('level_id', 'asc')->field('id,level_id,COUNT(id) AS count')->group('level_id')->select();
			$item->spl_count=$this->model->whereIn('id', $ids)->order('spl_id', 'asc')->field('id,spl_id,COUNT(id) AS count')->group('spl_id')->select();
			if (in_array($item->level_id, $spl_levels, true)) {
				$item['my_order_money']=$this->order->where([['order_type', '=', 3], ['order_detail->is_spl', '=', 1], ['order_detail->level', 'in', $spl_levels], ['member_id', '=', $item->id], ['pay_status', '=', 1]])->sum('pay_money');
			} else {
				$item['my_order_money']=0;
			}
			$item['team_order_money']=$this->order->where([['order_type', '=', 3], ['order_detail->is_spl', '=', 1], ['order_detail->level', 'in', $spl_levels], ['member_id', 'in', $ids], ['pay_status', '=', 1]])->sum('pay_money');
		});
		$info =  $this->model->where('id', $id)->field('id,level_id,parent,mobile,nickname,username,spl_id,spl_status,status')->find()->toArray();

		// return $list->toTree();

		$info =  $this->model->where('id', $id)->field('id,level_id,parent,mobile,nickname,username,spl_id,spl_status,status')->find()->toArray();
		$info['level_count']=$this->model->whereIn('id', $ids)->order('level_id', 'asc')->field('id,level_id,COUNT(id) AS count')->group('level_id')->select();
		$info['spl_count']=$this->model->whereIn('id', $ids)->order('spl_id', 'asc')->field('id,spl_id,COUNT(id) AS count')->group('spl_id')->select();
		if (in_array($info['level_id'], $spl_levels, true)) {
			$info['my_order_money']=$this->order->where([['order_type', '=', 3], ['order_detail->is_spl', '=', 1], ['order_detail->level', 'in', $spl_levels], ['member_id', '=', $id], ['pay_status', '=', 1]])->sum('pay_money');
		} else {
			$info['my_order_money']=0;
		}
		$info['team_order_money']= $this->order->where([['order_type', '=', 3], ['order_detail->is_spl', '=', 1], ['order_detail->level', 'in', $spl_levels], ['member_id', 'in', $ids], ['pay_status', '=', 1]])->sum('pay_money');

		$info['expand'] = true;
		if ($type ==='up') {
			$info['children'] = $list->toTree($info['parent'], 'parent', 'id');
		} else {
			$info['children'] = $list->toTree($info['id']);
		}
		return $info;
	}

	/**
	 * #title 详情.
	 * @param int $id 数据主键
	 * @return User
	 */
	public function info(int $id): ?object
	{
		return $this->model->findBy($id);
	}

	/**
	 * #title 保存.
	 * @param array $args 待写入数据
	 * @return int||bool
	 */
	public function save(array $args)
	{
		return $this->model->storeBy($args);
	}

	/**
	 * #title 更新.
	 * @param int $id ID
	 * @param array $args 待更新的数据
	 * @return int|bool
	 */
	public function update(int $id, array $args)
	{
		return $this->model->updateBy($id, $args);
	}

	/**
	 * #title 删除.
	 * @param int $id ID
	 * @return bool
	 */
	public function delete(int $id): ?bool
	{
		return $this->model->deleteBy($id);
	}
}
