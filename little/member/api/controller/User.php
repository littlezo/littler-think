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

namespace little\member\api\controller;

use little\member\repository\api\UserTrait;
use little\member\service\api\UserService;
use littler\annotation\docs\ApiDocs;
use littler\annotation\Inject;
use littler\annotation\Route;
use littler\annotation\route\Group as RouteGroup;
use littler\annotation\route\Middleware;
use littler\BaseController as Controller;
use littler\Request;
use littler\Response;

/**
 * Class User.
 * @RouteGroup("api/member")
 * @Middleware({littler\JWTAuth\Middleware\Jwt::class, "member"})
 * @apiDocs({
 *     "title": "会员列表",
 *     "version": "1.0.0",
 *     "layer": "api",
 *     "name": "user",
 *     "module": "member",
 *     "group": "user",
 *     "desc": "查询参数详见快速查询 字段含义参加字段映射"
 * })
 */
class User extends Controller
{
	use UserTrait;

	/**
	 * @Inject
	 * @var UserService
	 */
	protected $service;

	/**
	 * @Route("/user/list", method="GET", ignore_verify=false)
	 * @apiDocs({
	 *     "title": "会员列表列表",
	 *     "version": "v1.0.0",
	 *     "name": "list",
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
	public function list(Request $request): ?\think\Response
	{
		return Response::success($this->service->list($request->get()));
	}

	/**
	 * @Route("/user/register", method="POST", ignore_verify=true)
	 * @apiDocs({
	 *     "title": "会员注册",
	 *     "version": "v1.0.0",
	 *     "name": "register",
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
	 *             "encryptData": "加密数据自行解密"
	 *         }
	 *     },
	 *     "error": {
	 *         "code": 500,
	 *         "message": "错误消息",
	 *         "type": "error",
	 *         "result": "",
	 *         "timestamp": 1234567890
	 *     },
	 *     "param": {
	 *         "mobile": {
	 *             "required": true,
	 *             "desc": "电话",
	 *             "type": "string",
	 *             "default": ""
	 *         },
	 *         "code": {
	 *             "required": true,
	 *             "desc": "验证码",
	 *             "type": "int",
	 *             "default": ""
	 *         },
	 *         "password": {
	 *             "required": true,
	 *             "desc": "密码",
	 *             "type": "string",
	 *             "default": ""
	 *         }
	 *     }
	 * })
	 * @return \think\Response
	 */
	public function register(Request $request): ?\think\Response
	{
		return Response::success($this->service->register($request->post()));
	}

	/**
	 * @Route("/user/login", method="POST", ignore_verify=true)
	 * @apiDocs({
	 *     "title": "会员注册",
	 *     "version": "v1.0.0",
	 *     "name": "login",
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
	 *             "encryptData": "加密数据自行解密"
	 *         }
	 *     },
	 *     "error": {
	 *         "code": 500,
	 *         "message": "错误消息",
	 *         "type": "error",
	 *         "result": "",
	 *         "timestamp": 1234567890
	 *     },
	 *     "param": {
	 *         "mobile": {
	 *             "required": true,
	 *             "desc": "电话",
	 *             "type": "string",
	 *             "default": ""
	 *         },
	 *         "password": {
	 *             "required": true,
	 *             "desc": "密码",
	 *             "type": "string",
	 *             "default": ""
	 *         }
	 *     }
	 * })
	 * @return \think\Response
	 */
	public function login(Request $request): ?\think\Response
	{
		return Response::success($this->service->login($request->post()));
	}
}
