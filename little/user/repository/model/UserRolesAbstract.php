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
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;
use think\model\concern\SoftDelete;

/**
 * @property id $int
 * @property name $string 角色名
 * @property parent $int 父级ID
 * @property description $string 角色备注
 * @property data_range $int 1 全部数据 2 自定义数据 3 仅本人数据 4 部门数据 5 部门及以下数据
 * @property access_ids $string 权限id合集
 * @property identify $string 角色的标识，用英文表示，用于后台路由权限
 * @property create_time $int 创建时间
 * @property update_time $int 更新时间
 * @property delete_time $int 删除状态，0未删除  time已删除
 */
abstract class UserRolesAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;
	use SoftDelete;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'user_roles';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'name' => 'string',
		'parent' => 'int',
		'description' => 'string',
		'data_range' => 'int',
		'access_ids' => 'string',
		'identify' => 'string',
		'create_time' => 'int',
		'update_time' => 'int',
		'delete_time' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['access_ids'];

	/**
	 * @var array $json JSON字段自动转数组
	 */
	protected $jsonAssoc = true;

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'id',
		'name',
		'parent',
		'description',
		'data_range',
		'access_ids',
		'identify',
		'create_time',
		'update_time',
		'delete_time',
	];
}
