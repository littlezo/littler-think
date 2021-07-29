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

namespace little\user\admin\controller;

use little\user\service\admin\AccountService;
use littler\annotation\docs\ApiDocs;
use littler\annotation\Inject;
use littler\annotation\Route;
use littler\annotation\route\Group as RouteGroup;
use littler\annotation\route\Middleware;
use littler\BaseController as Controller;
use littler\Request;
use littler\Response;
use littler\traits\DeleteTrait;
use littler\traits\PageTrait;
use littler\traits\SaveTrait;
use littler\traits\UpdateTrait;

/**
 * Class Account.
 * @RouteGroup("admin/user/account")
 * @Middleware({littler\JWTAuth\Middleware\Jwt::class, "admin"})
 * @apiDocs({
 *     "title": "用户管理",
 *     "version": "1.0.0",
 *     "layer": "admin",
 *     "module": "user",
 *     "group": "account",
 *     "desc": "查询参数详见快速查询 字段含义参加字段映射"
 * })
 */
class Account extends Controller
{
	use PageTrait;
	use UpdateTrait;
	use DeleteTrait;
	use SaveTrait;

	/**
	 * @Inject
	 * @var AccountService
	 */
	protected $service;

	/**
	 * @Route("/info", method="GET", ignore_verify=false)
	 * @apiDocs({
	 *     "title": "个人详情",
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
	public function info(Request $request): ?\think\Response
	{
		return Response::success($this->service->info($request->user->id));
	}

	/**
	 * @Route("/login", method="POST", ignore_verify=true)
	 * @apiDocs({
	 *     "title": "登陆",
	 *     "version": "v1.0.0",
	 *     "name": "login",
	 *     "headers": {},
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
	 *         "username": {
	 *             "required": true,
	 *             "desc": "用户名",
	 *             "type": "string",
	 *             "default": null,
	 *         },
	 *         "password": {
	 *             "required": true,
	 *             "desc": "密码 md5(md5('输入的密码'))",
	 *             "type": "string",
	 *             "default": null,
	 *         }
	 *     }
	 * })
	 * @return \think\Response
	 */
	public function login(Request $request): ?\think\Response
	{
		return Response::success(['token'=>$this->service->login($request->post())]);
	}

	/**
	 * @Route("/logout", method="DELETE", ignore_verify=true)
	 * @apiDocs({
	 *     "title": "退出",
	 *     "version": "v1.0.0",
	 *     "name": "logout",
	 *     "headers": {
	 *         "Authorization": "Bearer Token"
	 *     },
	 *     "desc": "查询参数详见快速查询 字段含义参加字段映射",
	 *     "success": {
	 *         "code": 200,
	 *         "type": "success",
	 *         "message": "成功消息||success",
	 *         "timestamp": 1234567890,
	 *         "result": true,
	 *     },
	 *     "error": {
	 *         "code": 500,
	 *         "message": "错误消息",
	 *         "type": "error",
	 *         "result": "",
	 *         "timestamp": 1234567890
	 *     },
	 *     "param": {}
	 * })
	 * @return \think\Response
	 */
	public function logout(Request $request): ?\think\Response
	{
		return Response::success($this->service->logout());
	}
}
