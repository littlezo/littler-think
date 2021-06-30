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
 * @property platformcoupon_type_id $int 优惠券类型Id
 * @property platformcoupon_name $string 优惠券名称
 * @property money $float 发放面额
 * @property count $int 发放数量
 * @property lead_count $int 已领取数量
 * @property max_fetch $int 每人最大领取个数 0无限制
 * @property at_least $float 满多少元使用 0代表无限制
 * @property end_time $int 有效日期结束时间
 * @property image $string 优惠券图片
 * @property create_time $int 创建时间
 * @property update_time $int 修改时间
 * @property validity_type $int 有效期类型 0固定时间 1领取之日起
 * @property fixed_term $int 领取之日起N天内有效
 * @property status $int 状态（1进行中2已结束-1已关闭）
 * @property is_show $int 是否显示
 * @property use_scenario $int 使用场景（1全场通用 2指定店铺）
 * @property group_ids $string 店铺等级ids
 * @property platform_split_rare $float 平台分担比例
 * @property shop_split_rare $float 店铺分店比例
 */
abstract class PlatformcouponTypeAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'platformcoupon_type';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'platformcoupon_type_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'platformcoupon_type_id' => 'int',
		'platformcoupon_name' => 'string',
		'money' => 'float',
		'count' => 'int',
		'lead_count' => 'int',
		'max_fetch' => 'int',
		'at_least' => 'float',
		'end_time' => 'int',
		'image' => 'string',
		'create_time' => 'int',
		'update_time' => 'int',
		'validity_type' => 'int',
		'fixed_term' => 'int',
		'status' => 'int',
		'is_show' => 'int',
		'use_scenario' => 'int',
		'group_ids' => 'string',
		'platform_split_rare' => 'float',
		'shop_split_rare' => 'float',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'platformcoupon_type_id' => 'int',
		'platformcoupon_name' => 'varchar',
		'money' => 'decimal',
		'count' => 'int',
		'lead_count' => 'int',
		'max_fetch' => 'int',
		'at_least' => 'decimal',
		'end_time' => 'timestamp',
		'image' => 'varchar',
		'create_time' => 'timestamp',
		'update_time' => 'timestamp',
		'validity_type' => 'int',
		'fixed_term' => 'int',
		'status' => 'int',
		'is_show' => 'int',
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
	 * @var array $field 允许写入字段
	 */
	protected $field = [
		'platformcoupon_type_id',
		'platformcoupon_name',
		'money',
		'count',
		'lead_count',
		'max_fetch',
		'at_least',
		'end_time',
		'image',
		'create_time',
		'update_time',
		'validity_type',
		'fixed_term',
		'status',
		'is_show',
		'use_scenario',
		'group_ids',
		'platform_split_rare',
		'shop_split_rare',
	];
}
