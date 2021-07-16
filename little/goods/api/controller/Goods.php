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

namespace little\goods\api\controller;

use little\goods\repository\api\GoodsTrait;
use little\goods\service\api\GoodsService;
use littler\annotation\docs\ApiDocs;
use littler\annotation\Inject;
use littler\annotation\Route;
use littler\annotation\route\Group as RouteGroup;
use littler\annotation\route\Middleware;
use littler\BaseController as Controller;
use littler\Request;
use littler\Response;

/**
 * Class Goods.
 * @RouteGroup("api/goods")
 * @Middleware({littler\JWTAuth\Middleware\Jwt::class, "member"})
 * @apiDocs({
 *     "title": "商品列表",
 *     "version": "1.0.0",
 *     "layer": "api",
 *     "module": "goods",
 *     "group": "goods",
 *     "desc": "查询参数详见快速查询 字段含义参加字段映射"
 * })
 */
class Goods extends Controller
{
	use GoodsTrait;

	/**
	 * @Inject
	 * @var GoodsService
	 */
	protected $service;

	/**
	 * @Route("/goods/list", method="GET", ignore_verify=false)
	 * @apiDocs({
	 *     "title": "列表无分页",
	 *     "version": "v1.0.0",
	 *     "name": "list",
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
	 * @Route("/goods/info", method="GET", ignore_verify=false)
	 * @apiDocs({
	 *     "title": "商品详情",
	 *     "version": "v1.0.0",
	 *     "name": "info",
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
	 *         "id": {
	 *             "required": false,
	 *             "desc": "商品ID",
	 *             "type": "int",
	 *             "default": "",
	 *         }
	 *     }
	 * })
	 * @return \think\Response
	 */
	public function info(Request $request): ?\think\Response
	{
		return Response::success($this->service->info((int) $request->param('id')));
	}
}
