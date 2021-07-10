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

namespace little\shop\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property period_id $int 账期时间
 * @property money $float 结算金额
 * @property shop_num $int 结算店铺数量
 * @property remark $string 备注
 * @property end_time $int 账期截止时间
 * @property period_type $int 结算周期类型
 */
abstract class WithdrawPeriodAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'shop_withdraw_period';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'period_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'period_id' => 'int',
		'money' => 'float',
		'shop_num' => 'int',
		'remark' => 'string',
		'end_time' => 'int',
		'period_type' => 'int',
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
	public $field = ['period_id', 'money', 'shop_num', 'remark', 'end_time', 'period_type'];
}
