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
 * @property order_name $string 订单内容
 * @property order_from $string 订单来源
 * @property order_type $int 订单类型 1. 线上订单  2. 线下订单  3. 抵扣卷订单  4余额订单 5现金券 6区域代理订单  10贡献值订单
 * @property out_trade_no $string 支付流水号
 * @property pay_type $int 支付方式 1微信 2 支付宝 3 余额
 * @property member_id $int 购买人uid
 * @property name $string 购买人姓名
 * @property mobile $string 购买人手机
 * @property pay_money $float 实付金额
 * @property create_time $int 创建时间
 * @property order_status $int 订单状态  1待发货  2已发货 3已完成 4退款中 5 已退款  6拼团进行中
 * @property pay_status $int 支付状态 1已支付
 * @property pay_time $int 订单支付时间
 * @property is_lock $int 是否锁定订单（针对维权，锁定不可操作）
 * @property order_detail $string 订单详情
 */
abstract class DetailAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

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
		'pay_type' => 'int',
		'member_id' => 'int',
		'name' => 'string',
		'mobile' => 'string',
		'pay_money' => 'float',
		'create_time' => 'int',
		'order_status' => 'int',
		'pay_status' => 'int',
		'pay_time' => 'int',
		'is_lock' => 'int',
		'order_detail' => 'string',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['order_detail'];

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
		'pay_type',
		'member_id',
		'name',
		'mobile',
		'pay_money',
		'create_time',
		'order_status',
		'pay_status',
		'pay_time',
		'is_lock',
		'order_detail',
	];
}
