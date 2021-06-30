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

use littler\JWTAuth\Facade\Jwt;
use think\App;

class Index extends AbstractController
{
	protected $app;

	protected $blacklist;

	public function __construct(App $app)
	{
		$this->app = $app;
	}

	public function index()
	{
		// return json([
		//     'token' => Jwt::token(2, ['model' => CustomMember::class])->toString(),
		// ]);
		dd(app('event'));

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
