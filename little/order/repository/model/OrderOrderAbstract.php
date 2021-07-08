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

namespace little\order\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property order_id $int
 * @property order_no $string 订单编号
 * @property site_id $int 商家id
 * @property site_name $string 店铺名称
 * @property website_id $int 分站id
 * @property order_name $string 订单内容
 * @property order_from $string 订单来源
 * @property order_from_name $string 订单来源名称
 * @property order_type $int 订单类型 1. 普通订单  2. 门店订单  3. 本地配送订单4. 虚拟订单
 * @property order_type_name $string 订单类型名称
 * @property order_promotion_type $int 订单营销类型
 * @property order_promotion_name $string 营销活动类型名称
 * @property promotion_id $int 营销活动id
 * @property out_trade_no $string 支付流水号
 * @property out_trade_no_2 $string 支付流水号（多次支付）
 * @property delivery_code $string 整体提货编码
 * @property order_status $int 订单状态
 * @property order_status_name $string 订单状态名称
 * @property order_status_action $string 订单操作
 * @property pay_status $int 支付状态
 * @property delivery_status $int 配送状态
 * @property refund_status $int 退款状态
 * @property pay_type $string 支付方式
 * @property pay_type_name $string 支付类型名称
 * @property delivery_type $string 配送方式
 * @property delivery_type_name $string 配送方式名称
 * @property member_id $int 购买人uid
 * @property name $string 购买人姓名
 * @property mobile $string 购买人手机
 * @property telephone $string 购买人固定电话
 * @property province_id $int 购买人省id
 * @property city_id $int 购买人市id
 * @property district_id $int 购买人区县id
 * @property community_id $int 购买人社区id
 * @property address $string 购买人地址
 * @property full_address $string 购买人详细地址
 * @property longitude $string 购买人地址经度
 * @property latitude $string 购买人地址纬度
 * @property buyer_ip $string 购买人ip
 * @property buyer_ask_delivery_time $int 购买人要求配送时间
 * @property buyer_message $string 购买人留言信息
 * @property order_invoice_company $string 发票公司名称
 * @property order_invoice_type $int 发票类型
 * @property order_invoice_type_name $string 发票类型名称
 * @property order_invoice_trade_type $int 发票行业类型
 * @property order_invoice_rate $float 发票税率
 * @property goods_money $float 商品总金额
 * @property delivery_money $float 配送费用
 * @property promotion_money $float 订单优惠金额（满减）
 * @property coupon_id $int 优惠券id
 * @property coupon_money $float 优惠券金额
 * @property invoice_money $float 发票金额
 * @property order_money $float 订单合计金额
 * @property adjust_money $float 订单调整金额
 * @property balance_money $float 余额支付金额
 * @property pay_money $float 抵扣之后应付金额
 * @property create_time $int 创建时间
 * @property pay_time $int 订单支付时间
 * @property delivery_time $int 订单配送时间
 * @property sign_time $int 订单签收时间
 * @property finish_time $int 订单完成时间
 * @property close_time $int 订单关闭时间
 * @property is_lock $int 是否锁定订单（针对维权，锁定不可操作）
 * @property is_evaluate $int 是否允许订单评价
 * @property is_delete $int 是否删除(针对后台)
 * @property is_enable_refund $int 是否允许退款
 * @property remark $string 卖家留言
 * @property goods_num $int 商品件数
 * @property delivery_store_id $int 门店id
 * @property delivery_status_name $string 发货状态
 * @property is_settlement $int 是否进行结算
 * @property delivery_store_name $string 门店名称
 * @property promotion_type $string 营销类型
 * @property promotion_type_name $string 营销类型名称
 * @property promotion_status_name $string 营销状态名称
 * @property delivery_store_info $string 门店信息(json)
 * @property virtual_code $string 虚拟商品码
 * @property evaluate_status $int 评价状态，0：未评价，1：已评价，2：已追评
 * @property evaluate_status_name $string 评价状态名称，未评价，已评价，已追评
 * @property shop_money $float 店铺金额
 * @property platform_money $float 平台金额
 * @property refund_money $float 订单退款金额
 * @property refund_shop_money $float 退款店铺金额
 * @property refund_platform_money $float 退款平台结算金额
 * @property commission $float 总支出佣金
 * @property settlement_id $int shop_settlement表结算id
 * @property store_settlement_id $int 门店结算id
 * @property platform_coupon_id $int 平台券id
 * @property platform_coupon_money $float 平台券平台分摊优惠
 * @property platform_coupon_total_money $float 平台券总金额
 * @property platform_coupon_shop_money $float 平台券店铺分摊优惠
 * @property is_invoice $int 是否需要发票 0 无发票  1 有发票
 * @property invoice_type $int 发票类型  1 纸质发票 2 电子发票
 * @property invoice_title $string 发票抬头
 * @property taxpayer_number $string 纳税人识别号
 * @property invoice_rate $float 发票税率
 * @property invoice_content $string 发票内容
 * @property invoice_delivery_money $float 发票邮寄费用
 * @property invoice_full_address $string 发票邮寄地址
 * @property is_tax_invoice $int 是否需要增值税专用发票
 * @property invoice_email $string 发票发送邮件
 * @property invoice_title_type $int 发票抬头类型  1 个人  2 企业
 */
abstract class OrderOrderAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'order_order';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'order_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'order_id' => 'int',
		'order_no' => 'string',
		'site_id' => 'int',
		'site_name' => 'string',
		'website_id' => 'int',
		'order_name' => 'string',
		'order_from' => 'string',
		'order_from_name' => 'string',
		'order_type' => 'int',
		'order_type_name' => 'string',
		'order_promotion_type' => 'int',
		'order_promotion_name' => 'string',
		'promotion_id' => 'int',
		'out_trade_no' => 'string',
		'out_trade_no_2' => 'string',
		'delivery_code' => 'string',
		'order_status' => 'int',
		'order_status_name' => 'string',
		'order_status_action' => 'string',
		'pay_status' => 'int',
		'delivery_status' => 'int',
		'refund_status' => 'int',
		'pay_type' => 'string',
		'pay_type_name' => 'string',
		'delivery_type' => 'string',
		'delivery_type_name' => 'string',
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
		'buyer_ip' => 'string',
		'buyer_ask_delivery_time' => 'int',
		'buyer_message' => 'string',
		'order_invoice_company' => 'string',
		'order_invoice_type' => 'int',
		'order_invoice_type_name' => 'string',
		'order_invoice_trade_type' => 'int',
		'order_invoice_rate' => 'float',
		'goods_money' => 'float',
		'delivery_money' => 'float',
		'promotion_money' => 'float',
		'coupon_id' => 'int',
		'coupon_money' => 'float',
		'invoice_money' => 'float',
		'order_money' => 'float',
		'adjust_money' => 'float',
		'balance_money' => 'float',
		'pay_money' => 'float',
		'create_time' => 'int',
		'pay_time' => 'int',
		'delivery_time' => 'int',
		'sign_time' => 'int',
		'finish_time' => 'int',
		'close_time' => 'int',
		'is_lock' => 'int',
		'is_evaluate' => 'int',
		'is_delete' => 'int',
		'is_enable_refund' => 'int',
		'remark' => 'string',
		'goods_num' => 'int',
		'delivery_store_id' => 'int',
		'delivery_status_name' => 'string',
		'is_settlement' => 'int',
		'delivery_store_name' => 'string',
		'promotion_type' => 'string',
		'promotion_type_name' => 'string',
		'promotion_status_name' => 'string',
		'delivery_store_info' => 'string',
		'virtual_code' => 'string',
		'evaluate_status' => 'int',
		'evaluate_status_name' => 'string',
		'shop_money' => 'float',
		'platform_money' => 'float',
		'refund_money' => 'float',
		'refund_shop_money' => 'float',
		'refund_platform_money' => 'float',
		'commission' => 'float',
		'settlement_id' => 'int',
		'store_settlement_id' => 'int',
		'platform_coupon_id' => 'int',
		'platform_coupon_money' => 'float',
		'platform_coupon_total_money' => 'float',
		'platform_coupon_shop_money' => 'float',
		'is_invoice' => 'int',
		'invoice_type' => 'int',
		'invoice_title' => 'string',
		'taxpayer_number' => 'string',
		'invoice_rate' => 'float',
		'invoice_content' => 'string',
		'invoice_delivery_money' => 'float',
		'invoice_full_address' => 'string',
		'is_tax_invoice' => 'int',
		'invoice_email' => 'string',
		'invoice_title_type' => 'int',
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
	public $field = [
		'order_id',
		'order_no',
		'site_id',
		'site_name',
		'website_id',
		'order_name',
		'order_from',
		'order_from_name',
		'order_type',
		'order_type_name',
		'order_promotion_type',
		'order_promotion_name',
		'promotion_id',
		'out_trade_no',
		'out_trade_no_2',
		'delivery_code',
		'order_status',
		'order_status_name',
		'order_status_action',
		'pay_status',
		'delivery_status',
		'refund_status',
		'pay_type',
		'pay_type_name',
		'delivery_type',
		'delivery_type_name',
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
		'buyer_ip',
		'buyer_ask_delivery_time',
		'buyer_message',
		'order_invoice_company',
		'order_invoice_type',
		'order_invoice_type_name',
		'order_invoice_trade_type',
		'order_invoice_rate',
		'goods_money',
		'delivery_money',
		'promotion_money',
		'coupon_id',
		'coupon_money',
		'invoice_money',
		'order_money',
		'adjust_money',
		'balance_money',
		'pay_money',
		'create_time',
		'pay_time',
		'delivery_time',
		'sign_time',
		'finish_time',
		'close_time',
		'is_lock',
		'is_evaluate',
		'is_delete',
		'is_enable_refund',
		'remark',
		'goods_num',
		'delivery_store_id',
		'delivery_status_name',
		'is_settlement',
		'delivery_store_name',
		'promotion_type',
		'promotion_type_name',
		'promotion_status_name',
		'delivery_store_info',
		'virtual_code',
		'evaluate_status',
		'evaluate_status_name',
		'shop_money',
		'platform_money',
		'refund_money',
		'refund_shop_money',
		'refund_platform_money',
		'commission',
		'settlement_id',
		'store_settlement_id',
		'platform_coupon_id',
		'platform_coupon_money',
		'platform_coupon_total_money',
		'platform_coupon_shop_money',
		'is_invoice',
		'invoice_type',
		'invoice_title',
		'taxpayer_number',
		'invoice_rate',
		'invoice_content',
		'invoice_delivery_money',
		'invoice_full_address',
		'is_tax_invoice',
		'invoice_email',
		'invoice_title_type',
	];
}
