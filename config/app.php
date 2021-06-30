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

return [
	// 应用地址
	'app_host' => Env::get('app.host', ''),
	// 应用的命名空间
	'app_namespace' => '',
	// 是否启用路由
	'with_route' => true,
	// 是否启用事件
	'with_event' => true,
	// 默认应用
	'default_app' => 'index',
	// 默认时区
	'default_timezone' => 'Asia/Shanghai',

	// 应用映射（自动多应用模式有效）
	'app_map' => [],
	// 域名绑定（自动多应用模式有效）
	'domain_bind' => [],
	// 禁止URL访问的应用列表（自动多应用模式有效）
	'deny_app_list' => [],

	// 异常页面的模板文件
	'exception_tmpl' => app()->getThinkPath() . 'tpl/think_exception.tpl',

	// 错误显示信息,非调试模式有效
	'error_message' => '页面错误！请稍后再试～',
	// 显示错误信息
	'show_error_msg' => false,
];
