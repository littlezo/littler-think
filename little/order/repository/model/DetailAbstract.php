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
use think\model\concern\SoftDelete;

/**
 * @property order_id $int
 * @property order_no $string 订单编号
 * @property site_id $int 商家id
 * @property order_name $string 订单内容
 * @property order_from $string 订单来源
 * @property order_type $int 订单类型 1. 线上订单  2. 线下订单  3. 抵扣卷订单  4余额订单
 * @property out_trade_no $string 支付流水号
 * @property out_trade_no_2 $string 支付流水号（多次支付）
 * @property delivery_code $string 整体提货编码
 * @property delivery_status $int 配送状态
 * @property pay_type $int 支付方式 1微信 2 支付宝 3 余额
 * @property delivery_type $int 配送方式 1物流 2 到店
 * @property member_id $int 购买人uid
 * @property name $string 购买人姓名
 * @property mobile $string 购买人手机
 * @property province_id $int 购买人省id
 * @property city_id $int 购买人市id
 * @property district_id $int 购买人区县id
 * @property community_id $int 购买人社区id
 * @property address $string 购买人地址
 * @property full_address $string 购买人详细地址
 * @property longitude $string 购买人地址经度
 * @property latitude $string 购买人地址纬度
 * @property buyer_message $string 购买人留言信息
 * @property order_invoice_company $string 发票公司名称
 * @property order_invoice_type $int 发票类型
 * @property order_invoice_type_name $string 发票类型名称
 * @property order_invoice_trade_type $int 发票行业类型
 * @property goods_money $float 商品总金额
 * @property order_money $float 订单合计金额
 * @property deduct_money $float 优惠抵扣金额
 * @property adjust_money $float 订单调整金额
 * @property balance_money $float 余额支付金额
 * @property delivery_money $float 配送费用
 * @property order_invoice_rate $float 发票税率
 * @property invoice_money $float 发票金额
 * @property pay_money $float 实付金额
 * @property create_time $int 创建时间
 * @property order_status $int 订单状态
 * @property pay_status $int 支付状态
 * @property pay_time $int 订单支付时间
 * @property delivery_time $int 订单配送时间
 * @property sign_time $int 订单签收时间
 * @property finish_time $int 订单完成时间
 * @property close_time $int 订单关闭时间
 * @property is_lock $int 是否锁定订单（针对维权，锁定不可操作）
 * @property is_evaluate $int 是否允许订单评价
 * @property delete_time $int 删除时间
 * @property is_enable_refund $int 是否允许退款
 * @property remark $string 卖家留言
 * @property goods_num $int 商品件数
 * @property is_settlement $int 是否进行结算
 * @property promotion_id $int 营销活动id
 * @property promotion_type $string 营销类型
 * @property promotion_details $string 营销详情
 * @property evaluate_status $int 评价状态，0：未评价，1：已评价，2：已追评
 * @property shop_money $float 店铺金额
 * @property platform_money $float 平台金额
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
 * @property order_status_action $string 订单操作
 */
abstract class DetailAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;
	use SoftDelete;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'order_detail';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'order_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'order_id' => 'int',
		'order_no' => 'string',
		'site_id' => 'int',
		'order_name' => 'string',
		'order_from' => 'string',
		'order_type' => 'int',
		'out_trade_no' => 'string',
		'out_trade_no_2' => 'string',
		'delivery_code' => 'string',
		'delivery_status' => 'int',
		'pay_type' => 'int',
		'delivery_type' => 'int',
		'member_id' => 'int',
		'name' => 'string',
		'mobile' => 'string',
		'province_id' => 'int',
		'city_id' => 'int',
		'district_id' => 'int',
		'community_id' => 'int',
		'address' => 'string',
		'full_address' => 'string',
		'longitude' => 'string',
		'latitude' => 'string',
		'buyer_message' => 'string',
		'order_invoice_company' => 'string',
		'order_invoice_type' => 'int',
		'order_invoice_type_name' => 'string',
		'order_invoice_trade_type' => 'int',
		'goods_money' => 'float',
		'order_money' => 'float',
		'deduct_money' => 'float',
		'adjust_money' => 'float',
		'balance_money' => 'float',
		'delivery_money' => 'float',
		'order_invoice_rate' => 'float',
		'invoice_money' => 'float',
		'pay_money' => 'float',
		'create_time' => 'int',
		'order_status' => 'int',
		'pay_status' => 'int',
		'pay_time' => 'int',
		'delivery_time' => 'int',
		'sign_time' => 'int',
		'finish_time' => 'int',
		'close_time' => 'int',
		'is_lock' => 'int',
		'is_evaluate' => 'int',
		'delete_time' => 'int',
		'is_enable_refund' => 'int',
		'remark' => 'string',
		'goods_num' => 'int',
		'is_settlement' => 'int',
		'promotion_id' => 'int',
		'promotion_type' => 'string',
		'promotion_details' => 'string',
		'evaluate_status' => 'int',
		'shop_money' => 'float',
		'platform_money' => 'float',
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
		'order_status_action' => 'string',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['promotion_details', 'order_status_action'];

	/**
	 * @var array $json JSON字段自动转数组
	 */
	protected $jsonAssoc = true;

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
		'order_name',
		'order_from',
		'order_type',
		'out_trade_no',
		'out_trade_no_2',
		'delivery_code',
		'delivery_status',
		'pay_type',
		'delivery_type',
		'member_id',
		'name',
		'mobile',
		'province_id',
		'city_id',
		'district_id',
		'community_id',
		'address',
		'full_address',
		'longitude',
		'latitude',
		'buyer_message',
		'order_invoice_company',
		'order_invoice_type',
		'order_invoice_type_name',
		'order_invoice_trade_type',
		'goods_money',
		'order_money',
		'deduct_money',
		'adjust_money',
		'balance_money',
		'delivery_money',
		'order_invoice_rate',
		'invoice_money',
		'pay_money',
		'create_time',
		'order_status',
		'pay_status',
		'pay_time',
		'delivery_time',
		'sign_time',
		'finish_time',
		'close_time',
		'is_lock',
		'is_evaluate',
		'delete_time',
		'is_enable_refund',
		'remark',
		'goods_num',
		'is_settlement',
		'promotion_id',
		'promotion_type',
		'promotion_details',
		'evaluate_status',
		'shop_money',
		'platform_money',
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
		'order_status_action',
	];
}
