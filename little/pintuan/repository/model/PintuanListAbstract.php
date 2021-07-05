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

namespace little\pintuan\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property pintuan_id $int 拼团id
 * @property site_id $int 店铺id
 * @property site_name $string 店铺名称
 * @property pintuan_name $string 活动名称
 * @property goods_id $int 商品id
 * @property is_virtual_goods $int 是否是虚拟商品（0否 1是）
 * @property pintuan_num $int 参团人数
 * @property pintuan_time $int 拼团有效期
 * @property remark $string 备注
 * @property create_time $int 创建时间
 * @property modify_time $int 修改时间
 * @property is_recommend $int 是否推荐
 * @property start_time $int 开始时间
 * @property end_time $int 结束时间
 * @property buy_num $int 拼团限制购买
 * @property pintuan_price $float 显示拼团价
 * @property is_single_buy $int 是否单独购买
 * @property is_virtual_buy $int 是否虚拟成团
 * @property is_promotion $int 是否团长优惠
 * @property status $int 状态（0正常 1活动进行中  2活动已结束  3失效  4删除）
 * @property group_num $int 开团组数
 * @property order_num $int 购买人数
 */
abstract class PintuanListAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'pintuan_list';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'pintuan_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'pintuan_id' => 'int',
		'site_id' => 'int',
		'site_name' => 'string',
		'pintuan_name' => 'string',
		'goods_id' => 'int',
		'is_virtual_goods' => 'int',
		'pintuan_num' => 'int',
		'pintuan_time' => 'int',
		'remark' => 'string',
		'create_time' => 'int',
		'modify_time' => 'int',
		'is_recommend' => 'int',
		'start_time' => 'int',
		'end_time' => 'int',
		'buy_num' => 'int',
		'pintuan_price' => 'float',
		'is_single_buy' => 'int',
		'is_virtual_buy' => 'int',
		'is_promotion' => 'int',
		'status' => 'int',
		'group_num' => 'int',
		'order_num' => 'int',
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
		'pintuan_id',
		'site_id',
		'site_name',
		'pintuan_name',
		'goods_id',
		'is_virtual_goods',
		'pintuan_num',
		'pintuan_time',
		'remark',
		'create_time',
		'modify_time',
		'is_recommend',
		'start_time',
		'end_time',
		'buy_num',
		'pintuan_price',
		'is_single_buy',
		'is_virtual_buy',
		'is_promotion',
		'status',
		'group_num',
		'order_num',
	];
}
