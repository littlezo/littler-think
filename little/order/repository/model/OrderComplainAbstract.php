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

namespace little\order\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property id $int
 * @property order_goods_id $int 订单项id
 * @property order_id $int 订单id
 * @property order_no $string 订单编号
 * @property site_id $int 商家id
 * @property site_name $string 店铺名称
 * @property website_id $int 分站id
 * @property member_id $int 购买会员id
 * @property member_name $string 购买会员姓名
 * @property goods_id $int 商品id
 * @property sku_id $int 商品skuid
 * @property sku_name $string 商品名称
 * @property sku_image $string 商品图片
 * @property sku_no $string 商品编码
 * @property is_virtual $int 是否是虚拟商品
 * @property price $float 商品卖价
 * @property num $int 购买数量
 * @property goods_money $float 商品总价
 * @property complain_no $string 退款编号（申请产生）
 * @property complain_status $int 退款状态
 * @property complain_status_name $string 退款状态名称
 * @property complain_apply_money $float 退款申请金额
 * @property complain_reason $string 退款原因
 * @property complain_real_money $float 实际退款金额
 * @property complain_time $int 实际退款时间
 * @property complain_refuse_reason $string 退款拒绝原因
 * @property complain_remark $string 退款说明
 * @property complain_money_type $int 退款方式   1 原路退款 2线下退款
 * @property complain_apply_time $int 申请平台维权时间
 * @property complain_status_action $string 维权操作
 * @property real_goods_money $float 订单项实际金额
 */
abstract class OrderComplainAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'order_complain';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'order_goods_id' => 'int',
		'order_id' => 'int',
		'order_no' => 'string',
		'site_id' => 'int',
		'site_name' => 'string',
		'website_id' => 'int',
		'member_id' => 'int',
		'member_name' => 'string',
		'goods_id' => 'int',
		'sku_id' => 'int',
		'sku_name' => 'string',
		'sku_image' => 'string',
		'sku_no' => 'string',
		'is_virtual' => 'int',
		'price' => 'float',
		'num' => 'int',
		'goods_money' => 'float',
		'complain_no' => 'string',
		'complain_status' => 'int',
		'complain_status_name' => 'string',
		'complain_apply_money' => 'float',
		'complain_reason' => 'string',
		'complain_real_money' => 'float',
		'complain_time' => 'int',
		'complain_refuse_reason' => 'string',
		'complain_remark' => 'string',
		'complain_money_type' => 'int',
		'complain_apply_time' => 'int',
		'complain_status_action' => 'string',
		'real_goods_money' => 'float',
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
		'id',
		'order_goods_id',
		'order_id',
		'order_no',
		'site_id',
		'site_name',
		'website_id',
		'member_id',
		'member_name',
		'goods_id',
		'sku_id',
		'sku_name',
		'sku_image',
		'sku_no',
		'is_virtual',
		'price',
		'num',
		'goods_money',
		'complain_no',
		'complain_status',
		'complain_status_name',
		'complain_apply_money',
		'complain_reason',
		'complain_real_money',
		'complain_time',
		'complain_refuse_reason',
		'complain_remark',
		'complain_money_type',
		'complain_apply_time',
		'complain_status_action',
		'real_goods_money',
	];
}
