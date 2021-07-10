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
 * @property order_goods_id $int 订单项id
 * @property refund_status $int 退款状态
 * @property refund_status_name $string 退款状态名称
 * @property action $string 操作内容
 * @property action_way $int 操作类型1买家2卖家
 * @property action_userid $int 操作人id
 * @property username $string 操作人名称
 * @property action_time $int 操作时间
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
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'order_goods_id' => 'int',
		'refund_status' => 'int',
		'refund_status_name' => 'string',
		'action' => 'string',
		'action_way' => 'int',
		'action_userid' => 'int',
		'username' => 'string',
		'action_time' => 'int',
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
		'order_goods_id',
		'refund_status',
		'refund_status_name',
		'action',
		'action_way',
		'action_userid',
		'username',
		'action_time',
	];
}
