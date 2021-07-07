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

namespace little\exchange\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property order_id $int
 * @property order_no $string 订单编号
 * @property member_id $int 对应会员
 * @property out_trade_no $string 支付流水号（线上支付有效）
 * @property point $int 兑换积分数
 * @property exchange_price $float 兑换价格
 * @property delivery_price $float 邮费
 * @property price $float 实际应付金额
 * @property express_no $string 物流单号（礼品发货）
 * @property create_time $int 创建时间
 * @property pay_time $int 兑换成功时间
 * @property exchange_id $int 兑换商品id
 * @property exchange_name $string 兑换商品名称
 * @property exchange_image $string 兑换商品图片
 * @property num $int 兑换数量
 * @property order_status $int 状态
 * @property type $int 类型
 * @property type_name $string 类型名称
 * @property name $string 姓名
 * @property mobile $string 手机号
 * @property telephone $string 电话
 * @property province_id $int 省id
 * @property city_id $int 市id
 * @property district_id $int 区县id
 * @property community_id $int 社区id
 * @property address $string 地址信息
 * @property full_address $string 详细地址信息
 * @property longitude $string 经度
 * @property latitude $string 纬度
 * @property buyer_message $string 买家留言
 * @property order_from $string 订单来源
 * @property order_from_name $string 订单来源名称
 * @property type_id $int 关联id
 * @property balance $float 赠送红包
 */
abstract class ExchangeOrderAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'exchange_order';

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
		'member_id' => 'int',
		'out_trade_no' => 'string',
		'point' => 'int',
		'exchange_price' => 'float',
		'delivery_price' => 'float',
		'price' => 'float',
		'express_no' => 'string',
		'create_time' => 'int',
		'pay_time' => 'int',
		'exchange_id' => 'int',
		'exchange_name' => 'string',
		'exchange_image' => 'string',
		'num' => 'int',
		'order_status' => 'int',
		'type' => 'int',
		'type_name' => 'string',
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
		'buyer_message' => 'string',
		'order_from' => 'string',
		'order_from_name' => 'string',
		'type_id' => 'int',
		'balance' => 'float',
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
		'member_id',
		'out_trade_no',
		'point',
		'exchange_price',
		'delivery_price',
		'price',
		'express_no',
		'create_time',
		'pay_time',
		'exchange_id',
		'exchange_name',
		'exchange_image',
		'num',
		'order_status',
		'type',
		'type_name',
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
		'buyer_message',
		'order_from',
		'order_from_name',
		'type_id',
		'balance',
	];
}
