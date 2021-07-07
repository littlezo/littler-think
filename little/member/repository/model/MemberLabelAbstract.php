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

namespace little\member\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property label_id $int 标签id
 * @property label_name $string 标签名称
 * @property create_time $int 创建时间
 * @property modify_time $int 修改时间
 * @property remark $string 备注
 * @property sort $int 排序
 */
abstract class MemberLabelAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_label';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'label_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'label_id' => 'int',
		'label_name' => 'string',
		'create_time' => 'int',
		'modify_time' => 'int',
		'remark' => 'string',
		'sort' => 'int',
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
	public $field = ['label_id', 'label_name', 'create_time', 'modify_time', 'remark', 'sort'];
}
