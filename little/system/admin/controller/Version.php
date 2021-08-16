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

namespace little\system\admin\controller;

use little\system\service\admin\VersionService;
use littler\annotation\docs\ApiDocs;
use littler\annotation\Inject;
use littler\annotation\Route;
use littler\annotation\route\Group as RouteGroup;
use littler\annotation\route\Middleware;
use littler\BaseController as Controller;
use littler\Request;
use littler\Response;
use littler\traits\DeleteTrait;
use littler\traits\InfoTrait;
use littler\traits\LayoutTrait;
use littler\traits\PageTrait;
use littler\traits\SaveTrait;
use littler\traits\UpdateTrait;

/**
 * Class Version.
 * @RouteGroup("admin/system/version")
 * @Middleware({littler\JWTAuth\Middleware\Jwt::class, "admin"})
 * @apiDocs({
 *     "title": "版本分发",
 *     "version": "1.0.0",
 *     "layer": "admin",
 *     "name": "version",
 *     "module": "system",
 *     "group": "version",
 *     "desc": "查询参数详见快速查询 字段含义参加字段映射"
 * })
 */
class Version extends Controller
{
	use LayoutTrait;
	use PageTrait;
	use InfoTrait;
	use SaveTrait;
	use UpdateTrait;
	use DeleteTrait;

	/**
	 * @Inject
	 * @var VersionService
	 */
	protected $service;

	/**
	 * @Route("^/version/last", method="GET", ignore_verify=true)
	 * @apiDocs({
	 *     "title": "新版本查询",
	 *     "version": "v1.0.0",
	 *     "name": "last",
	 *     "headers": {
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
	 *         "timestamp": 1234567890,
	 *     },
	 *     "param": {
	 *         "platform": {
	 *             "required": true,
	 *             "desc": "平台 android ios",
	 *             "type": "string",
	 *             "default": "",
	 *         },
	 *     }
	 * })
	 * @return \think\Response
	 */
	public function last(Request $request): ?\think\Response
	{
		$param = $request->param();
		$user_agent = $request->server('HTTP_USER_AGENT');
		if (strpos($user_agent, 'iPhone') || strpos($user_agent, 'iPad')) {
			$param['platform'] = 'ios';
		} elseif (strpos($user_agent, 'Android')) {
			$param['platform'] = 'android';
		} else {
			$platform = '';
		}
		$res = $this->service->last($param);
		if ($res) {
			$res->url = 'http://' . $request->host() . '/' . $res->url;
		}	// $file = service('admin.storage.Files');
		// dd($file);

		if ($res?->path > 1) {
			$file = service('admin.storage.Files')->info($res->path);
			$res->url = $file->url;
		}
		return Response::success($res ?? []);
	}

	/**
	 * @Route("^/app/download", method="GET", ignore_verify=true)
	 * @apiDocs({
	 *     "title": "新版本下载",
	 *     "version": "v1.0.0",
	 *     "name": "download",
	 *     "headers": {
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
	 *         "timestamp": 1234567890,
	 *     },
	 *     "param": {
	 *         "platform": {
	 *             "required": true,
	 *             "desc": "平台 android ios",
	 *             "type": "string",
	 *             "default": "",
	 *         },
	 *     }
	 * })
	 * @return \think\Response
	 */
	public function download(Request $request): ?\think\Response
	{
		$param = $request->param();
		$user_agent = $request->server('HTTP_USER_AGENT');
		if (strpos($user_agent, 'iPhone') || strpos($user_agent, 'iPad')) {
			$param['platform'] = 'ios';
		} elseif (strpos($user_agent, 'Android')) {
			$param['platform'] = 'android';
		} else {
			$platform = 'other';
			$param['platform'] = 'android';
		}
		$param['type'] = 1;
		$res = $this->service->last($param);
		if ($res?->path > 1) {
			$file = service('admin.storage.Files')->info($res->path);
			return redirect($file->url);
		}
		$download_url =  'http://' . $request->host() . '/' . (! empty($res->url) ? $res->url : 'storage/release/com.hphk.shop.base.apk');
		return redirect($download_url);
	}
}
