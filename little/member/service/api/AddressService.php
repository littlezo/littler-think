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

namespace little\member\service\api;

use little\member\model\Address;
use littler\annotation\Inject;
use littler\Request;

class AddressService
{
	/**
	 * @Inject
	 * @var Address
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
	 * @return Address
	 */
	public function paginate(): ?object
	{
		// return $this->model->getList();

		return $this->model->where('member_id', $this->request->user->member_id)->paginate();
	}

	/**
	 * #title 列表.
	 * @return Address
	 */
	public function list(): ?object
	{
		return $this->model->getList(false);
	}

	/**
	 * #title 详情.
	 * @param int $id 数据主键
	 * @return Address
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
		$args['member_id']=$this->request->user->member_id;
		if ($args['is_default']==1) {
			$this->model->where('member_id', $args['member_id'])->where('is_default', 1)->update(['is_default'=>0]);
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
		$args['member_id']=$this->request->user->member_id;
		$info=$this->model->where('member_id', $args['member_id'])->where('id', $id)->find();
		if (! $info) {
			return '数据不存在';
		}
		if (isset($args['is_default'])&&$args['is_default']==1) {
			$this->model->where('member_id', $args['member_id'])->where('is_default', 1)->update(['is_default'=>0]);
		}
		return $this->model->updateBy($id, $args);
	}

	/**
	 * #title 删除.
	 * @param int $id ID
	 * @return bool
	 */
	public function delete(int $id): ?bool
	{
		$info=$this->model->where('id', $id)->where('member_id', $this->request->user->member_id)->find();
		if (! $info) {
			return false;
		}
		return $this->model->deleteBy($id);
	}
}
