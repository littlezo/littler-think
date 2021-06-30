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

namespace little\member\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property order_id $int
 * @property recharge_id $int 套餐ID
 * @property recharge_name $string 套餐名称
 * @property site_id $int 店铺ID
 * @property site_name $string 店铺名称
 * @property order_no $string 订单编号
 * @property out_trade_no $string 订单流水号
 * @property cover_img $string 封面
 * @property face_value $float 面值
 * @property buy_price $float 价格
 * @property point $int 积分
 * @property growth $int 成长值
 * @property coupon_id $string 优惠券ID
 * @property price $int 实付金额
 * @property pay_type $string 支付方式
 * @property pay_type_name $string 支付方式名称
 * @property status $string 支付状态（1未支付 2已支付）
 * @property create_time $int 创建时间
 * @property pay_time $int 支付时间
 * @property member_id $int 用户ID
 * @property member_img $string 用户头像
 * @property nickname $string 用户昵称
 * @property order_from $string 订单来源
 * @property order_from_name $string 订单来源名称
 */
abstract class MemberRechargeOrderAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_recharge_order';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'order_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'order_id' => 'int',
		'recharge_id' => 'int',
		'recharge_name' => 'string',
		'site_id' => 'int',
		'site_name' => 'string',
		'order_no' => 'string',
		'out_trade_no' => 'string',
		'cover_img' => 'string',
		'face_value' => 'float',
		'buy_price' => 'float',
		'point' => 'int',
		'growth' => 'int',
		'coupon_id' => 'string',
		'price' => 'int',
		'pay_type' => 'string',
		'pay_type_name' => 'string',
		'status' => 'string',
		'create_time' => 'int',
		'pay_time' => 'int',
		'member_id' => 'int',
		'member_img' => 'string',
		'nickname' => 'string',
		'order_from' => 'string',
		'order_from_name' => 'string',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'order_id' => 'int unsigned',
		'recharge_id' => 'int',
		'recharge_name' => 'varchar',
		'site_id' => 'int',
		'site_name' => 'varchar',
		'order_no' => 'varchar',
		'out_trade_no' => 'varchar',
		'cover_img' => 'varchar',
		'face_value' => 'decimal',
		'buy_price' => 'decimal',
		'point' => 'int',
		'growth' => 'int',
		'coupon_id' => 'varchar',
		'price' => 'int',
		'pay_type' => 'varchar',
		'pay_type_name' => 'varchar',
		'status' => 'varchar',
		'create_time' => 'timestamp',
		'pay_time' => 'timestamp',
		'member_id' => 'int',
		'member_img' => 'varchar',
		'nickname' => 'varchar',
		'order_from' => 'varchar',
		'order_from_name' => 'varchar',
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
	protected $field = [
		'order_id',
		'recharge_id',
		'recharge_name',
		'site_id',
		'site_name',
		'order_no',
		'out_trade_no',
		'cover_img',
		'face_value',
		'buy_price',
		'point',
		'growth',
		'coupon_id',
		'price',
		'pay_type',
		'pay_type_name',
		'status',
		'create_time',
		'pay_time',
		'member_id',
		'member_img',
		'nickname',
		'order_from',
		'order_from_name',
	];
}
