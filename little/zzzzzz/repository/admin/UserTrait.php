<?php

/**
 * #logic 做事不讲究逻辑，再努力也只是重复犯错
 * ## 何为相思：不删不聊不打扰，可否具体点：曾爱过。何为遗憾：你来我往皆过客，可否具体点：再无你。
 * ## 只要思想不滑稽，方法总比苦难多！
 * @version 1.0.0
 * @author @小小只^v^ <littlezov@qq.com>  littlezov@qq.com
 * @contact  littlezov@qq.com
 * @link     https://github.com/littlezo
 * @document https://github.com/littlezo/wiki
 * @license  https://github.com/littlezo/MozillaPublicLicense/blob/main/LICENSE
 */

declare(strict_types=1);

namespace little\user\repository\admin;

use little\user\service\admin\UserService;
use littler\Request;
use littler\Response;

/**
 * desc 禁止在此写业务逻辑，执行生成后将被覆盖
 */
trait UserTrait
{
	/**
	 * @Inject()
	 * @var UserService
	 */
	protected $service;


	/**
	 * @Route("/index", method="GET")
	 * @apiDocs({
	 *     "title": "分页列表",
	 *     "version": "v1.0.0",
	 *     "name": "delete",
	 *     "headers": {
	 *         "Authorization":"Bearer Token"
	 *     },
	 *     "desc": "查询参数详见快速查询 字段含义参加字段映射"
	 *     "success": {
	 *         "code": 200,
	 *         "message": "success",
	 *         "timestamp": 1234567890,
	 *         "data": {
	 *             "encryptData": "加密数据自行解密",
	 *         },
	 *     },
	 *     "error": {
	 *         "code": 500,
	 *         "message": "fail",
	 *         "timestamp": 1234567890
	 *     },
	 *     "param": {
	 *         "page": {
	 *             "required": true,
	 *             "desc": "页数",
	 *             "string": "int",
	 *             "default": 1,
	 *         },
	 *         "size": {
	 *             "required": true,
	 *             "desc": "单页数量",
	 *             "string": "int",
	 *             "default": 10,
	 *         }
	 *     }
	 * })
	 * @return \think\Response
	 */
	public function index(Request $request): ?\think\Response
	{
		return Response::paginate($this->service->paginate($request->get()));
	}


	/**
	 * @Route("/index/:id", method="GET")
	 * @apiDocs({
	 *     "title": "详情",
	 *     "version": "v1.0.0",
	 *     "name": "delete",
	 *     "headers": {
	 *         "Authorization":"Bearer Token"
	 *     },
	 *     "desc": "查询参数详见快速查询 字段含义参加字段映射"
	 *     "success": {
	 *         "code": 200,
	 *         "message": "success",
	 *         "timestamp": 1234567890,
	 *         "data": {
	 *             "encryptData": "加密数据自行解密",
	 *         },
	 *     },
	 *     "error": {
	 *         "code": 500,
	 *         "message": "fail",
	 *         "timestamp": 1234567890
	 *     },
	 *     "param": {
	 *
	 *     }
	 * })
	 * @return \think\Response
	 */
	public function read(Request $request, int $id): ?\think\Response
	{
		return Response::success($this->service->info($id));
	}


	/**
	 * @Route("/index", method="POST")
	 * @apiDocs({
	 *     "title": "保存",
	 *     "version": "v1.0.0",
	 *     "name": "delete",
	 *     "headers": {
	 *         "Authorization":"Bearer Token"
	 *     },
	 *     "desc": "查询参数详见快速查询 字段含义参加字段映射"
	 *     "success": {
	 *         "code": 200,
	 *         "message": "success",
	 *         "timestamp": 1234567890,
	 *         "data": {
	 *             "encryptData": "加密数据自行解密",
	 *         },
	 *     },
	 *     "error": {
	 *         "code": 500,
	 *         "message": "fail",
	 *         "timestamp": 1234567890
	 *     },
	 *     "param": {
	 *
	 *     }
	 * })
	 * @return \think\Response
	 */
	public function save(Request $request): ?\think\Response
	{
		return Response::success($this->service->save($request->post()));
	}


	/**
	 * @Route("/index/:id", method="PUT")
	 * @apiDocs({
	 *     "title": "更新",
	 *     "version": "v1.0.0",
	 *     "name": "delete",
	 *     "headers": {
	 *         "Authorization":"Bearer Token"
	 *     },
	 *     "desc": "查询参数详见快速查询 字段含义参加字段映射"
	 *     "success": {
	 *         "code": 200,
	 *         "message": "success",
	 *         "timestamp": 1234567890,
	 *         "data": {
	 *             "encryptData": "加密数据自行解密",
	 *         },
	 *     },
	 *     "error": {
	 *         "code": 500,
	 *         "message": "fail",
	 *         "timestamp": 1234567890
	 *     },
	 *     "param": {
	 *
	 *     }
	 * })
	 * @return \think\Response
	 */
	public function update(Request $request, int $id): ?\think\Response
	{
		return Response::success($this->service->update($id,$request->post()));
	}


	/**
	 * @Route("/index/:id", method="DELETE")
	 * @apiDocs({
	 *     "title": "删除",
	 *     "version": "v1.0.0",
	 *     "name": "delete",
	 *     "headers": {
	 *         "Authorization":"Bearer Token"
	 *     },
	 *     "desc": "查询参数详见快速查询 字段含义参加字段映射"
	 *     "success": {
	 *         "code": 200,
	 *         "message": "success",
	 *         "timestamp": 1234567890,
	 *         "data": {
	 *             "encryptData": "加密数据自行解密",
	 *         },
	 *     },
	 *     "error": {
	 *         "code": 500,
	 *         "message": "fail",
	 *         "timestamp": 1234567890
	 *     },
	 *     "param": {
	 *
	 *     }
	 * })
	 * @return \think\Response
	 */
	public function delete(Request $request, int $id): ?\think\Response
	{
		return Response::success($this->service->delete($id));
	}
}
