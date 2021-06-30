<?php

/**
 * #logic 做事不讲究逻辑，再努力也只是重复犯错
 * ## 何为相思：不删不聊不打扰，可否具体点：曾爱过。何为遗憾：你来我往皆过客，可否具体点：再无你。
 * ## 只要思想不滑稽，方法总比苦难多！
 * @version 1.0.0
 * @author @小小只^v^ <littlezov@qq.com>  littlezov@qq.com
 * @contact  littlezov@qq.com
 * @link     https://github.com/littlezo
 * @document https://github.com/littlezo/wiki
 * @license  https://github.com/littlezo/MozillaPublicLicense/blob/main/LICENSE
 */

declare(strict_types=1);

namespace little\message\admin\controller;

use little\message\repository\admin\MessageTrait;
use little\message\service\admin\MessageService;
use littler\BaseController as Controller;
use littler\JWTAuth\Middleware\Jwt;
use littler\Request;
use littler\Response;
use littler\annotation\Inject;
use littler\annotation\Route;
use littler\annotation\route\Group;
use littler\annotation\route\Middleware;
use littler\annotation\route\Resource;
use littler\annotation\route\Validate;

/**
 * #title 消息管理
 * Class Index
 * @package little\message\admin\controller
 * @Group("admin/message")
 * @Middleware({littler\JWTAuth\Middleware\Jwt::class,"admin"})
 */
class Index extends Controller
{
	use MessageTrait;

	/**
	 * @Inject()
	 * @var MessageService
	 */
	protected $service;


	/**
	 * #title 非分页列表
	 * @Route("/index/list", method="GET")
	 * @return \think\Response
	 * desc 其他参数详见快速查询 与字段映射
	 */
	public function list(Request $request): ?\think\Response
	{
		return Response::success($this->service->list($request->get()));
	}
}
