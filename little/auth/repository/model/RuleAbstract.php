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

namespace little\auth\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;
use think\model\concern\SoftDelete;

/**
 * @property id $int
 * @property name $string 菜单名称
 * @property pid $int 父级id
 * @property component $string 组件路径
 * @property route_name $string 路由名称
 * @property path $string 路由地址
 * @property sort $int 排序(升)
 * @property is_frame $int 是否为外链: 0否 1是
 * @property menu_type $int 菜单类型: 0目录 1菜单 2按钮 3接口
 * @property visible $int 菜单状态: 0隐藏 1显示
 * @property status $int 状态: 0禁用 1正常
 * @property permission $string 权限标识
 * @property icon $string 菜单图标
 * @property action $string 请求方式
 * @property create_time $int
 * @property update_time $int
 * @property delete_time $int
 */
abstract class RuleAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;
	use SoftDelete;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'auth_rule';

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
		'pid' => 'int',
		'component' => 'string',
		'route_name' => 'string',
		'path' => 'string',
		'sort' => 'int',
		'is_frame' => 'int',
		'menu_type' => 'int',
		'visible' => 'int',
		'status' => 'int',
		'permission' => 'string',
		'icon' => 'string',
		'action' => 'string',
		'create_time' => 'int',
		'update_time' => 'int',
		'delete_time' => 'int',
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
		'pid',
		'component',
		'route_name',
		'path',
		'sort',
		'is_frame',
		'menu_type',
		'visible',
		'status',
		'permission',
		'icon',
		'action',
		'create_time',
		'update_time',
		'delete_time',
	];
}
