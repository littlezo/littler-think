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

namespace little\platformcoupon\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property platformcoupon_id $int 优惠券id
 * @property platformcoupon_name $string 优惠券名称
 * @property platformcoupon_type_id $int 优惠券类型id
 * @property platformcoupon_code $string 优惠券编码
 * @property member_id $int 领用人
 * @property use_order_id $string 优惠券使用订单id
 * @property at_least $float 最小金额
 * @property money $float 面额
 * @property state $int 优惠券状态 1已领用（未使用） 2已使用 3已过期
 * @property get_type $int 获取方式1订单2.直接领取3.活动领取
 * @property fetch_time $int 领取时间
 * @property use_time $int 使用时间
 * @property end_time $int 有效期结束时间
 * @property use_scenario $int 使用场景（1全场通用 2指定店铺）
 * @property group_ids $string 店铺等级ids
 * @property platform_split_rare $float 平台分担比例
 * @property shop_split_rare $float 店铺分店比例
 */
abstract class PlatformcouponAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'platformcoupon';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'platformcoupon_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'platformcoupon_id' => 'int',
		'platformcoupon_name' => 'string',
		'platformcoupon_type_id' => 'int',
		'platformcoupon_code' => 'string',
		'member_id' => 'int',
		'use_order_id' => 'string',
		'at_least' => 'float',
		'money' => 'float',
		'state' => 'int',
		'get_type' => 'int',
		'fetch_time' => 'int',
		'use_time' => 'int',
		'end_time' => 'int',
		'use_scenario' => 'int',
		'group_ids' => 'string',
		'platform_split_rare' => 'float',
		'shop_split_rare' => 'float',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'platformcoupon_id' => 'int',
		'platformcoupon_name' => 'varchar',
		'platformcoupon_type_id' => 'int',
		'platformcoupon_code' => 'varchar',
		'member_id' => 'int',
		'use_order_id' => 'varchar',
		'at_least' => 'decimal',
		'money' => 'decimal',
		'state' => 'tinyint',
		'get_type' => 'int',
		'fetch_time' => 'timestamp',
		'use_time' => 'timestamp',
		'end_time' => 'timestamp',
		'use_scenario' => 'tinyint',
		'group_ids' => 'varchar',
		'platform_split_rare' => 'decimal',
		'shop_split_rare' => 'decimal',
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
		'platformcoupon_id',
		'platformcoupon_name',
		'platformcoupon_type_id',
		'platformcoupon_code',
		'member_id',
		'use_order_id',
		'at_least',
		'money',
		'state',
		'get_type',
		'fetch_time',
		'use_time',
		'end_time',
		'use_scenario',
		'group_ids',
		'platform_split_rare',
		'shop_split_rare',
	];
}
