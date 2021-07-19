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

namespace little\message\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int 主键
 * @property title $string 主题
 * @property content $string 内容
 * @property is_top $int 是否置顶
 * @property create_time $int 创建时间
 * @property update_time $int 修改时间
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
	protected $name = 'message_notice';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'title' => 'string',
		'content' => 'string',
		'is_top' => 'int',
		'create_time' => 'int',
		'update_time' => 'int',
		'receiving_type' => 'string',
		'receiving_name' => 'string',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = ['id', 'title', 'content', 'is_top', 'create_time', 'update_time', 'receiving_type', 'receiving_name'];
}
