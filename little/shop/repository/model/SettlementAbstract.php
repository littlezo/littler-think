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
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int
 * @property settlement_no $string 流水号
 * @property site_id $int 站点id
 * @property period_id $int 结算周期id
 * @property site_name $string 站点名称
 * @property order_money $float 订单总金额
 * @property shop_money $float 店铺金额
 * @property refund_platform_money $float 平台退款抽成
 * @property platform_money $float 平台抽成
 * @property refund_shop_money $float 店铺退款金额
 * @property refund_money $float 退款金额
 * @property create_time $int 创建时间
 * @property period_start_time $int 账期开始时间
 * @property period_end_time $int 账期结束时间
 * @property commission $float 佣金支出
 * @property website_id $int 分站id
 * @property website_commission $float 分站分成
 * @property settlement_id $int 结算id
 * @property platform_coupon_money $float 平台优惠券平台承担金额
 */
abstract class SettlementAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'shop_settlement';

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
		'period_id' => 'int',
		'site_name' => 'string',
		'order_money' => 'float',
		'shop_money' => 'float',
		'refund_platform_money' => 'float',
		'platform_money' => 'float',
		'refund_shop_money' => 'float',
		'refund_money' => 'float',
		'create_time' => 'int',
		'period_start_time' => 'int',
		'period_end_time' => 'int',
		'commission' => 'float',
		'website_id' => 'int',
		'website_commission' => 'float',
		'settlement_id' => 'int',
		'platform_coupon_money' => 'float',
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
		'period_id',
		'site_name',
		'order_money',
		'shop_money',
		'refund_platform_money',
		'platform_money',
		'refund_shop_money',
		'refund_money',
		'create_time',
		'period_start_time',
		'period_end_time',
		'commission',
		'website_id',
		'website_commission',
		'settlement_id',
		'platform_coupon_money',
	];
}
