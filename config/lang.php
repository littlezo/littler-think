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
	// 默认语言
	'default_lang' => Env::get('lang.default_lang', 'zh-cn'),
	// 允许的语言列表
	'allow_lang_list' => [],
	// 多语言自动侦测变量名
	'detect_var' => 'lang',
	// 是否使用Cookie记录
	'use_cookie' => true,
	// 多语言cookie变量
	'cookie_var' => 'think_lang',
	// 扩展语言包
	'extend_list' => [],
	// Accept-Language转义为对应语言包名称
	'accept_language' => [
		'zh-hans-cn' => 'zh-cn',
	],
	// 是否支持语言分组
	'allow_group' => false,
];
