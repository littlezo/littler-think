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
 * @property id $int 结算ID
 * @property order_id $int 订单ID
 * @property shop_money $float 店铺金额
 * @property platform_rate $float 平台费率
 * @property platform_money $float 平台服务费
 * @property rebate_money $float 总佣金
 * @property settlement_detail $string 结算详情
 * @property settlement_time $int 结算时间
 */
abstract class SettlementAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'order_settlement';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'order_id' => 'int',
		'shop_money' => 'float',
		'platform_rate' => 'float',
		'platform_money' => 'float',
		'rebate_money' => 'float',
		'settlement_detail' => 'string',
		'settlement_time' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['settlement_detail'];

	/**
	 * @var array $json JSON字段自动转数组
	 */
	protected $jsonAssoc = true;

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
		'id',
		'order_id',
		'shop_money',
		'platform_rate',
		'platform_money',
		'rebate_money',
		'settlement_detail',
		'settlement_time',
	];
}
