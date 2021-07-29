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

namespace little\user\service\admin;

use little\user\model\Account;
use littler\annotation\Inject;
use littler\JWTAuth\Facade\Jwt;
use littler\Request;

class AccountService
{
	/**
	 * @Inject
	 * @var Account
	 */
	private $model;

	/**
	 * @Inject
	 * @var Request
	 *              desc  Request对象 request->user 可以取当前用户信息
	 */
	private $request;

	/**
	 * #title  登陆.
	 * @param array $args param
	 * @return bool
	 */
	public function login(array $args): ?string
	{
		return Jwt::store('admin')->ignorePasswordVerify()->login($args);
	}

	/**
	 * #title 退出.
	 * @return bool
	 */
	public function logout(): ?bool
	{
		return Jwt::store('admin')->ignorePasswordVerify()->logout();
	}

	/**
	 * #title 分页.
	 * @return Account
	 */
	public function paginate(): ?object
	{
		return $this->model->getList();
	}

	/**
	 * #title 列表.
	 * @return Account
	 */
	public function list(): ?object
	{
		return $this->model->getList(false);
	}

	/**
	 * #title 详情.
	 * @param int $id 数据主键
	 * @return Account
	 */
	public function info(int $id): ?object
	{
		$info = $this->model->findBy($id);
		// dd(app());
		$info->authCode  =service('admin.user.Access')->authCode($info?->roles?->access_ids) ?: [];
		// dd($info);
		// $info->roles = service('admin.Access')->authCode();
		return $info;
	}

	/**
	 * #title 保存.
	 * @param array $args 待写入数据
	 * @return int
	 */
	public function save(array $args): ?int
	{
		return $this->model->storeBy($args);
	}

	/**
	 * #title 更新.
	 * @param int $id ID
	 * @param array $args 待更新的数据
	 * @return bool
	 */
	public function update(int $id, array $args): ?bool
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
