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
 * @property id $int
 * @property order_id $int 订单号
 * @property refund_no $string 退款订单号
 * @property refund_money $float 退款金额
 * @property refund_shop_money $float 退款商户金额
 * @property refund_platform_money $float 退款平台金额
 * @property refund_real_money $float 实际退款金额
 * @property refund_type $int 退款方式 1 原路退款 2线下退款
 * @property refund_status $int 退款状态 1退款中 2已退款  3已驳回
 * @property action $string 操作内容
 * @property action_way $int 操作类型1买家2卖家
 * @property action_userid $int 操作人id
 * @property action_time $int 操作时间
 * @property create_time $int 退款申请时间
 */
abstract class RefundAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'order_refund';

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
		'refund_no' => 'string',
		'refund_money' => 'float',
		'refund_shop_money' => 'float',
		'refund_platform_money' => 'float',
		'refund_real_money' => 'float',
		'refund_type' => 'int',
		'refund_status' => 'int',
		'action' => 'string',
		'action_way' => 'int',
		'action_userid' => 'int',
		'action_time' => 'int',
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
		'order_id',
		'refund_no',
		'refund_money',
		'refund_shop_money',
		'refund_platform_money',
		'refund_real_money',
		'refund_type',
		'refund_status',
		'action',
		'action_way',
		'action_userid',
		'action_time',
		'create_time',
	];
}
