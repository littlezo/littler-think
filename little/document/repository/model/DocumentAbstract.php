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

namespace little\document\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property id $int 主键
 * @property site_id $int 站点id（店铺，分站）,总平台端为0
 * @property app_module $string 应用模块
 * @property document_key $string 关键字
 * @property title $string 文本关键字
 * @property content $string 文本内容
 * @property create_time $int 创建时间
 * @property modify_time $int 修改时间
 */
abstract class DocumentAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'document';

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
		'document_key' => 'string',
		'title' => 'string',
		'content' => 'string',
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
		'document_key' => 'varchar',
		'title' => 'varchar',
		'content' => 'mediumtext',
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
	protected $field = ['id', 'site_id', 'app_module', 'document_key', 'title', 'content', 'create_time', 'modify_time'];
}
