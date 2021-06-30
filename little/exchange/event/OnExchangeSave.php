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

namespace little\exchange\event;

use little\exchange\model\Exchange;
use littler\annotation\Inject;

class OnExchangeSave
{
	/**
	 * @Inject()
	 * @var little\exchange\model\Exchange
	 */
	protected $model;


	/**
	 * 积分兑换 写入数据
	 * @param array $args 要写入的数据
	 * @return mixed
	 */
	public function handle(array $args, Exchange $model)
	{
		// Todo: 积分兑换 查询后事件
		return $model->storeBy($args);
	}
}
