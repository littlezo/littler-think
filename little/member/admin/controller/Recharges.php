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

namespace little\member\admin\controller;

use little\member\service\admin\RechargesService;
use littler\BaseController as Controller;
use littler\JWTAuth\Middleware\Jwt;
use littler\Request;
use littler\Response;
use littler\annotation\Inject;
use littler\annotation\Route;
use littler\annotation\docs\ApiDocs;
use littler\annotation\route\Group as RouteGroup;
use littler\annotation\route\Middleware;
use littler\annotation\route\Resource;
use littler\annotation\route\Validate;
use littler\traits\DeleteTrait;
use littler\traits\InfoTrait;
use littler\traits\LayoutTrait;
use littler\traits\ListTrait;
use littler\traits\PageTrait;
use littler\traits\SaveTrait;
use littler\traits\UpdateTrait;

/**
 * Class Recharges
 * @package little\member\admin\controller
 * @RouteGroup("admin/member/recharges")
 * @Middleware({littler\JWTAuth\Middleware\Jwt::class,"admin"})
 * @apiDocs({
 *     "title": "会员套餐",
 *     "version": "1.0.0",
 *     "layer": "admin",
 *     "name": "recharges",
 *     "module": "member",
 *     "group": "recharges",
 *     "desc": "查询参数详见快速查询 字段含义参加字段映射"
 * })
 */
class Recharges extends Controller
{
	use LayoutTrait;
	use PageTrait;
	use InfoTrait;
	use SaveTrait;
	use UpdateTrait;
	use DeleteTrait;

	/**
	 * @Inject()
	 * @var RechargesService
	 */
	protected $service;
}
