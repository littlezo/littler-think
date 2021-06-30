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

namespace little\notice\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property id $int 主键
 * @property title $string 主题
 * @property content $string 内容
 * @property is_top $int 是否置顶
 * @property create_time $int 创建时间
 * @property modify_time $int 修改时间
 * @property receiving_type $string 接受对象
 * @property receiving_name $string 接受对象名称
 */
abstract class NoticeAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'notice';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'title' => 'string',
		'content' => 'string',
		'is_top' => 'int',
		'create_time' => 'int',
		'modify_time' => 'int',
		'receiving_type' => 'string',
		'receiving_name' => 'string',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'id' => 'int unsigned',
		'title' => 'varchar',
		'content' => 'mediumtext',
		'is_top' => 'int',
		'create_time' => 'timestamp',
		'modify_time' => 'timestamp',
		'receiving_type' => 'varchar',
		'receiving_name' => 'varchar',
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
		'title',
		'content',
		'is_top',
		'create_time',
		'modify_time',
		'receiving_type',
		'receiving_name',
	];
}
