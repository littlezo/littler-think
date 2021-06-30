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

namespace little\shop\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property group_id $int 主键
 * @property is_own $int 是否自营
 * @property group_name $string 店铺组名
 * @property fee $float 年费标准
 * @property menu_array $string 功能权限
 * @property addon_array $string 营销插件
 * @property create_time $int 创建时间
 * @property modify_time $int 修改时间
 * @property remark $string 说明信息
 * @property is_experience $int 是否是体验开店（0不是 1是）
 */
abstract class ShopGroupAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'shop_group';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'group_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'group_id' => 'int',
		'is_own' => 'int',
		'group_name' => 'string',
		'fee' => 'float',
		'menu_array' => 'string',
		'addon_array' => 'string',
		'create_time' => 'int',
		'modify_time' => 'int',
		'remark' => 'string',
		'is_experience' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'group_id' => 'int unsigned',
		'is_own' => 'tinyint',
		'group_name' => 'varchar',
		'fee' => 'decimal',
		'menu_array' => 'mediumtext',
		'addon_array' => 'mediumtext',
		'create_time' => 'timestamp',
		'modify_time' => 'timestamp',
		'remark' => 'varchar',
		'is_experience' => 'tinyint',
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
		'is_own',
		'group_name',
		'fee',
		'menu_array',
		'addon_array',
		'create_time',
		'modify_time',
		'remark',
		'is_experience',
	];
}
