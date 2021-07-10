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

namespace little\fenxiao\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int
 * @property withdraw_no $string 提现流水号
 * @property member_id $int 会员id
 * @property fenxiao_id $int 分销商id
 * @property fenxiao_name $string 分销商名称
 * @property withdraw_type $string 提现类型（weixin-微信 alipay-支付宝 balance-余额 bank银行卡）
 * @property bank_name $string 提现银行名称
 * @property account_number $string 提现银行账号
 * @property realname $string 提现账户姓名
 * @property mobile $string 手机
 * @property money $float 提现金额
 * @property withdraw_rate $float 提现手续费率
 * @property withdraw_rate_money $float 提现手续费金额
 * @property real_money $float 实际到账金额
 * @property status $int 当前状态 1待审核 2已审核 -1 已拒绝
 * @property remark $string 备注
 * @property create_time $int 申请日期
 * @property payment_time $int 到账日期
 * @property update_time $int 修改日期
 * @property transfer_type $int 转账方式   1 线下转账  2线上转账
 * @property transfer_name $string 转账银行名称
 * @property transfer_remark $string 转账备注
 * @property transfer_no $string 转账流水号
 * @property transfer_account_no $string 转账银行账号
 */
abstract class WithdrawAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'fenxiao_withdraw';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'withdraw_no' => 'string',
		'member_id' => 'int',
		'fenxiao_id' => 'int',
		'fenxiao_name' => 'string',
		'withdraw_type' => 'string',
		'bank_name' => 'string',
		'account_number' => 'string',
		'realname' => 'string',
		'mobile' => 'string',
		'money' => 'float',
		'withdraw_rate' => 'float',
		'withdraw_rate_money' => 'float',
		'real_money' => 'float',
		'status' => 'int',
		'remark' => 'string',
		'create_time' => 'int',
		'payment_time' => 'int',
		'update_time' => 'int',
		'transfer_type' => 'int',
		'transfer_name' => 'string',
		'transfer_remark' => 'string',
		'transfer_no' => 'string',
		'transfer_account_no' => 'string',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'id',
		'withdraw_no',
		'member_id',
		'fenxiao_id',
		'fenxiao_name',
		'withdraw_type',
		'bank_name',
		'account_number',
		'realname',
		'mobile',
		'money',
		'withdraw_rate',
		'withdraw_rate_money',
		'real_money',
		'status',
		'remark',
		'create_time',
		'payment_time',
		'update_time',
		'transfer_type',
		'transfer_name',
		'transfer_remark',
		'transfer_no',
		'transfer_account_no',
	];
}
