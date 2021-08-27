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

use app\service\Synchro;
use littler\annotation\docs\ApiDocs;
use littler\annotation\Inject;
use littler\annotation\Route;
use littler\annotation\route\Group;
use littler\facade\Http;
use littler\Request;
use littler\Response;

// ignore_user_abort(); //关掉浏览器，PHP脚本也可以继续执行.
// set_time_limit(0); // 通过set_time_limit(0)可以让程序无限制的执行下去
//  // 每隔半小时运行

/**
 * #title test
 * Class Sync.
 * @Group("sync")
 * @ApiDocs({
 *     "title": "自动结算",
 *     "version": "1.0.0"
 * })
 */
class Sync extends Request
{
	/**
	 * 配置.
	 * @Inject()
	 * @var Synchro
	 */
	protected $sync;

	public function __construct()
	{
	}

	/**
	 * #title 非分页列表.
	 * @Route("/user", method="GET", ignore_verify=true)
	 * @return \think\Response
	 *
	 * @ApiDocs({
	 *  "title": "测试",
	 *  "version": "v1.0.0",
	 *  "name": "user",
	 *  "group": "sync",
	 *      "success": {
	 *          "code": 200,
	 *          "message": "success",
	 *         "data": {},
	 *      },
	 *      "error": {
	 *          "code": 500,
	 *          "message": "error",
	 *      },
	 *      "param": {
	 *         "page": {
	 *            "required": true,
	 *            "desc": "页数",
	 *            "type": "int",
	 *         }
	 *      },
	 *  })
	 */
	public function user()
	{
		// $interval=60*30;
		// do {
		// $run = include 'config.php';
		// if (! $run) {
		// 	exit('process abort');
		// }
		// $response = Http::get('http://localhost:9580/auto/upgrade/0');

		// return Response::success($response->json());
		return Response::success();
		return Response::success($this->sync->syncUser());
		// sleep($interval); // 等待5分钟
		// } while (true);

		// return true;
	}

	/**
	 * #title 非分页列表.
	 * @Route("/order", method="GET", ignore_verify=true)
	 * @return \think\Response
	 *
	 * @ApiDocs({
	 *  "title": "测试",
	 *  "version": "v1.0.0",
	 *  "name": "order",
	 *  "group": "sync",
	 *      "success": {
	 *          "code": 200,
	 *          "message": "success",
	 *         "data": {},
	 *      },
	 *      "error": {
	 *          "code": 500,
	 *          "message": "error",
	 *      },
	 *      "param": {
	 *         "page": {
	 *            "required": true,
	 *            "desc": "页数",
	 *            "type": "int",
	 *         }
	 *      },
	 *  })
	 */
	public function order($id)
	{
		return Response::success();
		if ($id) {
			return Response::success($this->sync->syncOrder());
		}
	}
}