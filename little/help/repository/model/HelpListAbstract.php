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
 * @property id $int 主键id
 * @property title $string 帮助主题
 * @property link_address $string 链接地址
 * @property content $string 帮助内容
 * @property class_id $int 帮助类型id
 * @property class_name $string 帮助类型名称
 * @property sort $int 排序号
 * @property create_time $int 创建时间
 * @property modify_time $int 修改时间
 */
abstract class HelpListAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'help_list';

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
		'link_address' => 'string',
		'content' => 'string',
		'class_id' => 'int',
		'class_name' => 'string',
		'sort' => 'int',
		'create_time' => 'int',
		'modify_time' => 'int',
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
	public $field = [
		'id',
		'title',
		'link_address',
		'content',
		'class_id',
		'class_name',
		'sort',
		'create_time',
		'modify_time',
	];
}
