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
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property level_id $int 会员等级
 * @property level_name $string 等级名称
 * @property sort $int 等级排序列
 * @property growth $float 所需成长值
 * @property remark $string 备注
 * @property is_default $int 是否默认，0：否，1：是
 */
abstract class MemberLevelAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_level';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'level_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'level_id' => 'int',
		'level_name' => 'string',
		'sort' => 'int',
		'growth' => 'float',
		'remark' => 'string',
		'is_default' => 'int',
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
	 * @var array $updateTime 关闭更新时间自动写入
	 */
	protected $updateTime = false;

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = ['level_id', 'level_name', 'sort', 'growth', 'remark', 'is_default'];
}
