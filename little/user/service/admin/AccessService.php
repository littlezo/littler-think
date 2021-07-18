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

use Exception;
use little\user\model\Access;
use littler\annotation\Inject;
use littler\Request;
use think\facade\Cache;
use think\helper\Str;

class AccessService
{
	/**
	 * @Inject
	 * @var Access
	 */
	private $model;

	/**
	 * @Inject
	 * @var Request
	 *              desc  Request对象 request->user 可以取当前用户信息
	 */
	private $request;

	/**
	 * #title 布局获取.
	 * @param int $type form||table 页面布局类型
	 * @return Access
	 */
	public function layout(string $type): ?array
	{
		if (in_array($type, ['table', 'form'], true)) {
			switch ($type) {
				case 'table':
					$schema = $this->model->table_schema;
					$schema['formConfig'] = $this->model->search_schema;
					break;
				case 'form':
					$schema = $this->model->form_schema;
					break;
				default:
					$schema = null;
					break;
			}
			if ($schema) {
				return $schema;
			}
		}
		throw new Exception('类型错误', 9500901);
	}

	/**
	 * #title 分页.
	 * @return Access
	 */
	public function paginate(): ?object
	{
		return $this->model->getList();
	}

	/**
	 * #title 列表.
	 * @return Access
	 */
	public function module(): ?array
	{
		$module = app()->enabledModules->get();
		$modules = [];
		$route = Cache::get('apiDocs')['admin'] ?? [];
		foreach ($module  as $key => $item) {
			if ($item['name'] == 'user') {
				continue;
			}
			$children = [];
			if ($route[$item['name']] ?? false) {
				foreach ($route[$item['name']] as $iterable) {
					$methods = [];
					foreach ($iterable['methods'] as $method) {
						$methods[] = [
							'title' => trim_all($method['title']),
							'module' => trim_all($iterable['module']),
							'sort' => 100,
							'method' =>  trim_all(Str::lower($method['method'])),
							'api' => trim_all('/' . $iterable['module'] . str_replace(':id', '', $method['path'])),
							'permission' => trim_all($iterable['module'] . ':' . $iterable['group'] . ':' . $method['name']),
							'key' => trim_all($item['name'] . '_' . $iterable['group'] . '_' . $method['name']),
							'isLeaf' => true,
						];
						// dd($iterable);
					}
					$children[] = [
						'title' => trim_all($iterable['title']),
						'module' => trim_all($iterable['module']),
						'name' => trim_all($iterable['name'] ?: $iterable['group']),
						'sort' => 100,
						'method' => 'get',
						'api' => trim_all('/' . $iterable['module'] . '/' . $iterable['group']),
						'permission' => trim_all($iterable['module'] . ':' . $iterable['group']),
						'children' => $methods,
						'key' => trim_all($item['name'] . '_' . $iterable['group']),
						'disableCheckbox' => true,
					];
					// dd($iterable);
				}
			}
			// dd($item);
			$modules[] = [
				'title' => trim_all($item['title']),
				'module' => trim_all($item['name']),
				'name' => trim_all($item['name']),
				'sort' => $item['order'],
				'method' => '',
				'api' => '',
				'permission' => trim_all($item['name']),
				'children' => $children,
				'key' => trim_all($item['name']),
			];
		}
		return $modules;
	}

	/**
	 * #title 列表.
	 * @return Access
	 */
	public function list(): ?array
	{
		$list = $this->model->getList(false, true);
		$buttonList = [];
		$this->model
			->whereIn('parent', array_unique($list->column('id')))
			->where('type', 2)
			->select()->each(function ($item) use (&$buttonList) {
				$buttonList[$item['parent']][] = $item->toArray();
			});
		return $list->each(
			function (&$item) use ($buttonList) {
				$item['action'] = $buttonList[$item['id']] ?? [];
			}
		)->toTree();
		// return $this->model->getList(false)->toTree();
	}

	/**
	 * #title 授权路由列表.
	 * @return Access
	 */
	public function auth(): ?array
	{
		// $list = $this->model->getList(false, true);
		return $this->model->where([['type', '<>', 2], ['status', '=', 1]])
			->select()->each(function (&$item) {
				unset($item->permission);
				$new_item = $item->toArray();
				$new_item['action'] = $this->model->where('parent', $item->id)->where('type', 2)->select()->toArray();
				$item['meta'] = $new_item;
				// $item['isLink'] = $item['is_link'];
				// unset($item['title'], $item['module'], $item['method'],$item['api'],$item['type'],
				// $item['is_hide'],$item['is_link'],$item['is_keep_alive'],$item['is_affix'],
				// $item['is_iframe']);
			})->toTree();
		// $buttonList = [];
		// $this->model
		// 	->whereIn('parent', array_unique($list->column('id')))
		// 	->where('type', 2)
		// 	->select()->each(function ($item) use (&$buttonList) {
		// 		$buttonList[$item['parent']][] = $item->toArray();
		// 	});
		// return $list->each(
		// 	function (&$item) use ($buttonList) {
		// 		$item['action'] = $buttonList[$item['id']] ?? [];
		// 	}
		// )->toTree();
		// return $this->model->getList(false)->toTree();
	}

	/**
	 * #title 详情.
	 * @param int $id 数据主键
	 * @return Access
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
