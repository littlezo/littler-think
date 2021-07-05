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

use little\message\model\MessageWechatRecords;
use littler\annotation\Inject;

class OnMessageWechatRecordsDeleteById
{
	/**
	 * @Inject()
	 * @var little\message\model\MessageWechatRecords
	 */
	protected $model;


	/**
	 * 微信公众号消息发送记录 ID 删除数据.
	 * @param int $args ID
	 * @return mixed
	 */
	public function handle(int $args, MessageWechatRecords $model)
	{
		// Todo: 微信公众号消息发送记录 ID 删除数据
		return $model->deleteBy($args);
	}
}
