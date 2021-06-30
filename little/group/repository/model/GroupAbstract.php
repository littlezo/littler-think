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

namespace little\group\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property group_id $int 主键
 * @property site_id $int 站点id（店铺，分站）,总平台端为0
 * @property app_module $string 使用端口
 * @property group_name $string 用户组名称
 * @property group_status $int 用户组状态
 * @property is_system $int 是否是系统用户组
 * @property menu_array $string 系统菜单权限组，用，隔开
 * @property desc $string 描述
 * @property create_time $int 创建时间
 * @property modify_time $int 修改时间
 */
abstract class GroupAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'group';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'group_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'group_id' => 'int',
		'site_id' => 'int',
		'app_module' => 'string',
		'group_name' => 'string',
		'group_status' => 'int',
		'is_system' => 'int',
		'menu_array' => 'string',
		'desc' => 'string',
		'create_time' => 'int',
		'modify_time' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'group_id' => 'int unsigned',
		'site_id' => 'int',
		'app_module' => 'varchar',
		'group_name' => 'varchar',
		'group_status' => 'int',
		'is_system' => 'int',
		'menu_array' => 'mediumtext',
		'desc' => 'varchar',
		'create_time' => 'timestamp',
		'modify_time' => 'timestamp',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $updateTime 关闭更新时间自动写入
	 */
	protected $updateTime = false;

	/**
	 * @var array $field 允许写入字段
	 */
	protected $field = [
		'group_id',
		'site_id',
		'app_module',
		'group_name',
		'group_status',
		'is_system',
		'menu_array',
		'desc',
		'create_time',
		'modify_time',
	];
}
