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

use Exception;
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
		return $this->model->where('member_id', $this->request->user->member_id)->paginate();
		// return $this->model->getList();
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
		if (! array_key_exists('name', $args)||trim($args['name'])=='') {
			throw new Exception('请填写收货姓名');
		}

		if (! array_key_exists('mobile', $args)||trim($args['mobile'])=='') {
			throw new Exception('请填写联系电话');
		}

		if (! array_key_exists('address', $args)||trim($args['address'])=='') {
			throw new Exception('请填写收货地址');
		}

		if (! array_key_exists('full_address', $args)||trim($args['full_address'])=='') {
			throw new Exception('请填写详细收货地址');
		}

		if (! array_key_exists('province_id', $args)||trim($args['province_id'])=='') {
			throw new Exception('请填写省ID');
		}

		if (! array_key_exists('city_id', $args)||trim($args['city_id'])=='') {
			throw new Exception('请填写市ID');
		}

		if (! array_key_exists('district_id', $args)||trim($args['district_id'])=='') {
			throw new Exception('请填写区县ID');
		}

		if ($args['is_default']==1) {
			$this->model->where('member_id', $this->request->user->member_id)->update(['is_default'=>0]);
		}

		$args['member_id']=$this->request->user->member_id;
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
		$info=$this->model->where('member_id', $this->request->user->member_id)->find();

		if (! $info) {
			throw new Exception('数据不存在');
		}

		if (! array_key_exists('name', $args)||trim($args['name'])=='') {
			throw new Exception('请填写收货姓名');
		}

		if (! array_key_exists('mobile', $args)||trim($args['mobile'])=='') {
			throw new Exception('请填写联系电话');
		}

		if (! array_key_exists('address', $args)||trim($args['address'])=='') {
			throw new Exception('请填写收货地址');
		}

		if (! array_key_exists('full_address', $args)||trim($args['full_address'])=='') {
			throw new Exception('请填写详细收货地址');
		}

		if (! array_key_exists('province_id', $args)||trim($args['province_id'])=='') {
			throw new Exception('请填写省ID');
		}

		if (! array_key_exists('city_id', $args)||trim($args['city_id'])=='') {
			throw new Exception('请填写市ID');
		}

		if (! array_key_exists('district_id', $args)||trim($args['district_id'])=='') {
			throw new Exception('请填写区县ID');
		}

		if ($args['is_default']==1) {
			$this->model->where('member_id', $this->request->user->member_id)->update(['is_default'=>0]);
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
		return $this->model->deleteBy($id);
	}
}
