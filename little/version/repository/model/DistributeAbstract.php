<?php

/**
 * #logic 做事不讲究逻辑，再努力也只是重复犯错
 * ## 何为相思：不删不聊不打扰，可否具体点：曾爱过。何为遗憾：你来我往皆过客，可否具体点：再无你。
 * ## 只要思想不滑稽，方法总比苦难多！
 * @version 1.0.0
 * @author @小小只^v^ <littlezov@qq.com>  littlezov@qq.com
 * @contact  littlezov@qq.com
 * @see     https://github.com/littlezo
 * @document https://github.com/littlezo/wiki
 * @license  https://github.com/littlezo/MozillaPublicLicense/blob/main/LICENSE
 */

declare(strict_types=1);

namespace little\version\repository\model;

use littler\BaseModel as Model;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;
use think\model\concern\SoftDelete;

/**
 * @property id $int 版本ID
 * @property title $string 标题
 * @property platform $string 平台
 * @property content $string 更新内容
 * @property version $string 版本
 * @property version_code $int 版本号
 * @property type $int 版本类型
 * @property name $string 文件名
 * @property url $string 下载地址
 * @property is_force $int 是否强制更新
 * @property create_time $int 发布时间
 * @property update_time $int 更新时间
 * @property delete_time $int 删除时间
 */
abstract class DistributeAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;
	use SoftDelete;

	/**
	 * @var string 主键
	 */
	public $pk = 'id';

	/**
	 * @var array 允许写入字段
	 */
	public $field = [
		'id',
		'title',
		'platform',
		'content',
		'version',
		'version_code',
		'type',
		'name',
		'url',
		'is_force',
		'create_time',
		'update_time',
		'delete_time',
	];

	/**
	 * @var string 表名
	 */
	protected $name = 'system_version';

	/**
	 * @var array 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'title' => 'string',
		'platform' => 'string',
		'content' => 'string',
		'version' => 'string',
		'version_code' => 'int',
		'type' => 'int',
		'name' => 'string',
		'url' => 'string',
		'is_force' => 'int',
		'create_time' => 'int',
		'update_time' => 'int',
		'delete_time' => 'int',
	];

	/**
	 * @var array JSON类型字段
	 */
	protected $json = [];
}
