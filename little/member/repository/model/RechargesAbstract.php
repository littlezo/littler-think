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
use think\model\concern\SoftDelete;

/**
 * @property id $int
 * @property name $string 套餐名称
 * @property cover_img $string 封面
 * @property face_value $float 面值
 * @property buy_money $float 购买金额
 * @property growth $int 贡献值
 * @property desc $string 描述
 * @property is_new $int 是否新用户
 * @property sort $int 排序
 * @property status $int 状态（1正常 0关闭）
 * @property create_time $int 创建时间
 * @property update_time $int 修改时间
 * @property delete_time $int 删除时间
 */
abstract class RechargesAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;
	use SoftDelete;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_recharges';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'name' => 'string',
		'cover_img' => 'string',
		'face_value' => 'float',
		'buy_money' => 'float',
		'growth' => 'int',
		'desc' => 'string',
		'is_new' => 'int',
		'sort' => 'int',
		'status' => 'int',
		'create_time' => 'int',
		'update_time' => 'int',
		'delete_time' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'id',
		'name',
		'cover_img',
		'face_value',
		'buy_money',
		'growth',
		'desc',
		'is_new',
		'sort',
		'status',
		'create_time',
		'update_time',
		'delete_time',
	];
}
