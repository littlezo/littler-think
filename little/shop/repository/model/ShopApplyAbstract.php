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
 * @property apply_id $int
 * @property apply_no $string 申请编号
 * @property site_id $int 店铺id
 * @property member_id $int 申请会员id
 * @property member_name $string 会员名称 取昵称字段
 * @property website_id $int 分站id
 * @property cert_id $int 认证信息
 * @property shop_name $string 申请店铺名称
 * @property apply_state $int 申请状态 1. 待审核 2. 财务凭据审核中  3. 开店通过 -1.审核失败 -2 财务审核拒绝
 * @property apply_message $string 管理员审核信息
 * @property apply_year $int 开店时长(年)
 * @property category_name $string 店铺分类名称
 * @property category_id $int 店铺分类id
 * @property group_name $string 店铺分组名称
 * @property group_id $int  店铺分组ID
 * @property level_id $int 申请店铺等级
 * @property level_name $string 申请店铺等级名称
 * @property paying_money_certificate $string 付款凭证
 * @property paying_money_certificate_explain $string 付款凭证说明
 * @property paying_deposit $float 保证金
 * @property paying_apply $float 开店费用
 * @property paying_amount $float 付款金额
 * @property create_time $int 创建时间
 * @property audit_time $int 审核通过时间
 * @property finish_time $int 创建成功时间
 * @property uid $int 用户ID
 * @property username $string 账号
 */
abstract class ShopApplyAbstract extends Model
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
	protected $pk = 'apply_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'apply_id' => 'int',
		'apply_no' => 'string',
		'site_id' => 'int',
		'member_id' => 'int',
		'member_name' => 'string',
		'website_id' => 'int',
		'cert_id' => 'int',
		'shop_name' => 'string',
		'apply_state' => 'int',
		'apply_message' => 'string',
		'apply_year' => 'int',
		'category_name' => 'string',
		'category_id' => 'int',
		'group_name' => 'string',
		'group_id' => 'int',
		'level_id' => 'int',
		'level_name' => 'string',
		'paying_money_certificate' => 'string',
		'paying_money_certificate_explain' => 'string',
		'paying_deposit' => 'float',
		'paying_apply' => 'float',
		'paying_amount' => 'float',
		'create_time' => 'int',
		'audit_time' => 'int',
		'finish_time' => 'int',
		'uid' => 'int',
		'username' => 'string',
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
		'member_name',
		'website_id',
		'cert_id',
		'shop_name',
		'apply_state',
		'apply_message',
		'apply_year',
		'category_name',
		'category_id',
		'group_name',
		'group_id',
		'level_id',
		'level_name',
		'paying_money_certificate',
		'paying_money_certificate_explain',
		'paying_deposit',
		'paying_apply',
		'paying_amount',
		'create_time',
		'audit_time',
		'finish_time',
		'uid',
		'username',
	];
}
