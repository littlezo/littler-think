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
return [
	'domain' => env('little.domain', ''),
	/*
	 * 权限配置
	 *
	 */
	'permissions' => [
		/*
		 * get 请求不验证
		 */
		'is_allow_get' => true,

		/*
		 * 超级管理员 ID
		 *
		 */
		'super_admin_id' => 1,

		/*
		 * 方法认证标记
		 *
		 * 尽量使用唯以字符
		 *
		 */
		'method_auth_mark' => '@littleAuth',
	],
	/*
	 *  auth 认证
	 *
	 */
	'auth' => [
		// 默认
		'default' => [
			'guard' => 'member',
		],
		// 门面设置
		'guards' => [
			// admin 认证
			'admin' => [
				'driver' => 'jwt',
				'provider' => 'admin',
			],
			// 开发者认证
			'member' => [
				'driver' => 'jwt',
				'provider' => 'member',
			],
		],
		// 服务提供
		'providers' => [
			// 后台用户认证服务
			'admin' => [
				'driver' => 'orm',
				'model' => '',
			],
			// 开发这认证服务
			'member' => [
				'driver' => 'orm',
				'model' => '',
			],
		],
	],

	/*
	 * 自定义验证规则
	 *
	 */
	'validates' => [
	],
	/*
	 * 上传设置
	 *
	 */
	'upload' => [
		'image' => 'fileSize:' . 1024 * 1024 * 5 . '|fileExt:jpg,png,gif,jpeg',
		'file' => 'fileSize:' . 1024 * 1024 * 10 . '|fileExt:txt,pdf,xlsx,xls,html,mp4,mp3,amr',
	],
];
