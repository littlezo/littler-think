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

namespace little\member\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int
 * @property member_id $int 会员id
 * @property name $string 用户姓名
 * @property mobile $string 手机
 * @property telephone $string 联系电话
 * @property province_id $int 省id
 * @property city_id $int 市id
 * @property district_id $int 区县id
 * @property community_id $int 社区id
 * @property address $string 地址信息
 * @property full_address $string 详细地址信息
 * @property longitude $string 经度
 * @property latitude $string 纬度
 * @property is_default $int 是否是默认地址
 */
abstract class MemberAddressAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_address';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'member_id' => 'int',
		'name' => 'string',
		'mobile' => 'string',
		'telephone' => 'string',
		'province_id' => 'int',
		'city_id' => 'int',
		'district_id' => 'int',
		'community_id' => 'int',
		'address' => 'string',
		'full_address' => 'string',
		'longitude' => 'string',
		'latitude' => 'string',
		'is_default' => 'int',
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
	public $field = [
		'id',
		'member_id',
		'name',
		'mobile',
		'telephone',
		'province_id',
		'city_id',
		'district_id',
		'community_id',
		'address',
		'full_address',
		'longitude',
		'latitude',
		'is_default',
	];
}
