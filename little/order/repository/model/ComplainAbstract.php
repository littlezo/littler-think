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
 * @property id $int 维权ID
 * @property order_id $int 订单ID
 * @property complain_no $string 退款编号（申请产生）
 * @property complain_status $int 退款状态
 * @property complain_apply_money $float 退款申请金额
 * @property complain_reason $string 退款原因
 * @property complain_real_money $float 实际退款金额
 * @property complain_time $int 实际退款时间
 * @property complain_refuse_reason $string 退款拒绝原因
 * @property complain_remark $string 退款说明
 * @property complain_money_type $int 退款方式   1 原路退款 2线下退款
 * @property complain_apply_time $int 申请平台维权时间
 * @property complain_status_action $string 维权操作
 * @property real_goods_money $float 订单实际金额
 */
abstract class ComplainAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'order_complain';

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
		'complain_no' => 'string',
		'complain_status' => 'int',
		'complain_apply_money' => 'float',
		'complain_reason' => 'string',
		'complain_real_money' => 'float',
		'complain_time' => 'int',
		'complain_refuse_reason' => 'string',
		'complain_remark' => 'string',
		'complain_money_type' => 'int',
		'complain_apply_time' => 'int',
		'complain_status_action' => 'string',
		'real_goods_money' => 'float',
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
		'id',
		'order_id',
		'complain_no',
		'complain_status',
		'complain_apply_money',
		'complain_reason',
		'complain_real_money',
		'complain_time',
		'complain_refuse_reason',
		'complain_remark',
		'complain_money_type',
		'complain_apply_time',
		'complain_status_action',
		'real_goods_money',
	];
}
