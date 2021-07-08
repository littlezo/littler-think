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

namespace little\store\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int
 * @property settlement_no $string 流水号
 * @property site_id $int 站点id
 * @property site_name $string 站点名称
 * @property store_id $int 门店id
 * @property store_name $string 门店名称
 * @property order_money $float 订单总金额
 * @property shop_money $float 店铺金额
 * @property refund_platform_money $float 平台退款抽成
 * @property platform_money $float 平台抽成
 * @property refund_shop_money $float 店铺退款金额
 * @property refund_money $float 退款金额
 * @property create_time $int 创建时间
 * @property start_time $int 账期开始时间
 * @property end_time $int 账期结束时间
 * @property commission $float 佣金支出
 * @property is_settlement $int 是否结算
 * @property remark $string 备注
 * @property offline_order_money $float 线下支付的订单金额
 * @property offline_refund_money $float 线下退款金额
 */
abstract class StoreSettlementAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'store_settlement';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'settlement_no' => 'string',
		'site_id' => 'int',
		'site_name' => 'string',
		'store_id' => 'int',
		'store_name' => 'string',
		'order_money' => 'float',
		'shop_money' => 'float',
		'refund_platform_money' => 'float',
		'platform_money' => 'float',
		'refund_shop_money' => 'float',
		'refund_money' => 'float',
		'create_time' => 'int',
		'start_time' => 'int',
		'end_time' => 'int',
		'commission' => 'float',
		'is_settlement' => 'int',
		'remark' => 'string',
		'offline_order_money' => 'float',
		'offline_refund_money' => 'float',
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
		'id',
		'settlement_no',
		'site_id',
		'site_name',
		'store_id',
		'store_name',
		'order_money',
		'shop_money',
		'refund_platform_money',
		'platform_money',
		'refund_shop_money',
		'refund_money',
		'create_time',
		'start_time',
		'end_time',
		'commission',
		'is_settlement',
		'remark',
		'offline_order_money',
		'offline_refund_money',
	];
}
