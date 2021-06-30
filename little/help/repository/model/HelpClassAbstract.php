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

namespace little\help\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property class_id $int 主键
 * @property app_module $string 应用模块
 * @property class_name $string 帮助类型名称
 * @property sort $int 排序号
 * @property create_time $int 创建时间
 * @property modify_time $int 修改时间
 */
abstract class HelpClassAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'help_class';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'class_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'class_id' => 'int',
		'app_module' => 'string',
		'class_name' => 'string',
		'sort' => 'int',
		'create_time' => 'int',
		'modify_time' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'class_id' => 'int unsigned',
		'app_module' => 'varchar',
		'class_name' => 'varchar',
		'sort' => 'int',
		'create_time' => 'timestamp',
		'modify_time' => 'timestamp',
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
	protected $field = ['class_id', 'app_module', 'class_name', 'sort', 'create_time', 'modify_time'];
}
