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
 * @property category_id $int
 * @property category_name $string 分类名称
 * @property short_name $string 简称
 * @property pid $int 分类上级
 * @property level $int 层级
 * @property is_show $int 是否显示
 * @property sort $int 排序
 * @property image $string 分类图片
 * @property keywords $string 分类页面关键字
 * @property description $string 分类介绍
 * @property category_id_1 $int 一级分类id
 * @property category_id_2 $int 二级分类id
 * @property category_full_name $string 组装名称
 * @property site_id $int 所属店铺id
 */
abstract class ShopCategoryAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'goods_shop_category';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'category_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'category_id' => 'int',
		'category_name' => 'string',
		'short_name' => 'string',
		'pid' => 'int',
		'level' => 'int',
		'is_show' => 'int',
		'sort' => 'int',
		'image' => 'string',
		'keywords' => 'string',
		'description' => 'string',
		'category_id_1' => 'int',
		'category_id_2' => 'int',
		'category_full_name' => 'string',
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
	public $field = [
		'category_id',
		'category_name',
		'short_name',
		'pid',
		'level',
		'is_show',
		'sort',
		'image',
		'keywords',
		'description',
		'category_id_1',
		'category_id_2',
		'category_full_name',
		'site_id',
	];
}
