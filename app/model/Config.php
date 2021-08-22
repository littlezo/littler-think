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

namespace app\model;

use littler\BaseModel as Model;
use littler\traits\BaseOptionsTrait;

/**
 * 配置 模型.
 */
class Config extends Model
{
	use BaseOptionsTrait;

	/**
	 * @var string 主键
	 */
	public $pk = 'order_id';

	/**
	 * @var string 表名
	 */
	protected $name = 'system_config';

	protected $connection = 'source';

	public function getConfig()
	{
		return self::where('id', 1)->field('id,income_deduction_scale,income_cash_scale,income_balance_scale')->find();
	}
}
