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
use think\model\concern\SoftDelete;

/**
 * @property id $int
 * @property name $string 角色名
 * @property identify $string 角色的标识，用英文表示，用于后台路由权限
 * @property data_range $int 1 全部数据 2 自定义数据 3 仅本人数据 4 部门数据 5 部门及以下数据
 * @property access_ids $string 权限id合集
 * @property remark $string 角色备注
 * @property sort $int 排序
 * @property status $int 状态
 * @property create_time $int 创建时间
 * @property update_time $int 更新时间
 * @property delete_time $int 删除状态，0未删除  time已删除
 */
abstract class RolesAbstract extends Model
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
		'identify' => 'string',
		'data_range' => 'int',
		'access_ids' => 'string',
		'remark' => 'string',
		'sort' => 'int',
		'status' => 'int',
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
		'identify',
		'data_range',
		'access_ids',
		'remark',
		'sort',
		'status',
		'create_time',
		'update_time',
		'delete_time',
	];
}
