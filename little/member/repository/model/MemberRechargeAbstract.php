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
 * @property recharge_id $int
 * @property site_id $int 店铺ID
 * @property site_name $string 店铺名称
 * @property recharge_name $string 套餐名称
 * @property cover_img $string 封面
 * @property face_value $float 面值
 * @property buy_price $float 购买金额
 * @property point $int 积分
 * @property growth $int 成长值
 * @property coupon_id $string 优惠券ID
 * @property sale_num $int 发放数量
 * @property create_time $int 创建时间
 * @property update_time $int 修改时间
 * @property status $int 状态（1正常 2关闭）
 */
abstract class MemberRechargeAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_recharge';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'recharge_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'recharge_id' => 'int',
		'site_id' => 'int',
		'site_name' => 'string',
		'recharge_name' => 'string',
		'cover_img' => 'string',
		'face_value' => 'float',
		'buy_price' => 'float',
		'point' => 'int',
		'growth' => 'int',
		'coupon_id' => 'string',
		'sale_num' => 'int',
		'create_time' => 'int',
		'update_time' => 'int',
		'status' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'recharge_id',
		'site_id',
		'site_name',
		'recharge_name',
		'cover_img',
		'face_value',
		'buy_price',
		'point',
		'growth',
		'coupon_id',
		'sale_num',
		'create_time',
		'update_time',
		'status',
	];
}
