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

namespace little\site\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property id $int
 * @property site_id $int
 * @property name $string
 * @property mobile $string
 * @property area_code $string
 * @property telephone $string
 * @property province_id $int
 * @property city_id $int
 * @property district_id $int
 * @property community_id $int
 * @property province_name $string
 * @property city_name $string
 * @property district_name $string
 * @property community_name $string 镇（街道）名称
 * @property address $string
 * @property full_address $string
 * @property is_default $int 是否是默认地址
 */
abstract class SiteAddressAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'site_address';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'site_id' => 'int',
		'name' => 'string',
		'mobile' => 'string',
		'area_code' => 'string',
		'telephone' => 'string',
		'province_id' => 'int',
		'city_id' => 'int',
		'district_id' => 'int',
		'community_id' => 'int',
		'province_name' => 'string',
		'city_name' => 'string',
		'district_name' => 'string',
		'community_name' => 'string',
		'address' => 'string',
		'full_address' => 'string',
		'is_default' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'id' => 'int',
		'site_id' => 'int',
		'name' => 'varchar',
		'mobile' => 'varchar',
		'area_code' => 'varchar',
		'telephone' => 'varchar',
		'province_id' => 'int',
		'city_id' => 'int',
		'district_id' => 'int',
		'community_id' => 'int',
		'province_name' => 'varchar',
		'city_name' => 'varchar',
		'district_name' => 'varchar',
		'community_name' => 'varchar',
		'address' => 'varchar',
		'full_address' => 'varchar',
		'is_default' => 'tinyint',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $createTime 关闭创建时间自动写入
	 */
	protected $createTime = false;

	/**
	 * @var array $updateTime 关闭更新时间自动写入
	 */
	protected $updateTime = false;

	/**
	 * @var array $field 允许写入字段
	 */
	protected $field = [
		'id',
		'site_id',
		'name',
		'mobile',
		'area_code',
		'telephone',
		'province_id',
		'city_id',
		'district_id',
		'community_id',
		'province_name',
		'city_name',
		'district_name',
		'community_name',
		'address',
		'full_address',
		'is_default',
	];
}
