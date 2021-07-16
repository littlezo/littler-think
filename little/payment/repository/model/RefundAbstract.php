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

namespace little\payment\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int 主键
 * @property refund_no $string 退款编号
 * @property out_trade_no $string 对应支付流水号
 * @property site_id $int 站点id
 * @property refund_detail $string 退款详情
 * @property refund_type $string 退款类型
 * @property refund_fee $float 退款金额
 * @property total_money $float 实际支付金额
 * @property create_time $int 创建时间
 */
abstract class RefundAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'payment_refund';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'refund_no' => 'string',
		'out_trade_no' => 'string',
		'site_id' => 'int',
		'refund_detail' => 'string',
		'refund_type' => 'string',
		'refund_fee' => 'float',
		'total_money' => 'float',
		'create_time' => 'int',
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
		'refund_no',
		'out_trade_no',
		'site_id',
		'refund_detail',
		'refund_type',
		'refund_fee',
		'total_money',
		'create_time',
	];
}
