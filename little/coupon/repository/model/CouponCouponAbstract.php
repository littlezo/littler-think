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
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property coupon_id $int 优惠券id
 * @property type $int 优惠券类型 0-平台 1-满减  2-折扣 3-随机
 * @property coupon_name $string 优惠券名称
 * @property coupon_type_id $int 优惠券类型id
 * @property site_id $int 站点Id
 * @property site_name $string 站点名称
 * @property coupon_code $string 优惠券编码
 * @property member_id $int 领用人
 * @property use_order_id $int 优惠券使用订单id
 * @property goods_type $int 适用商品类型 0-平台类型不指定 1-全部商品可用；2-指定商品可用；3-指定商品不可用
 * @property goods_ids $string 适用商品id 商户指定商品
 * @property at_least $float 最小金额
 * @property money $float 面额
 * @property discount $float 1 =< 折扣 <= 9.9 当type为2时需要添加
 * @property discount_limit $float 最多折扣金额 当type为2时可选择性添加
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
 * @property use_scenario $int 使用场景（1全场通用 2指定店铺） type为0 有效
 * @property group_ids $string 店铺等级ids  type为0 有效
 * @property platform_split_rare $float 平台分担比例  type为0 有效
 * @property shop_split_rare $float 店铺分店比例  type为0 有效
 */
abstract class CouponCouponAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'coupon_coupon';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'coupon_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'coupon_id' => 'int',
		'type' => 'int',
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
		'use_scenario' => 'int',
		'group_ids' => 'string',
		'platform_split_rare' => 'float',
		'shop_split_rare' => 'float',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['goods_ids', 'group_ids'];

	/**
	 * @var array $json JSON字段自动转数组
	 */
	protected $jsonAssoc = true;

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
		'use_scenario',
		'group_ids',
		'platform_split_rare',
		'shop_split_rare',
	];
}
