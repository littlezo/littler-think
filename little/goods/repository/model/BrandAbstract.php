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
 * @property brand_id $int 索引ID
 * @property brand_name $string 品牌名称
 * @property brand_initial $string 品牌首字母
 * @property image_url $string 图片
 * @property site_id $int 所属店铺id
 * @property sort $int 排序
 * @property create_time $int 创建时间
 * @property apply_time $int 申请时间
 * @property is_recommend $int 是否推荐
 */
abstract class BrandAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'goods_brand';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'brand_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'brand_id' => 'int',
		'brand_name' => 'string',
		'brand_initial' => 'string',
		'image_url' => 'string',
		'site_id' => 'int',
		'sort' => 'int',
		'create_time' => 'int',
		'apply_time' => 'int',
		'is_recommend' => 'int',
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
		'brand_id',
		'brand_name',
		'brand_initial',
		'image_url',
		'site_id',
		'sort',
		'create_time',
		'apply_time',
		'is_recommend',
	];
}
