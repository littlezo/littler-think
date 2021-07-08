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
 * @property item_id $int
 * @property template_id $int 模板id
 * @property area_ids $string 地址id序列
 * @property area_names $string 地址名称序列
 * @property snum $int 起步计算标准
 * @property sprice $float 起步计算价格
 * @property xnum $int 续步计算标准
 * @property xprice $float 续步计算价格
 * @property fee_type $int 运费计算方式
 */
abstract class ExpressTemplateItemAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'express_template_item';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'item_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'item_id' => 'int',
		'template_id' => 'int',
		'area_ids' => 'string',
		'area_names' => 'string',
		'snum' => 'int',
		'sprice' => 'float',
		'xnum' => 'int',
		'xprice' => 'float',
		'fee_type' => 'int',
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
	public $field = ['item_id', 'template_id', 'area_ids', 'area_names', 'snum', 'sprice', 'xnum', 'xprice', 'fee_type'];
}
