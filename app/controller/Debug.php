<?php

declare(strict_types=1);

/*
 * #logic 做事不讲究逻辑，再努力也只是重复犯错
 * ## 何为相思：不删不聊不打扰，可否具体点：曾爱过。何为遗憾：你来我往皆过客，可否具体点：再无你。
 * ## 只要思想不滑稽，方法总比苦难多！
 * @version 1.0.0
 * @author @小小只^v^ <littlezov@qq.com>  littlezov@qq.com
 * @contact  littlezov@qq.com
 * @link     https://github.com/littlezo
 * @document https://github.com/littlezo/wiki
 * @license  https://github.com/littlezo/MozillaPublicLicense/blob/main/LICENSE
 *
 */

namespace app\controller;

use littler\annotation\docs\ApiDocs;
use littler\annotation\Route;
use littler\annotation\route\Group;
use littler\annotation\route\Middleware;
use littler\JWTAuth\Facade\Jwt;
use littler\Request;
use think\App;

/**
 * #title Debug
 * Class Debug.
 * @Group("debug")
 * @Middleware(littler\JWTAuth\Middleware\Jwt::class, "admin")
 * @ApiDocs({
 *     "title": "Debug",
 *     "version": "1.0.0",
 *     "desc": "查询参数详见快速查询 字段含义参加字段映射"
 * })
 */
class Debug extends Request
{
	protected $app;

	protected $blacklist;

	public function __construct()
	{
	}

	/**
	 * #title 非分页列表.
	 * @Route("/index/<id>", method="GET", ignore_verify=false)
	 * @return \think\Response
	 *
	 * @ApiDocs({
	 *  "title": "测试",
	 *  "version": "v1.0.0",
	 *  "name": "debug",
	 *  "headers": "Token",
	 *  "group": "debug",
	 *      "success": {
	 *          "code": 200,
	 *          "message": "success",
	 *           "timestamp": 1234567890,
	 *         "data": {
	 *             "encryptData": "加密数据自行解密",
	 *         },
	 *      },
	 *      "error": {
	 *          "code": 500,
	 *          "message": "fail",
	 *          "timestamp": 1234567890
	 *      },
	 *      "param": {
	 *         "page": {
	 *            "required": true,
	 *            "desc": "页数",
	 *            "string": "int",
	 *            "default": 1,
	 *         },
	 *         "size": {
	 *            "required": true,
	 *            "desc": "单页数量",
	 *            "string": "int",
	 *            "default": 10,
	 *         }
	 *      },
	 *  })
	 */
	public function index()
	{
		// return json([
		//     'token' => Jwt::token(2, ['model' => CustomMember::class])->toString(),
		// ]);

		// return json();
		dd(app('route'));

		$store = 'default';
		$uid = '9520';
		$token = request()->get('token');
		$token = app('jwt')->store($store)->token($uid)->toString();
		// $token = '"';
		return json([
			'token' => $token,
			'verify' => app('jwt')->store($store)->verify($token),
			// 'user' => app('jwt')->store($store)->user(),
			// 'destroyStore' => app('jwt.manager')->destroyStoreWhitelist($store),
			// 'verify1' => app('jwt')->store($store)->verify($token),
			// 'destroyToken' => app('jwt.manager')->destroyToken($uid, $store),
			// 'logout' => app('jwt')->store($store)->logout($token),
			// 'verify2' => app('jwt')->store($store)->verify(),
		]);
		$store = 'api';

		app('jwt.manager')->destroyToken($uid, $store);
		// 自定义用户模型
		return json([
			'token' => Jwt::token(2, ['model' => CustomMember::class])->toString(),
		]);
		// if (Jwt::verify($token) === true) {
		//     // 验证成功
		// }

		// 验证成功
		// 如配置用户模型文件 可获取当前用户信息
		dump(Jwt::user());
	}
}
