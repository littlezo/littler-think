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
	// 模板引擎类型使用Think
	'type' => 'Think',
	// 默认模板渲染规则 1 解析为小写+下划线 2 全部转换小写 3 保持操作方法
	'auto_rule' => 1,
	// 模板目录名
	'view_dir_name' => 'view',
	// 模板后缀
	'view_suffix' => 'html',
	// 模板文件名分隔符
	'view_depr' => DIRECTORY_SEPARATOR,
	// 模板引擎普通标签开始标记
	'tpl_begin' => '{',
	// 模板引擎普通标签结束标记
	'tpl_end' => '}',
	// 标签库标签开始标记
	'taglib_begin' => '{',
	// 标签库标签结束标记
	'taglib_end' => '}',
];
