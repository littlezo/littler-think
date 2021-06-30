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
use think\facade\Env;

// +----------------------------------------------------------------------
// | 缓存设置
// +----------------------------------------------------------------------

return [
	// 默认缓存驱动
	'default' => Env::get('cache.driver', 'redis'),

	// 缓存连接方式配置
	'stores' => [
		'file' => [
			// 驱动方式
			'type' => 'File',
			// 缓存保存目录
			'path' => '',
			// 缓存前缀
			'prefix' => '',
			// 缓存有效期 0表示永久缓存
			'expire' => 0,
			// 缓存标签前缀
			'tag_prefix' => 'tag:',
			// 序列化机制 例如 ['serialize', 'unserialize']
			'serialize' => [],
		],
		// redis缓存
		'redis' => [
			// 驱动方式
			'type' => 'redis',
			// 服务器地址
			'host' => Env::get('REDIS_HOST', '127.0.0.1'),
		],
	],
];
