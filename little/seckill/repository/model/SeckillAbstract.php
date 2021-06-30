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

namespace little\seckill\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property seckill_id $int 主键
 * @property name $string 秒杀主题
 * @property seckill_time $int 秒杀时间4位（时+分（两位））
 * @property seckill_end_time $int 结束时间点
 * @property config_json $string 配置信息
 * @property create_time $int 创建时间
 * @property modify_time $string 修改时间
 * @property seckill_start_time $int 开始时间点
 */
abstract class SeckillAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'seckill';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'seckill_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'seckill_id' => 'int',
		'name' => 'string',
		'seckill_time' => 'int',
		'seckill_end_time' => 'int',
		'config_json' => 'string',
		'create_time' => 'int',
		'modify_time' => 'string',
		'seckill_start_time' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'seckill_id' => 'int',
		'name' => 'varchar',
		'seckill_time' => 'timestamp',
		'seckill_end_time' => 'timestamp',
		'config_json' => 'varchar',
		'create_time' => 'timestamp',
		'modify_time' => 'timestamp',
		'seckill_start_time' => 'timestamp',
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
	protected $field = [
		'seckill_id',
		'name',
		'seckill_time',
		'seckill_end_time',
		'config_json',
		'create_time',
		'modify_time',
		'seckill_start_time',
	];
}
