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

namespace little\member\repository\admin;

use little\member\service\admin\WithdrawService;
use littler\Request;
use littler\Response;

/**
 * desc 禁止在此写业务逻辑，执行生成后将被覆盖
 */
trait WithdrawTrait
{
	/**
	 * @Inject()
	 * @var WithdrawService
	 */
	protected $service;


	/**
	 * @Route("/withdraw/layout", method="GET", ignore_verify=false)
	 * @apiDocs({
	 *     "title": "会员提现布局",
	 *     "version": "v1.0.0",
	 *     "name": "layout",
	 *     "headers": {
	 *         "Authorization": "Bearer Token"
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
	 *         "page": {
	 *             "required": false,
	 *             "desc": "页数",
	 *             "type": "int",
	 *             "default": 1,
	 *         },
	 *         "size": {
	 *             "required": false,
	 *             "desc": "单页数量",
	 *             "type": "int",
	 *             "default": 10,
	 *         }
	 *     }
	 * })
	 * @return \think\Response
	 */
	public function layout(Request $request): ?\think\Response
	{
		return Response::success($this->service->layout($request->param("type")));
	}


	/**
	 * @Route("/withdraw", method="GET", ignore_verify=false)
	 * @apiDocs({
	 *     "title": "会员提现分页",
	 *     "version": "v1.0.0",
	 *     "name": "index",
	 *     "headers": {
	 *         "Authorization": "Bearer Token"
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
	 *         "page": {
	 *             "required": false,
	 *             "desc": "页数",
	 *             "type": "int",
	 *             "default": 1,
	 *         },
	 *         "size": {
	 *             "required": false,
	 *             "desc": "单页数量",
	 *             "type": "int",
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
	 * @Route("/withdraw/:id", method="GET", ignore_verify=false)
	 * @apiDocs({
	 *     "title": "会员提现详情",
	 *     "version": "v1.0.0",
	 *     "name": "info",
	 *     "headers": {
	 *         "Authorization": "Bearer Token"
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
	 *
	 *     }
	 * })
	 * @return \think\Response
	 */
	public function info(Request $request, int $id): ?\think\Response
	{
		return Response::success($this->service->info($id));
	}


	/**
	 * @Route("/withdraw", method="POST", ignore_verify=false)
	 * @apiDocs({
	 *     "title": "添加会员提现",
	 *     "version": "v1.0.0",
	 *     "name": "save",
	 *     "headers": {
	 *         "Authorization": "Bearer Token"
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
	 * @Route("/withdraw/:id", method="PUT", ignore_verify=false)
	 * @apiDocs({
	 *     "title": "修改会员提现",
	 *     "version": "v1.0.0",
	 *     "name": "update",
	 *     "headers": {
	 *         "Authorization": "Bearer Token"
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
	 * @Route("/withdraw/:id", method="DELETE", ignore_verify=false)
	 * @apiDocs({
	 *     "title": "删除会员提现",
	 *     "version": "v1.0.0",
	 *     "name": "delete",
	 *     "headers": {
	 *         "Authorization": "Bearer Token"
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
