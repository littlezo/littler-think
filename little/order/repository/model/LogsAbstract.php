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
 * @property order_id $int 订单id
 * @property action $string 操作
 * @property uid $int 操作人id
 * @property nick_name $string 操作元
 * @property order_status $int 订单状态
 * @property action_way $int
 * @property order_status_name $string 订单状态名称
 * @property action_time $int 操作时间
 * @property module $string 操作端口  shop 店铺  admin 平台  member 会员
 */
abstract class LogsAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'order_logs';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'order_id' => 'int',
		'action' => 'string',
		'uid' => 'int',
		'nick_name' => 'string',
		'order_status' => 'int',
		'action_way' => 'int',
		'order_status_name' => 'string',
		'action_time' => 'int',
		'module' => 'string',
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
		'action',
		'uid',
		'nick_name',
		'order_status',
		'action_way',
		'order_status_name',
		'action_time',
		'module',
	];
}
