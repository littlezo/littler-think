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

namespace little\adv\event;

use little\adv\model\AdvAdv;
use littler\annotation\Inject;

class OnAdvAdvDeleteById
{
	/**
	 * @Inject()
	 * @var little\adv\model\AdvAdv
	 */
	protected $model;


	/**
	 * 广告 ID 删除数据.
	 * @param int $args ID
	 * @return mixed
	 */
	public function handle(int $args, AdvAdv $model)
	{
		// Todo: 广告 ID 删除数据
		return $model->deleteBy($args);
	}
}
