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

namespace little\coupon\repository\admin;

use little\coupon\service\admin\CouponService;
use littler\JWTAuth\Middleware\Jwt;
use littler\Request;
use littler\Response;

/**
 * desc 禁止在此写业务逻辑，执行生成后将被覆盖
 */
trait CouponTrait
{
	/**
	 * @Inject()
	 * @var CouponService
	 */
	protected $service;


	/**
	 * #title 分页列表
	 * @Route("/index", method="GET")
	 * @return \think\Response
	 * desc 其他参数详见快速查询 与字段映射
	 */
	public function index(Request $request): ?\think\Response
	{
		return Response::paginate($this->service->paginate($request->get()));
	}


	/**
	 * #title 详情
	 * @Route("/index/:id", method="GET")
	 * @param int $id 主键id
	 * @return \think\Response
	 * desc 其他参数详见快速查询 与字段映射
	 */
	public function read(Request $request, int $id): ?\think\Response
	{
		return Response::success($this->service->info($id));
	}


	/**
	 * #title 保存
	 * @Route("/index", method="POST")
	 * @param array $args 待写入数据
	 * @return \think\Response
	 * desc 其他参数详见快速查询 与字段映射
	 */
	public function save(Request $request): ?\think\Response
	{
		return Response::success($this->service->save($request->post()));
	}


	/**
	 * #title 更新
	 * @Route("/index/:id", method="PUT")
	 * @param int $id 主键ID
	 * @param array $args 待更新的数据
	 * @return \think\Response
	 * desc 其他参数详见快速查询 与字段映射
	 */
	public function update(Request $request, int $id): ?\think\Response
	{
		return Response::success($this->service->update($id,$request->post()));
	}


	/**
	 * #title 删除
	 * @param int $id 要删除的数据ID
	 * @Route("/index/:id", method="DELETE")
	 * @return \think\Response
	 * desc 其他参数详见快速查询 与字段映射
	 */
	public function delete(Request $request, int $id): ?\think\Response
	{
		return Response::success($this->service->delete($id));
	}
}
