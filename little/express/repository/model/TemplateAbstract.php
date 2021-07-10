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

namespace little\express\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property template_id $int
 * @property site_id $int 商家店铺id
 * @property template_name $string 模板名称
 * @property fee_type $int 运费计算方式1.重量2体积3按件
 * @property create_time $int 创建时间
 * @property update_time $int 修改时间
 * @property is_default $int 是否默认
 * @property surplus_area_ids $string 剩余地址id
 */
abstract class TemplateAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'express_template';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'template_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'template_id' => 'int',
		'site_id' => 'int',
		'template_name' => 'string',
		'fee_type' => 'int',
		'create_time' => 'int',
		'update_time' => 'int',
		'is_default' => 'int',
		'surplus_area_ids' => 'string',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'template_id',
		'site_id',
		'template_name',
		'fee_type',
		'create_time',
		'update_time',
		'is_default',
		'surplus_area_ids',
	];
}
