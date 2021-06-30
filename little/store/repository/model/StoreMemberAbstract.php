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
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property id $int 主键
 * @property member_id $int 会员id
 * @property store_id $int 门店站点id
 * @property order_money $float 付款后-消费金额
 * @property order_complete_money $float 订单完成-消费金额
 * @property order_num $int 付款后-消费次数
 * @property order_complete_num $int 订单完成-消费次数
 * @property create_time $int 创建时间
 */
abstract class StoreMemberAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'store_member';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'member_id' => 'int',
		'store_id' => 'int',
		'order_money' => 'float',
		'order_complete_money' => 'float',
		'order_num' => 'int',
		'order_complete_num' => 'int',
		'create_time' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'id' => 'int unsigned',
		'member_id' => 'int',
		'store_id' => 'int',
		'order_money' => 'decimal',
		'order_complete_money' => 'decimal',
		'order_num' => 'int',
		'order_complete_num' => 'int',
		'create_time' => 'timestamp',
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
		'id',
		'member_id',
		'store_id',
		'order_money',
		'order_complete_money',
		'order_num',
		'order_complete_num',
		'create_time',
	];
}
