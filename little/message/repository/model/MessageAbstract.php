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
 * @property id $int 主键
 * @property addon $string 插件
 * @property keywords $string 关键字
 * @property title $string 主题
 * @property message_type $int 消息类型 1 买家消息  2 卖家消息
 * @property message_json $string 配置参数
 * @property email_is_open $int 是否启动邮箱
 * @property email_title $string 邮箱标题
 * @property email_content $string 邮箱发送内容
 * @property sms_is_open $int 是否启动短信
 * @property sms_addon $string 发送短信插件
 * @property sms_json $string 短信配置参数
 * @property sms_content $string 短信内容
 * @property wechat_is_open $int 微信公众号消息
 * @property wechat_json $string 配置参数
 * @property weapp_is_open $int 微信小程序是否启动
 * @property weapp_json $string 微信小程序配置参数
 * @property aliapp_is_open $int 支付宝小程序是否启动
 * @property aliapp_json $string 支付宝小程序配置参数
 * @property support_type $string 支持场景 如小程序  wep端
 */
abstract class MessageAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'message';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'addon' => 'string',
		'keywords' => 'string',
		'title' => 'string',
		'message_type' => 'int',
		'message_json' => 'string',
		'email_is_open' => 'int',
		'email_title' => 'string',
		'email_content' => 'string',
		'sms_is_open' => 'int',
		'sms_addon' => 'string',
		'sms_json' => 'string',
		'sms_content' => 'string',
		'wechat_is_open' => 'int',
		'wechat_json' => 'string',
		'weapp_is_open' => 'int',
		'weapp_json' => 'string',
		'aliapp_is_open' => 'int',
		'aliapp_json' => 'string',
		'support_type' => 'string',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'id' => 'int unsigned',
		'addon' => 'varchar',
		'keywords' => 'varchar',
		'title' => 'varchar',
		'message_type' => 'int',
		'message_json' => 'varchar',
		'email_is_open' => 'int',
		'email_title' => 'varchar',
		'email_content' => 'varchar',
		'sms_is_open' => 'int',
		'sms_addon' => 'varchar',
		'sms_json' => 'varchar',
		'sms_content' => 'varchar',
		'wechat_is_open' => 'int',
		'wechat_json' => 'varchar',
		'weapp_is_open' => 'int',
		'weapp_json' => 'varchar',
		'aliapp_is_open' => 'int',
		'aliapp_json' => 'varchar',
		'support_type' => 'varchar',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $createTime 关闭创建时间自动写入
	 */
	protected $createTime = false;

	/**
	 * @var array $updateTime 关闭更新时间自动写入
	 */
	protected $updateTime = false;

	/**
	 * @var array $field 允许写入字段
	 */
	protected $field = [
		'id',
		'addon',
		'keywords',
		'title',
		'message_type',
		'message_json',
		'email_is_open',
		'email_title',
		'email_content',
		'sms_is_open',
		'sms_addon',
		'sms_json',
		'sms_content',
		'wechat_is_open',
		'wechat_json',
		'weapp_is_open',
		'weapp_json',
		'aliapp_is_open',
		'aliapp_json',
		'support_type',
	];
}
