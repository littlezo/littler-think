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
 * @property account $string 接收人账号
 * @property keywords $string 消息类型关键字
 * @property status $int 发送状态
 * @property result $string 结果
 * @property content $string 短信内容
 * @property var_parse $string 短信内容变量解析 json
 * @property create_time $int 创建时间
 * @property send_time $int 发送时间
 * @property code $string 模板编号
 * @property addon $string 发送插件
 * @property addon_name $string 发送方式名称
 * @property keywords_name $string 关键字名称
 */
abstract class MessageSmsRecordsAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'message_sms_records';

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
		'account' => 'string',
		'keywords' => 'string',
		'status' => 'int',
		'result' => 'string',
		'content' => 'string',
		'var_parse' => 'string',
		'create_time' => 'int',
		'send_time' => 'int',
		'code' => 'string',
		'addon' => 'string',
		'addon_name' => 'string',
		'keywords_name' => 'string',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'id' => 'int',
		'site_id' => 'int',
		'account' => 'varchar',
		'keywords' => 'varchar',
		'status' => 'int',
		'result' => 'varchar',
		'content' => 'varchar',
		'var_parse' => 'varchar',
		'create_time' => 'timestamp',
		'send_time' => 'timestamp',
		'code' => 'varchar',
		'addon' => 'varchar',
		'addon_name' => 'varchar',
		'keywords_name' => 'varchar',
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
	protected $field = [
		'id',
		'site_id',
		'account',
		'keywords',
		'status',
		'result',
		'content',
		'var_parse',
		'create_time',
		'send_time',
		'code',
		'addon',
		'addon_name',
		'keywords_name',
	];
}
