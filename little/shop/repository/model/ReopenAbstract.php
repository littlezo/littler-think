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
 * @property id $int
 * @property reopen_no $string 流水号
 * @property site_id $int 店铺id
 * @property website_id $int 分站ID
 * @property member_id $int 申请会员id
 * @property apply_state $int 申请状态 1. 待审核 -1.审核失败 2.审核成功
 * @property apply_message $string 管理员审核信息
 * @property apply_year $int 开店时长(年)
 * @property shop_group_name $string 店铺分组名称
 * @property shop_group_id $int  店铺分组ID
 * @property paying_money_certificate $string 付款凭证
 * @property paying_amount $float 付款金额
 * @property paying_money_certificate_explain $string 付款凭证说明
 * @property create_time $int 创建时间
 * @property audit_time $int 审核通过时间
 * @property finish_time $int 完成时间
 */
abstract class ReopenAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'shop_reopen';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'reopen_no' => 'string',
		'site_id' => 'int',
		'website_id' => 'int',
		'member_id' => 'int',
		'apply_state' => 'int',
		'apply_message' => 'string',
		'apply_year' => 'int',
		'shop_group_name' => 'string',
		'shop_group_id' => 'int',
		'paying_money_certificate' => 'string',
		'paying_amount' => 'float',
		'paying_money_certificate_explain' => 'string',
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
		'id',
		'reopen_no',
		'site_id',
		'website_id',
		'member_id',
		'apply_state',
		'apply_message',
		'apply_year',
		'shop_group_name',
		'shop_group_id',
		'paying_money_certificate',
		'paying_amount',
		'paying_money_certificate_explain',
		'create_time',
		'audit_time',
		'finish_time',
	];
}
