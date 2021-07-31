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

namespace little\storage\service\admin;

use Exception;
use little\storage\model\Files;
use littler\annotation\Inject;
use littler\Request;
use think\facade\Filesystem;
use think\file\UploadedFile;

class FilesService
{
	/**
	 * @Inject
	 * @var Files
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
	 * @return Files
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
	 * @return Files
	 */
	public function paginate(): ?object
	{
		return $this->model->getList();
	}

	/**
	 * #title 列表.
	 * @return Files
	 */
	public function list(): ?object
	{
		return $this->model->getList(false);
	}

	/**
	 * #title 详情.
	 * @param int $id 数据主键
	 * @return Files
	 */
	public function info(int $id): ?object
	{
		$file_info = $this->model->findBy($id);
		$file_info['url'] = $this->request->domain() . '/storage/' . $file_info['path'];
		$file_list[] = $file_info;
		return $file_info;
	}

	/**
	 * #title 保存.
	 * @param array $args 待写入数据
	 * @return int||bool
	 */
	public function save(array $argv, $files)
	{
		//  妙传
		if (isset($argv['md5'])&&! $files) {
			$file_info = $this->model->where([['md5', '=', $argv['md5']]])->find();
			if ($file_info) {
				$file_info['url'] = $this->request->domain() . '/storage/' . $file_info['path'];
				return $file_info;
			}
			return [];
		}
		if (! $files) {
			throw new Exception('文件合法性无法验证，禁止上传！', 980406, );
		}
		$file_list = [];
		foreach ($files as $file) {
			if ($file instanceof UploadedFile) {
				try {
					$item = array_merge(
						$argv,
						[
							'name' => $file->getOriginalName(),
							'ext' => $file->extension(),
							'size' => $file->getSize(),
							'md5' => $file->md5(),
							'hash' => $file->hash(),
							'mime_type' => $file->getOriginalMime(),
						]
					);
					if ($file_info = $this->model->where([['md5', '=', $item['md5']], ['hash', '=', $item['hash']]])->find()) {
						$file_info['url'] = $this->request->domain() . '/storage/' . $file_info['path'];
						$file_list[] = $file_info;
					} else {
						$file_dir = $file->getOriginalMime() ?: 'default';
						$file_name = $file->hash() . '.' . $file->extension();
						$item['path'] = Filesystem::putFileAs($file_dir, $file, $file_name);
						$item['id'] = $this->model->storeBy($item);
						$item['url'] = $this->request->domain() . '/file/view/' . $item['id'];
						$file_list[] = $item;
					}
				} catch (\Throwable $e) {
					throw new Exception('上传失败！', 980404, $e);
				}
			} else {
				throw new Exception('上传失败！', 980405);
			}
		}
		if (! $file_list) {
			throw new Exception('上传失败', 980407, );
		}
		if (count($file_list) === 1) {
			return $file_list[0];
		}
		return $file_list;
	}

	/**
	 * #title 更新.
	 * @param int $id ID
	 * @param array $args 待更新的数据
	 * @return int|bool
	 */
	public function update(int $id, array $args)
	{
		if (isset($args['name'])) {
			return $this->model->updateBy($id, ['name' => $args['name']]);
		}
		return false;
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
