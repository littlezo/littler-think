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

namespace little\chat\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int
 * @property send_id $int 发送者ID
 * @property receive_id $int 接收者ID
 * @property content $string 内容
 * @property is_read $int  0 未读 1已读
 * @property room $string 房间号
 * @property create_time $datetime 创建时间
 * @property update_time $datetime 更新时间
 */
abstract class LogAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'chat_log';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'send_id' => 'int',
		'receive_id' => 'int',
		'content' => 'string',
		'is_read' => 'int',
		'room' => 'string',
		'create_time' => 'datetime',
		'update_time' => 'datetime',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = ['id', 'send_id', 'receive_id', 'content', 'is_read', 'room', 'create_time', 'update_time'];
}
