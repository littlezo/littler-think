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

namespace little\version\service\api;

use Exception;
use little\version\model\Distribute;
use littler\annotation\Inject;
use littler\Request;

class DistributeService
{
	/**
	 * @Inject
	 * @var Distribute
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
	 * @return Distribute
	 */
	public function paginate(): ?object
	{
		return $this->model->getList();
	}

	/**
	 * #title 列表.
	 * @return Distribute
	 */
	public function list(): ?object
	{
		return $this->model->getList(false);
	}

	/**
	 * #title 版本查询.
	 * @param array $id 数据主键
	 * @return Distribute
	 */
	public function info(array $args): ?object
	{
		if (isset($args['platform'])&& in_array($args['platform'], ['android', 'ios'], true)) {
			return $this->model->where($args)->order('id', 'desc')->find();
		}
		throw new Exception('平台信息错误，请核对消息', 9500400);
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
