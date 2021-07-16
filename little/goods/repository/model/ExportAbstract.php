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
 * @property export_id $int
 * @property condition $string 条件  json
 * @property status $int 导出状态  0 正在导出 1 已导出  2 已删除
 * @property create_time $int 导出时间
 * @property path $string 导出文件的物理路径
 * @property site_id $int 站点id
 */
abstract class ExportAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'goods_export';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'export_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'export_id' => 'int',
		'condition' => 'string',
		'status' => 'int',
		'create_time' => 'int',
		'path' => 'string',
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
	public $field = ['export_id', 'condition', 'status', 'create_time', 'path', 'site_id'];
}
