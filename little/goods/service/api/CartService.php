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

namespace little\goods\service\api;

use little\goods\model\Cart;
use littler\annotation\Inject;
use littler\Request;

class CartService
{
	/**
	 * @Inject
	 * @var Cart
	 */
	private $model;

	/**
	 * @Inject
	 * @var Request
	 *              desc  Request对象 request->user 可以取当前用户信息
	 */
	private $request;

	/**
	 * #title 分页.
	 * @return Cart
	 */
	public function paginate(): ?object
	{
		return $this->model->where('member_id', $this->request->user->member_id)->paginate();
	}

	/**
	 * #title 列表.
	 * @return Cart
	 */
	public function list(): ?object
	{
		return $this->model->getList(false);
	}

	/**
	 * #title 详情.
	 * @param int $id 数据主键
	 * @return Cart
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
		$args['member_id']= $this->request->user->member_id;

		$info=$this->model->where('member_id', $args['member_id'])->where('sku_id', $args['sku_id'])->find();
		if ($info) {
			$this->model->where('cart_id', $info->id)->update(['num'=>($args['num']+$info['num'])]);
			return true;
		}
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
		$args['member_id']= $this->request->user->member_id;
		$info=$this->model->where('cart_id', $id)->where('member_id', $args['member_id'])->find();
		if (! $info) {
			return false;
		}
		return $this->model->updateBy($id, $args);
	}

	/**
	 * #title 删除.
	 * @param int $id ID
	 * @return bool
	 */
	public function delete(array|int $id): ?bool
	{
		$cart_list= $this->model->whereIn('cart_id', $id)->select();
		$is_auth = true;
		foreach ($cart_list as $key => $value) {
			if ($value->member_id!==$this->request->user->member_id) {
				$is_auth = false;
				continue;
			}
		}
		if ($is_auth) {
			return $this->model->deleteBy($id);
		}
		return false;
	}
}
