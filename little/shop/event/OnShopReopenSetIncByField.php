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

namespace little\shop\event;

use little\shop\model\ShopReopen;
use littler\annotation\Inject;

class OnShopReopenSetIncByField
{
	/**
	 * @Inject()
	 * @var little\shop\model\ShopReopen
	 */
	protected $model;


	/**
	 * 店铺续签表 字段自增
	 * @param $s $model 事件参数
	 * @param float $args->sum 数量
	 * @param array $args->condition 查询条件
	 * @param string $args->field 自增字段
	 * @return mixed
	 */
	public function handle(array $args, ShopReopen $model)
	{
		// Todo: 店铺续签表 字段自增
		return $model->where($args['condition'])->setInc($args['field'],$args['sum']);
	}
}
