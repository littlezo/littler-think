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
 * @property withdraw_no $string 提现交易号
 * @property member_name $string 会员姓名
 * @property member_id $int 会员id
 * @property transfer_type $string 转账提现类型
 * @property realname $string 真实姓名
 * @property apply_money $float 提现申请金额
 * @property rate $float 提现手续费比率
 * @property service_money $float 提现手续费
 * @property money $float 提现到账金额
 * @property apply_time $int 申请时间
 * @property audit_time $int 审核时间
 * @property payment_time $int 转账时间
 * @property status $int 状态0待审核1.待转账2已转账 -1拒绝
 * @property memo $string 备注
 * @property refuse_reason $string 拒绝理由
 * @property member_headimg $string
 * @property status_name $string 提现状态名称
 * @property transfer_type_name $string 转账方式名称
 * @property bank_name $string 银行名称
 * @property account_number $string 收款账号
 * @property certificate $string 凭证
 * @property certificate_remark $string 凭证说明
 * @property mobile $string 手机号
 * @property account_name $string 账号
 */
abstract class WithdrawAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_withdraw';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'withdraw_no' => 'string',
		'member_name' => 'string',
		'member_id' => 'int',
		'transfer_type' => 'string',
		'realname' => 'string',
		'apply_money' => 'float',
		'rate' => 'float',
		'service_money' => 'float',
		'money' => 'float',
		'apply_time' => 'int',
		'audit_time' => 'int',
		'payment_time' => 'int',
		'status' => 'int',
		'memo' => 'string',
		'refuse_reason' => 'string',
		'member_headimg' => 'string',
		'status_name' => 'string',
		'transfer_type_name' => 'string',
		'bank_name' => 'string',
		'account_number' => 'string',
		'certificate' => 'string',
		'certificate_remark' => 'string',
		'mobile' => 'string',
		'account_name' => 'string',
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
	public $field = [
		'id',
		'withdraw_no',
		'member_name',
		'member_id',
		'transfer_type',
		'realname',
		'apply_money',
		'rate',
		'service_money',
		'money',
		'apply_time',
		'audit_time',
		'payment_time',
		'status',
		'memo',
		'refuse_reason',
		'member_headimg',
		'status_name',
		'transfer_type_name',
		'bank_name',
		'account_number',
		'certificate',
		'certificate_remark',
		'mobile',
		'account_name',
	];
}
