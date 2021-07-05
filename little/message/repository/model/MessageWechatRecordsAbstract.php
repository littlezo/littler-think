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
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property id $int
 * @property site_id $int 站点id
 * @property open_id $string 接收者账号
 * @property status $int 发送状态
 * @property keyword_json $string 模板消息字段
 * @property keywords $string 消息类型关键字
 * @property create_time $int 创建时间
 * @property send_time $int 发送时间
 * @property result $string 发送结果
 * @property url $string 发送模板消息携带链接
 * @property keywords_name $string 关键字名称
 */
abstract class MessageWechatRecordsAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'message_wechat_records';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'site_id' => 'int',
		'open_id' => 'string',
		'status' => 'int',
		'keyword_json' => 'string',
		'keywords' => 'string',
		'create_time' => 'int',
		'send_time' => 'int',
		'result' => 'string',
		'url' => 'string',
		'keywords_name' => 'string',
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
		'site_id',
		'open_id',
		'status',
		'keyword_json',
		'keywords',
		'create_time',
		'send_time',
		'result',
		'url',
		'keywords_name',
	];
}
