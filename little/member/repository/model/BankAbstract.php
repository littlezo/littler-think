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
 * @property account_type $int 账户类型 1-支付宝  2-银行卡3-微信
 * @property account_name $string 银行名称
 * @property account_number $string 银行账号
 * @property is_default $int 是否默认账号
 * @property create_time $int 创建日期
 * @property update_time $int 修改日期
 */
abstract class BankAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_bank';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'member_id' => 'int',
		'realname' => 'string',
		'mobile' => 'string',
		'account_type' => 'int',
		'account_name' => 'string',
		'account_number' => 'string',
		'is_default' => 'int',
		'create_time' => 'int',
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
		'member_id',
		'realname',
		'mobile',
		'account_type',
		'account_name',
		'account_number',
		'is_default',
		'create_time',
		'update_time',
	];
}
