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
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property id $int
 * @property member_id $int 浏览人
 * @property browse_time $int 浏览时间
 * @property goods_id $int 商品id
 * @property sku_id $int sku_id
 * @property category_id $int 分类
 * @property category_id_1 $int 商品一级分类id
 * @property category_id_2 $int 商品二级分类id
 * @property category_id_3 $int 商品三级分类id
 * @property site_id $int 站点id
 */
abstract class GoodsBrowseAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'goods_browse';

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
		'browse_time' => 'int',
		'goods_id' => 'int',
		'sku_id' => 'int',
		'category_id' => 'int',
		'category_id_1' => 'int',
		'category_id_2' => 'int',
		'category_id_3' => 'int',
		'site_id' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'id' => 'int',
		'member_id' => 'int',
		'browse_time' => 'timestamp',
		'goods_id' => 'int',
		'sku_id' => 'int',
		'category_id' => 'int',
		'category_id_1' => 'int',
		'category_id_2' => 'int',
		'category_id_3' => 'int',
		'site_id' => 'int',
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
	protected $field = [
		'id',
		'member_id',
		'browse_time',
		'goods_id',
		'sku_id',
		'category_id',
		'category_id_1',
		'category_id_2',
		'category_id_3',
		'site_id',
	];
}
