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
 * #title test
 * Class Index.
 * @Group("index")
 * @Middleware(littler\JWTAuth\Middleware\Jwt::class, "admin")
 * @ApiDocs(
 *     {"['title’=>‘测试'],
 * '[version=>1.0.0]'"},
 *     title="测试",
 *     version="v1.0.0",
 * 	   success="{
 * 'code'=>200
 * }",
 *     error="{'code': 500}",
 *     param="{
 * 'code': 500,
 * 'docs': 页面
 * }"
 * )
 *     @param int $id
 */
class Index extends Request
{
	protected $app;

	protected $blacklist;

	public function __construct()
	{
	}

	/**
	 * #title 非分页列表.
	 * @Route("/index", method="GET", ignore_verify=false)
	 * @return \think\Response
	 *                         desc 其他参数详见快速查询 与字段映射
	 *
	 * @ApiDocs({"title": "测试", "version": "v1.0.0", "name": "index", "group": "index" })
	 *      success: {
	 *          code: 200,
	 *          message: "success",
	 *         data: {},
	 *      },
	 *      error: {
	 *          code: 500,
	 *          message: "error",
	 *      },
	 *      param: {
	 *         page: {
	 *            required: true,
	 *            desc: "页数",
	 *            string: int,
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
