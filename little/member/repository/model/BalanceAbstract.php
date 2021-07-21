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
 * @property trade_no $string 提现交易号
 * @property member_id $int 会员id
 * @property trade_type $int 交易类型: 1充值，2提现，3转账，4购物，5销售利润，6代理收益，7货款结算
 * @property to_member_id $int 目标用户
 * @property realname $string 真实姓名
 * @property to_realname $string 目标真实姓名
 * @property mobile $string 手机号
 * @property to_mobile $string 目标手机号
 * @property status $int 状态0待审核1.待到账2已到账 -1已拒绝
 * @property remarks $string 备注
 * @property audit_remark $string 审核备注
 * @property transfer_type_name $string 转账方式名称
 * @property account_type $string 账号类型 1支付宝，2微信，3银行卡，4会员账户
 * @property account_number $string 收付款账号
 * @property money $float 金额
 * @property fact_money $float 到账金额
 * @property rate $float 手续费率
 * @property service_money $float 手续费
 * @property account_name $string 账号
 * @property certificate $string 凭证
 * @property certificate_remark $string 凭证备注
 * @property create_time $int 申请时间
 * @property audit_time $int 审核时间
 * @property payment_time $int 转账时间
 * @property update_time $int 更新时间
 */
abstract class BalanceAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_balance';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'trade_no' => 'string',
		'member_id' => 'int',
		'trade_type' => 'int',
		'to_member_id' => 'int',
		'realname' => 'string',
		'to_realname' => 'string',
		'mobile' => 'string',
		'to_mobile' => 'string',
		'status' => 'int',
		'remarks' => 'string',
		'audit_remark' => 'string',
		'transfer_type_name' => 'string',
		'account_type' => 'string',
		'account_number' => 'string',
		'money' => 'float',
		'fact_money' => 'float',
		'rate' => 'float',
		'service_money' => 'float',
		'account_name' => 'string',
		'certificate' => 'string',
		'certificate_remark' => 'string',
		'create_time' => 'int',
		'audit_time' => 'int',
		'payment_time' => 'int',
		'update_time' => 'int',
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
		'trade_no',
		'member_id',
		'trade_type',
		'to_member_id',
		'realname',
		'to_realname',
		'mobile',
		'to_mobile',
		'status',
		'remarks',
		'audit_remark',
		'transfer_type_name',
		'account_type',
		'account_number',
		'money',
		'fact_money',
		'rate',
		'service_money',
		'account_name',
		'certificate',
		'certificate_remark',
		'create_time',
		'audit_time',
		'payment_time',
		'update_time',
	];
}
