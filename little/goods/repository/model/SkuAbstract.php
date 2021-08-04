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

/**
 * @property sku_id $int 商品sku_id
 * @property sku_name $string 商品sku名称
 * @property price $float 售价
 * @property market_price $float 市场价
 * @property cost_price $float 成本价
 * @property stock $int 规格库存
 * @property click_num $int 点击量
 * @property sale_num $int 销量
 * @property collect_num $int 收藏量
 * @property sku_image $int 规格图片
 * @property goods_id $int 商品id
 * @property stock_alarm $int 库存预警
 * @property unit $string 单位
 */
abstract class SkuAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

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
		'sku_name' => 'string',
		'price' => 'float',
		'market_price' => 'float',
		'cost_price' => 'float',
		'stock' => 'int',
		'click_num' => 'int',
		'sale_num' => 'int',
		'collect_num' => 'int',
		'sku_image' => 'int',
		'goods_id' => 'int',
		'stock_alarm' => 'int',
		'unit' => 'string',
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
		'sku_id',
		'sku_name',
		'price',
		'market_price',
		'cost_price',
		'stock',
		'click_num',
		'sale_num',
		'collect_num',
		'sku_image',
		'goods_id',
		'stock_alarm',
		'unit',
	];
}
