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
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property order_goods_id $int
 * @property order_id $int 订单id
 * @property order_no $string 订单编号
 * @property site_id $int 商家id
 * @property site_name $string 店铺名称
 * @property website_id $int 分站id
 * @property member_id $int 购买会员id
 * @property goods_id $int 商品id
 * @property sku_id $int 商品skuid
 * @property sku_name $string 商品名称
 * @property sku_image $string 商品图片
 * @property sku_no $string 商品编码
 * @property is_virtual $int 是否是虚拟商品
 * @property goods_class $int 商品种类(1.实物 2.虚拟3.卡券)
 * @property goods_class_name $string 商品类型名称
 * @property price $float 商品卖价
 * @property cost_price $float 成本价
 * @property num $int 购买数量
 * @property goods_money $float 商品总价
 * @property cost_money $float 成本总价
 * @property delivery_status $int 配送状态
 * @property delivery_no $string 配送单号
 * @property gift_flag $int 赠品标识
 * @property refund_no $string 退款编号（申请产生）
 * @property refund_status $int 退款状态
 * @property refund_status_name $string 退款状态名称
 * @property refund_status_action $string 退款操作
 * @property refund_type $int 退款方式
 * @property refund_apply_money $float 退款申请金额
 * @property refund_reason $string 退款原因
 * @property refund_real_money $float 实际退款金额
 * @property refund_delivery_name $string 退款公司名称
 * @property refund_delivery_no $string 退款单号
 * @property refund_time $int 实际退款时间
 * @property refund_refuse_reason $string 退款拒绝原因
 * @property refund_action_time $int 退款时间
 * @property delivery_status_name $string 配送状态名称
 * @property commission_rate $float 待结算佣金比率
 * @property real_goods_money $float 实际商品购买价
 * @property shop_money $float 店铺实际金额
 * @property platform_money $float 平台实际金额
 * @property is_settlement $int 是否结算
 * @property refund_remark $string 退款说明
 * @property refund_delivery_remark $string 买家退货说明
 * @property refund_address $string 退货地址
 * @property is_refund_stock $int 是否返还库存
 * @property refund_money_type $int 退款方式   1 原路退款 2线下退款
 * @property promotion_money $float 优惠活动金额
 * @property coupon_money $float 优惠券金额
 * @property adjust_money $float 调整金额
 * @property platform_coupon_money $float
 * @property is_present $int
 */
abstract class OrderGoodsAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'order_goods';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'order_goods_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'order_goods_id' => 'int',
		'order_id' => 'int',
		'order_no' => 'string',
		'site_id' => 'int',
		'site_name' => 'string',
		'website_id' => 'int',
		'member_id' => 'int',
		'goods_id' => 'int',
		'sku_id' => 'int',
		'sku_name' => 'string',
		'sku_image' => 'string',
		'sku_no' => 'string',
		'is_virtual' => 'int',
		'goods_class' => 'int',
		'goods_class_name' => 'string',
		'price' => 'float',
		'cost_price' => 'float',
		'num' => 'int',
		'goods_money' => 'float',
		'cost_money' => 'float',
		'delivery_status' => 'int',
		'delivery_no' => 'string',
		'gift_flag' => 'int',
		'refund_no' => 'string',
		'refund_status' => 'int',
		'refund_status_name' => 'string',
		'refund_status_action' => 'string',
		'refund_type' => 'int',
		'refund_apply_money' => 'float',
		'refund_reason' => 'string',
		'refund_real_money' => 'float',
		'refund_delivery_name' => 'string',
		'refund_delivery_no' => 'string',
		'refund_time' => 'int',
		'refund_refuse_reason' => 'string',
		'refund_action_time' => 'int',
		'delivery_status_name' => 'string',
		'commission_rate' => 'float',
		'real_goods_money' => 'float',
		'shop_money' => 'float',
		'platform_money' => 'float',
		'is_settlement' => 'int',
		'refund_remark' => 'string',
		'refund_delivery_remark' => 'string',
		'refund_address' => 'string',
		'is_refund_stock' => 'int',
		'refund_money_type' => 'int',
		'promotion_money' => 'float',
		'coupon_money' => 'float',
		'adjust_money' => 'float',
		'platform_coupon_money' => 'float',
		'is_present' => 'int',
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
		'order_goods_id',
		'order_id',
		'order_no',
		'site_id',
		'site_name',
		'website_id',
		'member_id',
		'goods_id',
		'sku_id',
		'sku_name',
		'sku_image',
		'sku_no',
		'is_virtual',
		'goods_class',
		'goods_class_name',
		'price',
		'cost_price',
		'num',
		'goods_money',
		'cost_money',
		'delivery_status',
		'delivery_no',
		'gift_flag',
		'refund_no',
		'refund_status',
		'refund_status_name',
		'refund_status_action',
		'refund_type',
		'refund_apply_money',
		'refund_reason',
		'refund_real_money',
		'refund_delivery_name',
		'refund_delivery_no',
		'refund_time',
		'refund_refuse_reason',
		'refund_action_time',
		'delivery_status_name',
		'commission_rate',
		'real_goods_money',
		'shop_money',
		'platform_money',
		'is_settlement',
		'refund_remark',
		'refund_delivery_remark',
		'refund_address',
		'is_refund_stock',
		'refund_money_type',
		'promotion_money',
		'coupon_money',
		'adjust_money',
		'platform_coupon_money',
		'is_present',
	];
}
