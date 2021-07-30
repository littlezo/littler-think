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

namespace little\promotion\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property seckill_id $int 主键
 * @property name $string 秒杀主题
 * @property seckill_time $int 秒杀时间4位（时+分（两位））
 * @property seckill_end_time $int 结束时间点
 * @property config_json $string 配置信息
 * @property create_time $int 创建时间
 * @property update_time $string 修改时间
 * @property seckill_start_time $int 开始时间点
 */
abstract class SeckillAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'promotion_seckill';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'seckill_id';

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
		'update_time' => 'string',
		'seckill_start_time' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'seckill_id',
		'name',
		'seckill_time',
		'seckill_end_time',
		'config_json',
		'create_time',
		'update_time',
		'seckill_start_time',
	];
}
