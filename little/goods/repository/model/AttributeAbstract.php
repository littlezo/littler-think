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
 * @property attr_id $int
 * @property attr_name $string 属性名称
 * @property attr_class_id $int 商品类型id
 * @property attr_class_name $string 商品类型名称
 * @property sort $int 属性排序号
 * @property is_query $int 是否参与筛选
 * @property is_spec $int 是否是规格属性
 * @property attr_value_list $string 属性值列表json
 * @property attr_value_format $string 属性值格式json
 * @property attr_type $int 属性类型  （1.单选 2.多选3. 输入 注意输入不参与筛选）
 * @property site_id $int 站点id
 */
abstract class AttributeAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'goods_attribute';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'attr_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'attr_id' => 'int',
		'attr_name' => 'string',
		'attr_class_id' => 'int',
		'attr_class_name' => 'string',
		'sort' => 'int',
		'is_query' => 'int',
		'is_spec' => 'int',
		'attr_value_list' => 'string',
		'attr_value_format' => 'string',
		'attr_type' => 'int',
		'site_id' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['attr_value_list', 'attr_value_format'];

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
		'attr_id',
		'attr_name',
		'attr_class_id',
		'attr_class_name',
		'sort',
		'is_query',
		'is_spec',
		'attr_value_list',
		'attr_value_format',
		'attr_type',
		'site_id',
	];
}
