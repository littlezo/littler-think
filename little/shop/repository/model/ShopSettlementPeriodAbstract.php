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

namespace little\shop\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property period_id $int
 * @property period_no $string 流水号
 * @property shop_num $int 结算店铺数量
 * @property order_money $float 订单总金额
 * @property shop_money $float
 * @property refund_shop_money $float 退款总金额
 * @property platform_money $float 平台抽成
 * @property refund_platform_money $float
 * @property refund_money $float 退款金额
 * @property period_start_time $int 账期开始时间
 * @property period_end_time $int 账期结算时间
 * @property commission $float 佣金金额
 * @property create_time $int 创建时间
 * @property website_commission $float 分站总分成
 * @property platform_coupon_money $float 平台优惠券平台承担金额
 */
abstract class ShopSettlementPeriodAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'shop_settlement_period';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'period_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'period_id' => 'int',
		'period_no' => 'string',
		'shop_num' => 'int',
		'order_money' => 'float',
		'shop_money' => 'float',
		'refund_shop_money' => 'float',
		'platform_money' => 'float',
		'refund_platform_money' => 'float',
		'refund_money' => 'float',
		'period_start_time' => 'int',
		'period_end_time' => 'int',
		'commission' => 'float',
		'create_time' => 'int',
		'website_commission' => 'float',
		'platform_coupon_money' => 'float',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'period_id' => 'int unsigned',
		'period_no' => 'varchar',
		'shop_num' => 'int',
		'order_money' => 'decimal',
		'shop_money' => 'decimal',
		'refund_shop_money' => 'decimal',
		'platform_money' => 'decimal',
		'refund_platform_money' => 'decimal',
		'refund_money' => 'decimal',
		'period_start_time' => 'timestamp',
		'period_end_time' => 'timestamp',
		'commission' => 'decimal',
		'create_time' => 'timestamp',
		'website_commission' => 'decimal',
		'platform_coupon_money' => 'decimal',
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
		'period_id',
		'period_no',
		'shop_num',
		'order_money',
		'shop_money',
		'refund_shop_money',
		'platform_money',
		'refund_platform_money',
		'refund_money',
		'period_start_time',
		'period_end_time',
		'commission',
		'create_time',
		'website_commission',
		'platform_coupon_money',
	];
}
