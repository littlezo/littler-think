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

namespace little\platformcoupon\event;

use little\platformcoupon\model\PlatformcouponType;
use littler\annotation\Inject;

class OnPlatformcouponTypeSetDecByField
{
	/**
	 * @Inject()
	 * @var little\platformcoupon\model\PlatformcouponType
	 */
	protected $model;


	/**
	 * 优惠券类型表 字段自减
	 * @param array $args 事件参数
	 * @param float $args->sum 数量
	 * @param array $args->condition 查询条件
	 * @param string $args->field 自减字段
	 * @return mixed
	 */
	public function handle(array $args, PlatformcouponType $model)
	{
		// Todo: 优惠券类型表 字段自减
		return $model->where($args['condition'])->setDec($args['field'],$args['sum']);
	}
}
