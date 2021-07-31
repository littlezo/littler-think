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

namespace little\system\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int 主键
 * @property site_id $int 站点id（店铺，分站）,总平台端为0
 * @property value $string 配置值json
 * @property config_key $string 配置项关键字
 * @property config_label $string 配置字段描述
 * @property config_desc $string 描述
 * @property is_use $int 是否启用 1启用 0不启用
 * @property location $int 0 前端 1后台
 * @property create_time $int 创建时间
 * @property update_time $int 修改时间
 */
abstract class ConfigAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'system_config';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'site_id' => 'int',
		'value' => 'string',
		'config_key' => 'string',
		'config_label' => 'string',
		'config_desc' => 'string',
		'is_use' => 'int',
		'location' => 'int',
		'create_time' => 'int',
		'update_time' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['value', 'config_label'];

	/**
	 * @var array $json JSON字段自动转数组
	 */
	protected $jsonAssoc = true;

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'id',
		'site_id',
		'value',
		'config_key',
		'config_label',
		'config_desc',
		'is_use',
		'location',
		'create_time',
		'update_time',
	];
}
