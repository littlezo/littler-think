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

namespace little\member\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int
 * @property member_id $int 会员id
 * @property realname $string 真实姓名
 * @property mobile $string 手机号
 * @property withdraw_type $string 账户类型 alipay-支付宝  bank银行卡 wechatpay 微信
 * @property branch_bank_name $string 银行名称
 * @property bank_account $string 银行账号
 * @property is_default $int 是否默认账号
 * @property create_time $int 创建日期
 * @property modify_time $int 修改日期
 */
abstract class MemberBankAccountAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_bank_account';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'member_id' => 'int',
		'realname' => 'string',
		'mobile' => 'string',
		'withdraw_type' => 'string',
		'branch_bank_name' => 'string',
		'bank_account' => 'string',
		'is_default' => 'int',
		'create_time' => 'int',
		'modify_time' => 'int',
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
		'member_id',
		'realname',
		'mobile',
		'withdraw_type',
		'branch_bank_name',
		'bank_account',
		'is_default',
		'create_time',
		'modify_time',
	];
}
