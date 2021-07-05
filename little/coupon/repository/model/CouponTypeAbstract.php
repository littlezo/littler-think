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
 * @property coupon_type_id $int 优惠券类型Id
 * @property type $string 优惠券类型 0-平台 1-满减  2-折扣 3-随机
 * @property site_id $int 站点id
 * @property site_name $string 站点名称
 * @property coupon_name $string 优惠券名称
 * @property coupon_name_remark $string 名称备注
 * @property image $string 优惠券图片
 * @property count $int 发放数量
 * @property lead_count $int 已领取数量
 * @property used_count $int 已使用数量
 * @property goods_type $int 适用商品类型1-全部商品可用；2-指定商品可用；3-指定商品不可用
 * @property goods_ids $string 适用商品id
 * @property is_limit $int 使用门槛0-无门槛 1-有门槛
 * @property at_least $float 满多少元使用 0代表无限制
 * @property money $float 发放面额 当type为1时需要添加
 * @property discount $float 1 =< 折扣 <= 9.9 当type为2时需要添加
 * @property discount_limit $float 最多折扣金额 当type为2时可选择性添加
 * @property min_money $float 最低金额 当type为3时需要添加
 * @property max_money $float 最大金额 当type为3时需要添加
 * @property validity_type $int 过期类型1-时间范围过期 2-领取之日固定日期后过期 3-领取次日固定日期后过期
 * @property start_use_time $int 使用开始日期 过期类型1时必填
 * @property end_use_time $int 使用结束日期 过期类型1时必填
 * @property fixed_term $int 当validity_type为2或者3时需要添加 领取之日起或者次日N天内有效
 * @property is_limit_member $int 是否限制会员身份0-不限制 1限制
 * @property member_level_ids $string 若开启会员身份限制,需要添加会员等级id
 * @property is_limitless $int 是否无限制0-否 1是
 * @property max_fetch $int 每人最大领取个数
 * @property is_expire_notice $int 是否开启过期提醒0-不开启 1-开启
 * @property expire_notice_fixed_term $int 过期前N天提醒
 * @property is_mark $int 是否同时给会员打标签 0-否 1-是
 * @property member_label_ids $string 会员标签id
 * @property is_share $int 分享设置 优惠券允许分享给好友领取
 * @property is_handsel $int 转赠设置 优惠券允许转赠给好友
 * @property is_forbid_preference $int 优惠叠加 0-不限制 1- 优惠券仅原价购买商品时可用
 * @property is_show $int 是否显示
 * @property discount_order_money $float 订单的优惠总金额
 * @property order_money $float 用券总成交额
 * @property is_forbidden $int 是否禁止发放0-否 1-是
 * @property old_member_num $int 使用优惠券的老会员数
 * @property new_member_num $int 平台第一次购买使用优惠券的会员数
 * @property order_goods_num $int 使用优惠券购买的商品数量
 * @property status $int 状态（1进行中2已结束-1已关闭）
 * @property create_time $int 创建时间
 * @property update_time $int 修改时间
 * @property end_time $int 有效日期结束时间
 * @property use_scenario $int 使用场景（1全场通用 2指定店铺） type=0 有效
 * @property group_ids $string 店铺等级ids  type=0 有效
 * @property platform_split_rare $float 平台分担比例  type=0 有效
 * @property shop_split_rare $float   店铺分店比例 type=0 有效
 */
abstract class CouponTypeAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'coupon_type';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'coupon_type_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'coupon_type_id' => 'int',
		'type' => 'string',
		'site_id' => 'int',
		'site_name' => 'string',
		'coupon_name' => 'string',
		'coupon_name_remark' => 'string',
		'image' => 'string',
		'count' => 'int',
		'lead_count' => 'int',
		'used_count' => 'int',
		'goods_type' => 'int',
		'goods_ids' => 'string',
		'is_limit' => 'int',
		'at_least' => 'float',
		'money' => 'float',
		'discount' => 'float',
		'discount_limit' => 'float',
		'min_money' => 'float',
		'max_money' => 'float',
		'validity_type' => 'int',
		'start_use_time' => 'int',
		'end_use_time' => 'int',
		'fixed_term' => 'int',
		'is_limit_member' => 'int',
		'member_level_ids' => 'string',
		'is_limitless' => 'int',
		'max_fetch' => 'int',
		'is_expire_notice' => 'int',
		'expire_notice_fixed_term' => 'int',
		'is_mark' => 'int',
		'member_label_ids' => 'string',
		'is_share' => 'int',
		'is_handsel' => 'int',
		'is_forbid_preference' => 'int',
		'is_show' => 'int',
		'discount_order_money' => 'float',
		'order_money' => 'float',
		'is_forbidden' => 'int',
		'old_member_num' => 'int',
		'new_member_num' => 'int',
		'order_goods_num' => 'int',
		'status' => 'int',
		'create_time' => 'int',
		'update_time' => 'int',
		'end_time' => 'int',
		'use_scenario' => 'int',
		'group_ids' => 'string',
		'platform_split_rare' => 'float',
		'shop_split_rare' => 'float',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['group_ids'];

	/**
	 * @var array $json JSON字段自动转数组
	 */
	protected $jsonAssoc = true;

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'coupon_type_id',
		'type',
		'site_id',
		'site_name',
		'coupon_name',
		'coupon_name_remark',
		'image',
		'count',
		'lead_count',
		'used_count',
		'goods_type',
		'goods_ids',
		'is_limit',
		'at_least',
		'money',
		'discount',
		'discount_limit',
		'min_money',
		'max_money',
		'validity_type',
		'start_use_time',
		'end_use_time',
		'fixed_term',
		'is_limit_member',
		'member_level_ids',
		'is_limitless',
		'max_fetch',
		'is_expire_notice',
		'expire_notice_fixed_term',
		'is_mark',
		'member_label_ids',
		'is_share',
		'is_handsel',
		'is_forbid_preference',
		'is_show',
		'discount_order_money',
		'order_money',
		'is_forbidden',
		'old_member_num',
		'new_member_num',
		'order_goods_num',
		'status',
		'create_time',
		'update_time',
		'end_time',
		'use_scenario',
		'group_ids',
		'platform_split_rare',
		'shop_split_rare',
	];
}
