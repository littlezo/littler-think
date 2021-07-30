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
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property apply_id $int
 * @property apply_no $string 申请编号
 * @property site_id $int 店铺
 * @property member_id $int 申请会员
 * @property cert_id $int 认证信息
 * @property username $string 账号
 * @property shop_name $string 申请店铺名称
 * @property apply_status $string 申请状态 1. 待审核 2. 财务凭据审核中  3. 开店通过 -1.审核失败 -2 财务审核拒绝
 * @property apply_remark $string 管理员审核信息
 * @property category_id $int 店铺分类
 * @property pay_certificate $string 付款凭证
 * @property pay_certificate_remark $string 付款凭证说明
 * @property security_deposit $float 保证金
 * @property pay_money $float 付款金额
 * @property create_time $int 创建时间
 * @property audit_time $int 审核通过时间
 * @property finish_time $int 创建成功时间
 */
abstract class ApplyAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'shop_apply';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'apply_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'apply_id' => 'int',
		'apply_no' => 'string',
		'site_id' => 'int',
		'member_id' => 'int',
		'cert_id' => 'int',
		'username' => 'string',
		'shop_name' => 'string',
		'apply_status' => 'string',
		'apply_remark' => 'string',
		'category_id' => 'int',
		'pay_certificate' => 'string',
		'pay_certificate_remark' => 'string',
		'security_deposit' => 'float',
		'pay_money' => 'float',
		'create_time' => 'int',
		'audit_time' => 'int',
		'finish_time' => 'int',
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
		'apply_id',
		'apply_no',
		'site_id',
		'member_id',
		'cert_id',
		'username',
		'shop_name',
		'apply_status',
		'apply_remark',
		'category_id',
		'pay_certificate',
		'pay_certificate_remark',
		'security_deposit',
		'pay_money',
		'create_time',
		'audit_time',
		'finish_time',
	];
}
