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

namespace little\fenxiao\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property fenxiao_order_id $int
 * @property order_id $int 订单ID
 * @property order_no $string 订单编号
 * @property order_goods_id $int 订单项ID
 * @property site_id $int 站点ID
 * @property site_name $string 站点名称
 * @property goods_id $int 商品ID
 * @property sku_id $int 商品skuid
 * @property sku_name $string 商品sku名称
 * @property sku_image $string 商品图片
 * @property price $float 商品卖价
 * @property num $int 商品数量
 * @property real_goods_money $float 商品总价
 * @property member_id $int 购买人ID
 * @property member_name $string 购买人名称
 * @property member_mobile $string 购买人电话
 * @property full_address $string 购买人详细地址
 * @property commission $float 总佣金
 * @property commission_rate $float 分销总比率
 * @property one_fenxiao_id $int 一级分销商ID
 * @property one_rate $float 一级分销比例
 * @property one_commission $float 一级分销佣金
 * @property one_fenxiao_name $string 一级分销商名
 * @property two_fenxiao_id $int 二级分销商ID
 * @property two_rate $float 二级分销比例
 * @property two_commission $float 二级分销佣金
 * @property two_fenxiao_name $string 二级分销商名
 * @property three_fenxiao_id $int 三级分销商ID
 * @property three_rate $float 三级分销比例
 * @property three_commission $float 三级分销佣金
 * @property three_fenxiao_name $string 三级分销商名
 * @property is_settlement $int 是否结算
 * @property is_refund $int 是否退款
 */
abstract class FenxiaoOrderAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'fenxiao_order';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'fenxiao_order_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'fenxiao_order_id' => 'int',
		'order_id' => 'int',
		'order_no' => 'string',
		'order_goods_id' => 'int',
		'site_id' => 'int',
		'site_name' => 'string',
		'goods_id' => 'int',
		'sku_id' => 'int',
		'sku_name' => 'string',
		'sku_image' => 'string',
		'price' => 'float',
		'num' => 'int',
		'real_goods_money' => 'float',
		'member_id' => 'int',
		'member_name' => 'string',
		'member_mobile' => 'string',
		'full_address' => 'string',
		'commission' => 'float',
		'commission_rate' => 'float',
		'one_fenxiao_id' => 'int',
		'one_rate' => 'float',
		'one_commission' => 'float',
		'one_fenxiao_name' => 'string',
		'two_fenxiao_id' => 'int',
		'two_rate' => 'float',
		'two_commission' => 'float',
		'two_fenxiao_name' => 'string',
		'three_fenxiao_id' => 'int',
		'three_rate' => 'float',
		'three_commission' => 'float',
		'three_fenxiao_name' => 'string',
		'is_settlement' => 'int',
		'is_refund' => 'int',
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
		'fenxiao_order_id',
		'order_id',
		'order_no',
		'order_goods_id',
		'site_id',
		'site_name',
		'goods_id',
		'sku_id',
		'sku_name',
		'sku_image',
		'price',
		'num',
		'real_goods_money',
		'member_id',
		'member_name',
		'member_mobile',
		'full_address',
		'commission',
		'commission_rate',
		'one_fenxiao_id',
		'one_rate',
		'one_commission',
		'one_fenxiao_name',
		'two_fenxiao_id',
		'two_rate',
		'two_commission',
		'two_fenxiao_name',
		'three_fenxiao_id',
		'three_rate',
		'three_commission',
		'three_fenxiao_name',
		'is_settlement',
		'is_refund',
	];
}
