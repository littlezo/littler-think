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

namespace little\storage\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property group_id $int 组ID
 * @property site_id $int 站点
 * @property group_name $string 组名称
 * @property desc $string 介绍
 * @property is_default $int 是否默认
 * @property update_time $int 更新时间
 */
abstract class GroupAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'storage_group';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'group_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'group_id' => 'int',
		'site_id' => 'int',
		'group_name' => 'string',
		'desc' => 'string',
		'is_default' => 'int',
		'update_time' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $createTime 关闭创建时间自动写入
	 */
	protected $createTime = false;

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = ['group_id', 'site_id', 'group_name', 'desc', 'is_default', 'update_time'];
}
