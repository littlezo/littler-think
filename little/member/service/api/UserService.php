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
use little\member\model\User;
use littler\annotation\Inject;
use littler\JWTAuth\Facade\Jwt;
use littler\Request;

class UserService
{
	/**
	 * @Inject
	 * @var User
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
	 * @return User
	 */
	public function paginate(): ?object
	{
		return $this->model->getList();
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
	 * #title 用户注册.
	 * @return User
	 */
	public function register(array $args)
	{
		if (! array_key_exists('mobile', $args)||trim($args['mobile'])=='') {
			throw new Exception('电话不能为空');
		}

		$info=$this->model->where('mobile', $args['mobile'])->find();

		if ($info) {
			throw new Exception('该电话已被注册');
		}

		if (! array_key_exists('password', $args)||trim($args['password'])=='') {
			throw new Exception('密码不能为空');
		}

		if (! array_key_exists('code', $args)||trim($args['code'])=='') {
			throw new Exception('验证码不能为空');
		}

		$args['password']=md5($args['password']);

		return $this->model->storeBy($args);
		// return $this->model->getList(false);
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

	/**
	 * #title 登陆.
	 */
	public function login(array $args): string
	{
		return Jwt::username('mobile')->ignorePasswordVerify()->login($args);
	}
}
