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

namespace little\message\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int 主键
 * @property keywords $string 关键字
 * @property message_type $string 消息类型
 * @property addon $string 执行插件
 * @property title $string 主题
 * @property message_json $string 消息内容json
 * @property create_time $int 创建时间
 * @property send_time $int 发送时间
 * @property send_log $string 发送结果
 * @property is_success $int 是否发送成功
 */
abstract class MessageSendLogAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'message_send_log';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'keywords' => 'string',
		'message_type' => 'string',
		'addon' => 'string',
		'title' => 'string',
		'message_json' => 'string',
		'create_time' => 'int',
		'send_time' => 'int',
		'send_log' => 'string',
		'is_success' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $updateTime 关闭更新时间自动写入
	 */
	protected $updateTime = false;

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'id',
		'keywords',
		'message_type',
		'addon',
		'title',
		'message_json',
		'create_time',
		'send_time',
		'send_log',
		'is_success',
	];
}
