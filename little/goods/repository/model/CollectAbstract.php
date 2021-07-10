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
 * @property collect_id $int 主键
 * @property member_id $int 会员id
 * @property goods_id $int 商品id
 * @property sku_id $int skuid
 * @property category_id $int 商品分类id
 * @property sku_name $string 商品名称
 * @property sku_price $float 商品价格
 * @property sku_image $string 商品图片
 * @property create_time $int 收藏时间
 * @property site_id $int 站点id
 */
abstract class CollectAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'goods_collect';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'collect_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'collect_id' => 'int',
		'member_id' => 'int',
		'goods_id' => 'int',
		'sku_id' => 'int',
		'category_id' => 'int',
		'sku_name' => 'string',
		'sku_price' => 'float',
		'sku_image' => 'string',
		'create_time' => 'int',
		'site_id' => 'int',
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
		'collect_id',
		'member_id',
		'goods_id',
		'sku_id',
		'category_id',
		'sku_name',
		'sku_price',
		'sku_image',
		'create_time',
		'site_id',
	];
}
