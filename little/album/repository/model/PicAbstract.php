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

namespace little\album\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property pic_id $int 主键
 * @property pic_name $string 名称
 * @property pic_path $string 路径
 * @property pic_spec $string 规格
 * @property site_id $int 站点id
 * @property update_time $int 更新时间
 * @property album_id $int 相册id
 */
abstract class PicAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'album_pic';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'pic_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'pic_id' => 'int',
		'pic_name' => 'string',
		'pic_path' => 'string',
		'pic_spec' => 'string',
		'site_id' => 'int',
		'update_time' => 'int',
		'album_id' => 'int',
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
	public $field = ['pic_id', 'pic_name', 'pic_path', 'pic_spec', 'site_id', 'update_time', 'album_id'];
}
