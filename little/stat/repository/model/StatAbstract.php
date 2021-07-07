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

namespace little\stat\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int
 * @property site_id $int 站点id
 * @property year $int 年
 * @property month $int 月
 * @property day $int 日
 * @property day_time $int 当日时间
 * @property order_total $float 订单金额
 * @property shipping_total $float 运费金额
 * @property refund_total $float 退款金额
 * @property order_pay_count $int 订单总数
 * @property goods_pay_count $int 订单商品总数
 * @property shop_money $float 店铺金额
 * @property platform_money $float 平台金额
 * @property create_time $int 创建时间
 * @property modify_time $int 修改时间
 * @property collect_shop $int 店铺收藏量
 * @property collect_goods $int 商品收藏量
 * @property visit_count $int 浏览量
 * @property order_count $int 订单量（总）
 * @property goods_count $int 订单商品量（总）
 * @property add_goods_count $int 添加商品数
 * @property member_count $int 会员统计
 */
abstract class StatAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'stat';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'site_id' => 'int',
		'year' => 'int',
		'month' => 'int',
		'day' => 'int',
		'day_time' => 'int',
		'order_total' => 'float',
		'shipping_total' => 'float',
		'refund_total' => 'float',
		'order_pay_count' => 'int',
		'goods_pay_count' => 'int',
		'shop_money' => 'float',
		'platform_money' => 'float',
		'create_time' => 'int',
		'modify_time' => 'int',
		'collect_shop' => 'int',
		'collect_goods' => 'int',
		'visit_count' => 'int',
		'order_count' => 'int',
		'goods_count' => 'int',
		'add_goods_count' => 'int',
		'member_count' => 'int',
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
		'site_id',
		'year',
		'month',
		'day',
		'day_time',
		'order_total',
		'shipping_total',
		'refund_total',
		'order_pay_count',
		'goods_pay_count',
		'shop_money',
		'platform_money',
		'create_time',
		'modify_time',
		'collect_shop',
		'collect_goods',
		'visit_count',
		'order_count',
		'goods_count',
		'add_goods_count',
		'member_count',
	];
}
