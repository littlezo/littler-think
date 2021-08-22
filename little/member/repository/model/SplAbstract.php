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
 * @property id $int id
 * @property name $string 等级名称
 * @property user_level $int 用户等级
 * @property market_sum $string 市场总数
 * @property market $string 市场条件键
 * @property ratio $float 分润比例
 * @property subsidy_one $float 管理津贴一级
 * @property subsidy_tow $float 管理津贴二级
 * @property subsidy_three $float 管理津贴三级
 * @property status $int 状态
 */
abstract class SplAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_spl';

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
		'user_level' => 'int',
		'market_sum' => 'string',
		'market' => 'string',
		'ratio' => 'float',
		'subsidy_one' => 'float',
		'subsidy_tow' => 'float',
		'subsidy_three' => 'float',
		'status' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['market_sum', 'market'];

	/**
	 * @var array $json JSON字段自动转数组
	 */
	protected $jsonAssoc = true;

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
	public $field = [
		'id',
		'name',
		'user_level',
		'market_sum',
		'market',
		'ratio',
		'subsidy_one',
		'subsidy_tow',
		'subsidy_three',
		'status',
	];
}
