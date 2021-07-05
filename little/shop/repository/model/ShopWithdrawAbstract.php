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

namespace little\shop\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property id $int
 * @property withdraw_no $string 提现流水编号
 * @property site_id $int
 * @property site_name $string 站点名称
 * @property name $string 联系人姓名
 * @property mobile $string 联系人手机
 * @property bank_type $int 账户类型1.银行2.支付宝
 * @property settlement_bank_account_name $string 银行开户名
 * @property settlement_bank_account_number $string 结算公司银行账号
 * @property settlement_bank_name $string 结算公司支行名
 * @property settlement_bank_address $string 结算银行所在地
 * @property money $float 提现金额
 * @property apply_time $int 申请时间
 * @property payment_time $int 转账时间
 * @property status $int 状态0待审核1.待转账2已转账 -1拒绝
 * @property memo $string 备注
 * @property modify_time $int 最后修改时间
 * @property is_period $int 是否周期结算
 * @property period_id $int 结算周期
 * @property period_name $string 结算周期名称
 * @property paying_money_certificate $string 上传付款凭证
 * @property paying_money_certificate_explain $string 说明
 */
abstract class ShopWithdrawAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'shop_withdraw';

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
		'site_id' => 'int',
		'site_name' => 'string',
		'name' => 'string',
		'mobile' => 'string',
		'bank_type' => 'int',
		'settlement_bank_account_name' => 'string',
		'settlement_bank_account_number' => 'string',
		'settlement_bank_name' => 'string',
		'settlement_bank_address' => 'string',
		'money' => 'float',
		'apply_time' => 'int',
		'payment_time' => 'int',
		'status' => 'int',
		'memo' => 'string',
		'modify_time' => 'int',
		'is_period' => 'int',
		'period_id' => 'int',
		'period_name' => 'string',
		'paying_money_certificate' => 'string',
		'paying_money_certificate_explain' => 'string',
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
		'site_id',
		'site_name',
		'name',
		'mobile',
		'bank_type',
		'settlement_bank_account_name',
		'settlement_bank_account_number',
		'settlement_bank_name',
		'settlement_bank_address',
		'money',
		'apply_time',
		'payment_time',
		'status',
		'memo',
		'modify_time',
		'is_period',
		'period_id',
		'period_name',
		'paying_money_certificate',
		'paying_money_certificate_explain',
	];
}
