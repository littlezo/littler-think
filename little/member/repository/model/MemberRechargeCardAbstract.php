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
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property card_id $int
 * @property recharge_id $int 套餐ID
 * @property recharge_name $string 套餐名称
 * @property site_id $int 店铺ID
 * @property site_name $string 店铺名称
 * @property card_account $string 充值卡号
 * @property cover_img $string 封面
 * @property face_value $float 面值
 * @property point $int 积分
 * @property growth $int 成长值
 * @property coupon_id $string 优惠券ID
 * @property buy_price $float 购买金额
 * @property member_id $int 会员ID
 * @property member_img $string 会员头像
 * @property nickname $string 会员昵称
 * @property order_id $int 订单ID
 * @property order_no $string 订单编号
 * @property from_type $int 获取来源
 * @property use_status $int 使用状态（1未使用 2已使用）
 * @property create_time $int 创建时间
 * @property use_time $int 使用时间
 */
abstract class MemberRechargeCardAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_recharge_card';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'card_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'card_id' => 'int',
		'recharge_id' => 'int',
		'recharge_name' => 'string',
		'site_id' => 'int',
		'site_name' => 'string',
		'card_account' => 'string',
		'cover_img' => 'string',
		'face_value' => 'float',
		'point' => 'int',
		'growth' => 'int',
		'coupon_id' => 'string',
		'buy_price' => 'float',
		'member_id' => 'int',
		'member_img' => 'string',
		'nickname' => 'string',
		'order_id' => 'int',
		'order_no' => 'string',
		'from_type' => 'int',
		'use_status' => 'int',
		'create_time' => 'int',
		'use_time' => 'int',
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
		'card_id',
		'recharge_id',
		'recharge_name',
		'site_id',
		'site_name',
		'card_account',
		'cover_img',
		'face_value',
		'point',
		'growth',
		'coupon_id',
		'buy_price',
		'member_id',
		'member_img',
		'nickname',
		'order_id',
		'order_no',
		'from_type',
		'use_status',
		'create_time',
		'use_time',
	];
}
