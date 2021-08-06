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

namespace little\goods\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;
use think\model\concern\SoftDelete;

/**
 * @property sku_id $int 商品sku_id
 * @property spec_value $string sku
 * @property price $float 售价
 * @property market_price $float 市场价
 * @property cost_price $float 成本价
 * @property stock $int 规格库存
 * @property sku_image $int 规格图片
 * @property goods_id $int 商品id
 * @property stock_alarm $int 库存预警
 * @property unit $string 单位
 * @property create_time $int 创建时间
 * @property update_time $int 更新时间
 * @property delete_time $int 删除时间
 */
abstract class SkuAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;
	use SoftDelete;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'goods_sku';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'sku_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'sku_id' => 'int',
		'spec_value' => 'string',
		'price' => 'float',
		'market_price' => 'float',
		'cost_price' => 'float',
		'stock' => 'int',
		'sku_image' => 'int',
		'goods_id' => 'int',
		'stock_alarm' => 'int',
		'unit' => 'string',
		'create_time' => 'int',
		'update_time' => 'int',
		'delete_time' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['spec_value'];

	/**
	 * @var array $json JSON字段自动转数组
	 */
	protected $jsonAssoc = true;

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'sku_id',
		'spec_value',
		'price',
		'market_price',
		'cost_price',
		'stock',
		'sku_image',
		'goods_id',
		'stock_alarm',
		'unit',
		'create_time',
		'update_time',
		'delete_time',
	];
}
