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

namespace little\user\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int
 * @property name $string 菜单名称
 * @property title $string 菜单标题
 * @property component $string 组件名称
 * @property permission $string 权限标识
 * @property method $string 请求方式
 * @property api $string api 地址
 * @property type $int 1 菜单 2 按钮
 * @property icon $string 菜单图标
 * @property is_hide $int 是否隐藏 1 显示 0 隐藏
 * @property is_ext $int 是否外链
 * @property keepalive $int 1 缓存 0 不存在
 * @property is_affix $int 1 固定 0不固定
 * @property is_iframe $string iframe
 * @property sort $int 排序字段
 * @property parent $int 父级ID
 * @property level $string 层级
 * @property path $string 路由
 * @property module $string 模块
 * @property redirect $string 跳转地址
 * @property link $string 链接
 * @property create_time $int 创建时间
 * @property update_time $int 更新时间
 * @property ignore_auth $int 权限控制 1 是
 * @property status $int 状态
 */
abstract class AccessAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'user_access';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'name' => 'string',
		'title' => 'string',
		'component' => 'string',
		'permission' => 'string',
		'method' => 'string',
		'api' => 'string',
		'type' => 'int',
		'icon' => 'string',
		'is_hide' => 'int',
		'is_ext' => 'int',
		'keepalive' => 'int',
		'is_affix' => 'int',
		'is_iframe' => 'string',
		'sort' => 'int',
		'parent' => 'int',
		'level' => 'string',
		'path' => 'string',
		'module' => 'string',
		'redirect' => 'string',
		'link' => 'string',
		'create_time' => 'int',
		'update_time' => 'int',
		'ignore_auth' => 'int',
		'status' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'id',
		'name',
		'title',
		'component',
		'permission',
		'method',
		'api',
		'type',
		'icon',
		'is_hide',
		'is_ext',
		'keepalive',
		'is_affix',
		'is_iframe',
		'sort',
		'parent',
		'level',
		'path',
		'module',
		'redirect',
		'link',
		'create_time',
		'update_time',
		'ignore_auth',
		'status',
	];
}
