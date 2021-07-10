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

namespace little\exchange\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int 主键
 * @property type $int 兑换形式
 * @property type_name $string 兑换类型名称
 * @property type_id $int 关联id
 * @property name $string 兑换名称
 * @property image $string 图片
 * @property stock $int 当前库存
 * @property point $int 积分数
 * @property market_price $float 市场价
 * @property price $float 兑换价
 * @property delivery_price $float 物流费用（礼品有效）
 * @property balance $float 余额红包（余额有效）
 * @property state $int 状态（上下架）
 * @property content $string 兑换说明
 * @property create_time $int 创建时间
 * @property update_time $int 修改时间
 * @property pay_type $int
 */
abstract class ExchangeAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'exchange_exchange';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'type' => 'int',
		'type_name' => 'string',
		'type_id' => 'int',
		'name' => 'string',
		'image' => 'string',
		'stock' => 'int',
		'point' => 'int',
		'market_price' => 'float',
		'price' => 'float',
		'delivery_price' => 'float',
		'balance' => 'float',
		'state' => 'int',
		'content' => 'string',
		'create_time' => 'int',
		'update_time' => 'int',
		'pay_type' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'id',
		'type',
		'type_name',
		'type_id',
		'name',
		'image',
		'stock',
		'point',
		'market_price',
		'price',
		'delivery_price',
		'balance',
		'state',
		'content',
		'create_time',
		'update_time',
		'pay_type',
	];
}
