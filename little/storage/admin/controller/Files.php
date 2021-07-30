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

namespace little\storage\admin\controller;

use little\storage\service\admin\FilesService;
use littler\annotation\docs\ApiDocs;
use littler\annotation\Inject;
use littler\annotation\Route;
use littler\annotation\route\Group as RouteGroup;
use littler\annotation\route\Middleware;
use littler\BaseController as Controller;
use littler\Request;
use littler\Response;
use littler\traits\ListTrait;

/**
 * Class Files.
 * @RouteGroup("admin/storage")
 * @Middleware({littler\JWTAuth\Middleware\Jwt::class, "admin"})
 * @apiDocs({
 *     "title": "文件",
 *     "version": "1.0.0",
 *     "layer": "admin",
 *     "name": "files",
 *     "module": "storage",
 *     "group": "files",
 *     "desc": "查询参数详见快速查询 字段含义参加字段映射"
 * })
 */
class Files extends Controller
{
	use ListTrait;

	/**
	 * @Inject
	 * @var FilesService
	 */
	protected $service;

	/**
	 * @Route("^/api/find/:id", method="GET", ignore_verify=true)
	 * @apiDocs({
	 *     "title": "文件读取",
	 *     "version": "v1.0.0",
	 *     "name": "find",
	 *     "headers": {
	 *         "Authorization": "Bearer Token",
	 *     },
	 *     "desc": "查询参数详见快速查询 字段含义参加字段映射",
	 *     "success": {
	 *         "code": 200,
	 *         "type": "success",
	 *         "message": "成功消息||success",
	 *         "timestamp": 1234567890,
	 *         "result": {
	 *             "ext": "文件后缀",
	 *             "group_id": "文件组",
	 *             "hash": "文件sha1",
	 *             "id": "文件ID",
	 *             "md5": "文件md5",
	 *             "mime_type": "文件类型",
	 *             "name": "文件名称",
	 *             "site_id": "商家",
	 *             "size": "文件大小 bis",
	 *             "url": "文件完整url",
	 *             "update_time": "更新时间",
	 *         },
	 *     },
	 *     "error": {
	 *         "code": 500,
	 *         "message": "错误消息",
	 *         "type": "error",
	 *         "result": "",
	 *         "timestamp": 1234567890,
	 *     },
	 *     "param": {
	 *         "id": {
	 *             "required": false,
	 *             "desc": "文件ID",
	 *             "type": "int",
	 *             "default": 0,
	 *         },
	 *     }
	 * })
	 */
	public function find(Request $request, int $id): \think\Response
	{
		$info = $this->service->info($id);
		if ($info) {
			$file_path = public_path() . '/storage/' . $info->getOrigin()['path'];
			return Response::file($file_path, $info->name);
		}
		return Response::fail('file not exists');
	}

	/**
	 * @Route("/files/:id", method="GET", ignore_verify=true)
	 * @apiDocs({
	 *     "title": "文件详情",
	 *     "version": "v1.0.0",
	 *     "name": "info",
	 *     "headers": {
	 *         "Authorization": "Bearer Token",
	 *     },
	 *     "desc": "查询参数详见快速查询 字段含义参加字段映射",
	 *     "success": {
	 *         "code": 200,
	 *         "type": "success",
	 *         "message": "成功消息||success",
	 *         "timestamp": 1234567890,
	 *         "result": {
	 *             "ext": "文件后缀",
	 *             "group_id": "文件组",
	 *             "hash": "文件sha1",
	 *             "id": "文件ID",
	 *             "md5": "文件md5",
	 *             "mime_type": "文件类型",
	 *             "name": "文件名称",
	 *             "site_id": "商家",
	 *             "size": "文件大小 bis",
	 *             "url": "文件完整url",
	 *             "update_time": "更新时间",
	 *         },
	 *     },
	 *     "error": {
	 *         "code": 500,
	 *         "message": "错误消息",
	 *         "type": "error",
	 *         "result": "",
	 *         "timestamp": 1234567890,
	 *     },
	 *     "param": {
	 *         "id": {
	 *             "required": false,
	 *             "desc": "文件ID",
	 *             "type": "int",
	 *             "default": 0,
	 *         },
	 *     }
	 * })
	 * @return \think\Response
	 */
	public function info(Request $request, int $id): ?\think\Response
	{
		return Response::success($this->service->info($id));
	}

	/**
	 * @Route("/files", method="POST", ignore_verify=true)
	 * @apiDocs({
	 *     "title": "文件上传",
	 *     "version": "v1.0.0",
	 *     "name": "list",
	 *     "headers": {
	 *         "Authorization": "Bearer Token",
	 *     },
	 *     "desc": "查询参数详见快速查询 字段含义参加字段映射",
	 *     "success": {
	 *         "code": 200,
	 *         "type": "success",
	 *         "message": "成功消息||success",
	 *         "timestamp": 1234567890,
	 *         "result": {
	 *             "encryptData": "加密数据自行解密",
	 *         },
	 *     },
	 *     "error": {
	 *         "code": 500,
	 *         "message": "错误消息",
	 *         "type": "error",
	 *         "result": "",
	 *         "timestamp": 1234567890
	 *     },
	 *     "param": {
	 *         "group_id": {
	 *             "required": false,
	 *             "desc": "文件分组ID",
	 *             "type": "int",
	 *             "default": 0,
	 *         },
	 *     }
	 * })
	 * @return \think\Response
	 */
	public function save(Request $request): ?\think\Response
	{
		// dd($request->param());
		return Response::success($this->service->save($request->param(), $request->file()));
	}
}
