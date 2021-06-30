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

namespace little\help\event;

use little\help\model\Help;
use littler\annotation\Inject;

class OnHelpUpdateByWhere
{
	/**
	 * @Inject()
	 * @var little\help\model\Help
	 */
	protected $model;


	/**
	 * 帮助文章表 条件更新数据
	 * @param array $args 事件参数
	 * @param int $args->condition 更新条件
	 * @param array $args->values 更新的值
	 * @return mixed
	 */
	public function handle(array $args, Help $model)
	{
		// Todo: 帮助文章表 条件 更新数据
		return $model->where($args['condition'])->save($args['values']);
	}
}
