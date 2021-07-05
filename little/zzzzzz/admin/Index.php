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

namespace little\user\admin\controller;

use little\user\repository\admin\UserTrait;
use little\user\service\admin\UserService;
use littler\annotation\Inject;
use littler\annotation\Route;
use littler\annotation\route\Group;
use littler\annotation\route\Middleware;
use littler\BaseController as Controller;
use littler\Request;
use littler\Response;

/**
 * #title 站点后台用户表
 * Class Index.
 * @Group("admin/user")
 * @Middleware(littler\JWTAuth\Middleware\Jwt::class, "admin")
 */
class Index extends Controller
{
	use UserTrait;

	/**
	 * @Inject
	 * @var UserService
	 */
	protected $service;

	/**
	 * #title 非分页列表.
	 * @Route("/index/list", method="GET", ignore_verify=true)
	 * @return \think\Response
	 *                         desc 其他参数详见快速查询 与字段映射
	 */
	public function list(Request $request): ?\think\Response
	{
		dd(app('route'));

		return Response::success($request->user);
		return Response::success($this->service->list($request->get()));
	}
}
