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

namespace little\cron\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property id $int 主键
 * @property type $int 1.固定任务 2.循环任务
 * @property period $int 循环周期（分钟）
 * @property period_type $int 循环周期类型 0默认分钟 1.日 2.周 3. 月
 * @property name $string 任务名称
 * @property event $string 执行事件
 * @property execute_time $int 待执行时间
 * @property relate_id $int 关联关键字id
 * @property create_time $int 创建时间
 */
abstract class CronAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'cron';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'type' => 'int',
		'period' => 'int',
		'period_type' => 'int',
		'name' => 'string',
		'event' => 'string',
		'execute_time' => 'int',
		'relate_id' => 'int',
		'create_time' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'id' => 'int unsigned',
		'type' => 'int',
		'period' => 'int',
		'period_type' => 'int',
		'name' => 'varchar',
		'event' => 'varchar',
		'execute_time' => 'timestamp',
		'relate_id' => 'int',
		'create_time' => 'timestamp',
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
	protected $field = ['id', 'type', 'period', 'period_type', 'name', 'event', 'execute_time', 'relate_id', 'create_time'];
}
