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
// | 日志设置
// +----------------------------------------------------------------------
return [
	// 默认日志记录通道
	'default' => Env::get('log.channel', 'file'),
	// 日志记录级别
	'level' => [],
	// 日志类型记录的通道 ['error'=>'email',...]
	'type_channel' => [],
	// 关闭全局日志写入
	'close' => false,
	// 全局日志处理 支持闭包
	'processor' => null,

	// 日志通道列表
	'channels' => [
		'file' => [
			// 日志记录方式
			'type' => 'File',
			// 日志保存目录
			'path' => '',
			// 单文件日志写入
			'single' => false,
			// 独立日志级别
			'apart_level' => [],
			// 最大日志文件数量
			'max_files' => 0,
			// 使用JSON格式记录
			'json' => false,
			// 日志处理
			'processor' => null,
			// 关闭通道日志写入
			'close' => false,
			// 日志输出格式化
			'time_format'   =>    'Y-m-d H:i:s',
			'format'        =>    '[%s][%s] %s',
			// 'format' => '[%s][%s] %s',
			// 是否实时写入
			'realtime_write' => false,
		],
		// 其它日志通道配置
		'task' => [
			// 日志记录方式
			'type' => 'File',
			// 日志保存目录
			'path' => runtime_path() . '/logs/task',
			// 单文件日志写入
			'single' => true,
			// 独立日志级别
			'apart_level' => [],
			// 最大日志文件数量
			'max_files' => 0,
			// 使用JSON格式记录
			'json' => true,
			// 日志处理
			'processor' => null,
			// 关闭通道日志写入
			'close' => false,
			// 日志输出格式化
			'format' => '[%s][%s] %s',
			// 是否实时写入
			'realtime_write' => true,
		],
	],
];
