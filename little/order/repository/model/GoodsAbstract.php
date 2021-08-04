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
 * @property order_goods_id $int
 * @property site_id $int 商家id
 * @property goods_id $int 商品id
 * @property sku_id $int 商品skuid
 * @property sku_details $string 商品sku 详情
 * @property price $float 商品卖价
 * @property cost_price $float 成本价
 * @property num $int 购买数量
 * @property goods_money $float 商品总价
 * @property cost_money $float 成本总价
 * @property gift_flag $int 赠品标识
 * @property real_goods_money $float 实际商品购买价
 */
abstract class GoodsAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'order_goods';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'order_goods_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'order_goods_id' => 'int',
		'site_id' => 'int',
		'goods_id' => 'int',
		'sku_id' => 'int',
		'sku_details' => 'string',
		'price' => 'float',
		'cost_price' => 'float',
		'num' => 'int',
		'goods_money' => 'float',
		'cost_money' => 'float',
		'gift_flag' => 'int',
		'real_goods_money' => 'float',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['sku_details'];

	/**
	 * @var array $json JSON字段自动转数组
	 */
	protected $jsonAssoc = true;

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
		'order_goods_id',
		'site_id',
		'goods_id',
		'sku_id',
		'sku_details',
		'price',
		'cost_price',
		'num',
		'goods_money',
		'cost_money',
		'gift_flag',
		'real_goods_money',
	];
}
