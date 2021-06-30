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

namespace little\coupon\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property coupon_id $int 优惠券id
 * @property type $string 优惠券类型 reward-满减 discount-折扣 random-随机
 * @property coupon_name $string 优惠券名称
 * @property coupon_type_id $int 优惠券类型id
 * @property site_id $int 站点Id
 * @property site_name $string 站点名称
 * @property coupon_code $string 优惠券编码
 * @property member_id $int 领用人
 * @property use_order_id $int 优惠券使用订单id
 * @property goods_type $int 适用商品类型1-全部商品可用；2-指定商品可用；3-指定商品不可用
 * @property goods_ids $string 适用商品id
 * @property at_least $float 最小金额
 * @property money $float 面额
 * @property discount $float 1 =< 折扣 <= 9.9 当type为discount时需要添加
 * @property discount_limit $float 最多折扣金额 当type为discount时可选择性添加
 * @property is_mark $int 是否同时给会员打标签 0-否 1-是
 * @property member_label_ids $string 会员标签id
 * @property is_share $int 分享设置 优惠券允许分享给好友领取
 * @property is_handsel $int 转赠设置 优惠券允许转赠给好友
 * @property is_forbid_preference $int 优惠叠加 0-不限制 1- 优惠券仅原价购买商品时可用
 * @property is_expire_notice $int 是否开启过期提醒0-不开启 1-开启
 * @property expire_notice_fixed_term $int 过期前N天提醒
 * @property is_noticed $int 是否已提醒
 * @property state $int 优惠券状态 1已领用（未使用） 2已使用 3已过期
 * @property get_type $int 获取方式1订单2.直接领取3.活动领取 4转赠 5分享获取
 * @property related_id $int 获取优惠券的关联id
 * @property fetch_time $int 领取时间
 * @property use_time $int 使用时间
 * @property start_time $int 可使用的开始时间
 * @property end_time $int 有效期结束时间
 */
abstract class CouponAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'coupon';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'coupon_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'coupon_id' => 'int',
		'type' => 'string',
		'coupon_name' => 'string',
		'coupon_type_id' => 'int',
		'site_id' => 'int',
		'site_name' => 'string',
		'coupon_code' => 'string',
		'member_id' => 'int',
		'use_order_id' => 'int',
		'goods_type' => 'int',
		'goods_ids' => 'string',
		'at_least' => 'float',
		'money' => 'float',
		'discount' => 'float',
		'discount_limit' => 'float',
		'is_mark' => 'int',
		'member_label_ids' => 'string',
		'is_share' => 'int',
		'is_handsel' => 'int',
		'is_forbid_preference' => 'int',
		'is_expire_notice' => 'int',
		'expire_notice_fixed_term' => 'int',
		'is_noticed' => 'int',
		'state' => 'int',
		'get_type' => 'int',
		'related_id' => 'int',
		'fetch_time' => 'int',
		'use_time' => 'int',
		'start_time' => 'int',
		'end_time' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'coupon_id' => 'int unsigned',
		'type' => 'varchar',
		'coupon_name' => 'varchar',
		'coupon_type_id' => 'int unsigned',
		'site_id' => 'int unsigned',
		'site_name' => 'varchar',
		'coupon_code' => 'varchar',
		'member_id' => 'int unsigned',
		'use_order_id' => 'int unsigned',
		'goods_type' => 'tinyint unsigned',
		'goods_ids' => 'varchar',
		'at_least' => 'decimal',
		'money' => 'decimal',
		'discount' => 'decimal',
		'discount_limit' => 'decimal',
		'is_mark' => 'tinyint unsigned',
		'member_label_ids' => 'varchar',
		'is_share' => 'tinyint unsigned',
		'is_handsel' => 'tinyint unsigned',
		'is_forbid_preference' => 'tinyint unsigned',
		'is_expire_notice' => 'tinyint unsigned',
		'expire_notice_fixed_term' => 'int unsigned',
		'is_noticed' => 'tinyint unsigned',
		'state' => 'tinyint unsigned',
		'get_type' => 'tinyint unsigned',
		'related_id' => 'int unsigned',
		'fetch_time' => 'timestamp',
		'use_time' => 'timestamp',
		'start_time' => 'timestamp',
		'end_time' => 'timestamp',
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
		'coupon_id',
		'type',
		'coupon_name',
		'coupon_type_id',
		'site_id',
		'site_name',
		'coupon_code',
		'member_id',
		'use_order_id',
		'goods_type',
		'goods_ids',
		'at_least',
		'money',
		'discount',
		'discount_limit',
		'is_mark',
		'member_label_ids',
		'is_share',
		'is_handsel',
		'is_forbid_preference',
		'is_expire_notice',
		'expire_notice_fixed_term',
		'is_noticed',
		'state',
		'get_type',
		'related_id',
		'fetch_time',
		'use_time',
		'start_time',
		'end_time',
	];
}
