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

namespace little\config\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property id $int 主键
 * @property site_id $int 站点id（店铺，分站）,总平台端为0
 * @property app_module $string 应用端口关键字
 * @property config_key $string 配置项关键字
 * @property value $string 配置值json
 * @property config_desc $string 描述
 * @property is_use $int 是否启用 1启用 0不启用
 * @property create_time $int 创建时间
 * @property modify_time $int 修改时间
 */
abstract class ConfigAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'config';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'site_id' => 'int',
		'app_module' => 'string',
		'config_key' => 'string',
		'value' => 'string',
		'config_desc' => 'string',
		'is_use' => 'int',
		'create_time' => 'int',
		'modify_time' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'id' => 'int unsigned',
		'site_id' => 'int',
		'app_module' => 'varchar',
		'config_key' => 'varchar',
		'value' => 'varchar',
		'config_desc' => 'varchar',
		'is_use' => 'tinyint',
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
	protected $field = [
		'id',
		'site_id',
		'app_module',
		'config_key',
		'value',
		'config_desc',
		'is_use',
		'create_time',
		'modify_time',
	];
}
