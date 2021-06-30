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
 * @property id $int
 * @property site_id $int
 * @property contact_name $string 联系人
 * @property mobile $string 联系人手机号
 * @property postcode $string 邮政编码
 * @property province_id $int 省
 * @property city_id $int 市
 * @property district_id $int 县
 * @property community_id $int 乡镇
 * @property address $string 详细地址
 * @property full_address $string 收票地址
 * @property is_return $int 退货地址
 * @property is_return_default $int 是否是默认退货地址
 * @property is_delivery $int 发货地址
 * @property update_time $int
 */
abstract class ShopAddressAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'shop_address';

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
		'contact_name' => 'string',
		'mobile' => 'string',
		'postcode' => 'string',
		'province_id' => 'int',
		'city_id' => 'int',
		'district_id' => 'int',
		'community_id' => 'int',
		'address' => 'string',
		'full_address' => 'string',
		'is_return' => 'int',
		'is_return_default' => 'int',
		'is_delivery' => 'int',
		'update_time' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'id' => 'int',
		'site_id' => 'int',
		'contact_name' => 'varchar',
		'mobile' => 'varchar',
		'postcode' => 'varchar',
		'province_id' => 'int',
		'city_id' => 'int',
		'district_id' => 'int',
		'community_id' => 'int',
		'address' => 'varchar',
		'full_address' => 'varchar',
		'is_return' => 'tinyint',
		'is_return_default' => 'tinyint',
		'is_delivery' => 'tinyint',
		'update_time' => 'timestamp',
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
	 * @var array $field 允许写入字段
	 */
	protected $field = [
		'id',
		'site_id',
		'contact_name',
		'mobile',
		'postcode',
		'province_id',
		'city_id',
		'district_id',
		'community_id',
		'address',
		'full_address',
		'is_return',
		'is_return_default',
		'is_delivery',
		'update_time',
	];
}
