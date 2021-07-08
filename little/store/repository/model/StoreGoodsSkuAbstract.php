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
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int id
 * @property sku_id $int sku_id
 * @property goods_id $int 商品id
 * @property store_stock $int 库存
 * @property store_sale_num $int 销量
 * @property store_id $int 门店id
 * @property create_time $int 创建时间
 * @property update_time $int 修改时间
 */
abstract class StoreGoodsSkuAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'store_goods_sku';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'sku_id' => 'int',
		'goods_id' => 'int',
		'store_stock' => 'int',
		'store_sale_num' => 'int',
		'store_id' => 'int',
		'create_time' => 'int',
		'update_time' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = ['id', 'sku_id', 'goods_id', 'store_stock', 'store_sale_num', 'store_id', 'create_time', 'update_time'];
}
