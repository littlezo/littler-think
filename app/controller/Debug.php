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
use littler\annotation\Inject;
use littler\annotation\Route;
use littler\annotation\route\Group;
use littler\annotation\route\Middleware;
use littler\JWTAuth\Facade\Jwt;
use littler\Request;
use littler\Response;
use littler\websocket\Dispatch;
use littler\websocket\Packet;
use think\App;
use think\facade\Cache;

/**
 * #title Debug
 * Class Debug.
 * @Group("admin/debug")
 * @Middleware(littler\JWTAuth\Middleware\Jwt::class, "admin")
 * @ApiDocs({
 *     "title": "Debug",
 *     "version": "1.0.0",
 *     "desc": "查询参数详见快速查询 字段含义参加字段映射"
 * })
 */
class Debug extends Request
{
	/**
	 * @Inject
	 * @var \think\App
	 */
	protected $app;

	protected $blacklist;

	public function __construct()
	{
	}

	/**
	 * #title 调试类.
	 * @Route("/", method="*", ignore_verify=true)
	 * @return \think\Response
	 *
	 * @ApiDocs({
	 *  "title": "调试类",
	 *  "version": "v1.0.0",
	 *  "name": "debug",
	 *  "headers": "Token",
	 *  "group": "debug",
	 *      "success": {
	 *          "code": 200,
	 *          "message": "success",
	 *          "timestamp": 1234567890,
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
	 *        "test": {
	 *             "required": false,
	 *             "desc": "测试",
	 *             "type": "string",
	 *             "default": "",
	 *       }
	 *      },
	 *  })
	 */
	public function index(Request $request)
	{
		return Response::fail($request->param());
		dd($request->param());
		dd(Cache::get('apiDocs'));
		dd(app()->enabledModules->get());
		dd($this);
		$flysystem = 'a';
		try {
			// return debug_backtrace(model('member.User')->getList());
			return Response::success(model('member.User')->findBy(4));
		} catch (\Throwable $th) {
			return Response::success($th->getTrace());
			return;
		}
		// rertur);
		// return json([
		//     'token' => Jwt::token(2, ['model' => CustomMember::class])->toString(),
		// ]);

		$packet = [
			'name' =>         '小小只',
		];
		// dd(app());
		$packet = '[1,{"page":0,"size":20}]';
		// $packet = '1';
		return json(Dispatch::init('user.Account@info', $packet)->handle());
		// return json();
		$pack = '0100000000480000000001000{"name":"小小只"}END';
		// dd(strlen($pack)-3);
		// $unpack_data= Packet::unpack($pack);
		// return json($unpack_data);
		// return json(Packet::unpack($pack));
		return json(Packet::pack(Packet::MESSAGE, 00, '7f00000107d000000001', '', $packet)->toString());
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
