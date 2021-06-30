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
 * @property attr_value_id $int
 * @property attr_value_name $string 属性值名称
 * @property attr_id $int 属性id
 * @property attr_class_id $int 类型id
 * @property sort $int 排序
 */
abstract class GoodsAttributeValueAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'goods_attribute_value';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'attr_value_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'attr_value_id' => 'int',
		'attr_value_name' => 'string',
		'attr_id' => 'int',
		'attr_class_id' => 'int',
		'sort' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'attr_value_id' => 'int',
		'attr_value_name' => 'varchar',
		'attr_id' => 'int',
		'attr_class_id' => 'int',
		'sort' => 'int',
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
	protected $field = ['attr_value_id', 'attr_value_name', 'attr_id', 'attr_class_id', 'sort'];
}
