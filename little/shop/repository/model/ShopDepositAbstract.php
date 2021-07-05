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
 * @property id $int 主键
 * @property deposit_no $string 流水号
 * @property site_id $int 站点id
 * @property site_name $string 站点名称
 * @property money $float 支付金额
 * @property pay_account_name $string 支付银行名称
 * @property pay_no $string 支付编码
 * @property pay_certificate $string 支付凭据
 * @property pay_certificate_explain $string 支付凭据说明
 * @property remark $string 说明
 * @property status $int 审核状态0待审核1.审核成功
 * @property create_time $int 创建时间
 * @property audit_time $int 审核时间
 */
abstract class ShopDepositAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'shop_deposit';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'deposit_no' => 'string',
		'site_id' => 'int',
		'site_name' => 'string',
		'money' => 'float',
		'pay_account_name' => 'string',
		'pay_no' => 'string',
		'pay_certificate' => 'string',
		'pay_certificate_explain' => 'string',
		'remark' => 'string',
		'status' => 'int',
		'create_time' => 'int',
		'audit_time' => 'int',
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
		'deposit_no',
		'site_id',
		'site_name',
		'money',
		'pay_account_name',
		'pay_no',
		'pay_certificate',
		'pay_certificate_explain',
		'remark',
		'status',
		'create_time',
		'audit_time',
	];
}
