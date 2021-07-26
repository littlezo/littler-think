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
 * @property id $int 主键
 * @property group_id $int 文件组
 * @property name $string 文件名称
 * @property path $string 文件路径
 * @property hash $string 文件sha1
 * @property md5 $string 文件md5
 * @property size $int 文件大小
 * @property mime_type $string 文件类型
 * @property ext $string 文件后缀
 * @property site_id $int 站点
 * @property update_time $int 更新时间
 */
abstract class FilesAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'storage_files';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'group_id' => 'int',
		'name' => 'string',
		'path' => 'string',
		'hash' => 'string',
		'md5' => 'string',
		'size' => 'int',
		'mime_type' => 'string',
		'ext' => 'string',
		'site_id' => 'int',
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
	public $field = ['id', 'group_id', 'name', 'path', 'hash', 'md5', 'size', 'mime_type', 'ext', 'site_id', 'update_time'];
}
