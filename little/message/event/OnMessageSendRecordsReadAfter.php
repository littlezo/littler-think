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

namespace little\message\event;

use little\message\model\MessageSendRecords;
use littler\annotation\Inject;

class OnMessageSendRecordsReadAfter
{
	/**
	 * @Inject()
	 * @var little\message\model\MessageSendRecords
	 */
	protected $model;


	/**
	 * 消息发送日志 字段聚合查询
	 * @param array $args 事件参数
	 * @param string $args->type 聚合查询类型 支持 count max min avg sum
	 * @param array $args->condition 查询条件
	 * @param string $args->field 查询字段
	 * @return mixed
	 */
	public function handle(array $args, MessageSendRecords $model)
	{
		// Todo: 消息发送日志 字段聚合查询
		return $model->where($args['condition'])->{$args['type']}($args['field']);
	}
}
