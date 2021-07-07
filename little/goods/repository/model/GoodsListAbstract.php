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

namespace little\goods\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property goods_id $int 商品id
 * @property goods_name $string 商品名称
 * @property goods_class $int 商品种类1.实物商品2.虚拟商品3.卡券商品
 * @property goods_class_name $string 商品种类
 * @property goods_attr_class $int 商品类型id
 * @property goods_attr_name $string 商品类型名称
 * @property site_id $int 所属店铺id
 * @property site_name $string 所属店铺名称
 * @property website_id $int 所属分站id
 * @property category_id $int 分类id
 * @property category_id_1 $int 一级分类id
 * @property category_id_2 $int 二级分类id
 * @property category_id_3 $int 三级分类id
 * @property category_name $string 所属分类名称
 * @property brand_id $int 品牌id
 * @property brand_name $string 所属品牌名称
 * @property goods_image $string 商品主图路径
 * @property goods_content $string 商品详情
 * @property is_own $int 是否自营
 * @property goods_state $int 商品状态（1.正常0下架）
 * @property verify_state $int 审核状态（1 已审核 0 待审核 10 违规下架 -1 审核中 -2 审核失败）
 * @property verify_state_remark $string 商品违规或审核失败说明
 * @property price $float 商品价格（取第一个sku）
 * @property market_price $float 市场价格（取第一个sku）
 * @property cost_price $float 成本价（取第一个sku）
 * @property goods_stock $int 商品库存（总和）
 * @property goods_stock_alarm $int 库存预警
 * @property is_virtual $int 是否虚拟类商品（0实物1.虚拟）
 * @property virtual_indate $int 虚拟商品有效期
 * @property is_free_shipping $int 是否免邮
 * @property shipping_template $int 指定运费模板
 * @property goods_spec_format $string 商品规格格式
 * @property goods_attr_format $string 商品属性格式
 * @property is_delete $int 是否已经删除
 * @property introduction $string 促销语
 * @property keywords $string 关键词
 * @property unit $string 单位
 * @property sort $int 排序
 * @property create_time $int 创建时间
 * @property modify_time $int 修改时间
 * @property commission_rate $float 分佣比率(按照分类)
 * @property video_url $string 视频
 * @property discount_id $int 限时折扣id
 * @property seckill_id $int 限时秒杀id
 * @property topic_id $int 专题活动id
 * @property pintuan_id $int 拼团id
 * @property bargain_id $int 砍价id
 * @property sale_num $int 销量
 * @property goods_shop_category_ids $string 店内分类id,逗号隔开
 * @property evaluate $int 评价数
 * @property evaluate_shaitu $int 评价晒图数
 * @property evaluate_shipin $int 评价视频数
 * @property evaluate_zhuiping $int 评价追评数
 * @property evaluate_haoping $int 评价好评数
 * @property evaluate_zhongping $int 评价中评数
 * @property evaluate_chaping $int 评价差评数
 * @property is_fenxiao $int 参与分销（0不参与 1参与）
 * @property fenxiao_type $int 分销佣金类型（1默认  2自行设置）
 * @property supplier_id $int 供应商id
 * @property sku_id $int 第一个商品sku_id
 * @property max_buy $int 限购
 * @property min_buy $int 起购
 */
abstract class GoodsListAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'goods_list';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'goods_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'goods_id' => 'int',
		'goods_name' => 'string',
		'goods_class' => 'int',
		'goods_class_name' => 'string',
		'goods_attr_class' => 'int',
		'goods_attr_name' => 'string',
		'site_id' => 'int',
		'site_name' => 'string',
		'website_id' => 'int',
		'category_id' => 'int',
		'category_id_1' => 'int',
		'category_id_2' => 'int',
		'category_id_3' => 'int',
		'category_name' => 'string',
		'brand_id' => 'int',
		'brand_name' => 'string',
		'goods_image' => 'string',
		'goods_content' => 'string',
		'is_own' => 'int',
		'goods_state' => 'int',
		'verify_state' => 'int',
		'verify_state_remark' => 'string',
		'price' => 'float',
		'market_price' => 'float',
		'cost_price' => 'float',
		'goods_stock' => 'int',
		'goods_stock_alarm' => 'int',
		'is_virtual' => 'int',
		'virtual_indate' => 'int',
		'is_free_shipping' => 'int',
		'shipping_template' => 'int',
		'goods_spec_format' => 'string',
		'goods_attr_format' => 'string',
		'is_delete' => 'int',
		'introduction' => 'string',
		'keywords' => 'string',
		'unit' => 'string',
		'sort' => 'int',
		'create_time' => 'int',
		'modify_time' => 'int',
		'commission_rate' => 'float',
		'video_url' => 'string',
		'discount_id' => 'int',
		'seckill_id' => 'int',
		'topic_id' => 'int',
		'pintuan_id' => 'int',
		'bargain_id' => 'int',
		'sale_num' => 'int',
		'goods_shop_category_ids' => 'string',
		'evaluate' => 'int',
		'evaluate_shaitu' => 'int',
		'evaluate_shipin' => 'int',
		'evaluate_zhuiping' => 'int',
		'evaluate_haoping' => 'int',
		'evaluate_zhongping' => 'int',
		'evaluate_chaping' => 'int',
		'is_fenxiao' => 'int',
		'fenxiao_type' => 'int',
		'supplier_id' => 'int',
		'sku_id' => 'int',
		'max_buy' => 'int',
		'min_buy' => 'int',
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
		'goods_id',
		'goods_name',
		'goods_class',
		'goods_class_name',
		'goods_attr_class',
		'goods_attr_name',
		'site_id',
		'site_name',
		'website_id',
		'category_id',
		'category_id_1',
		'category_id_2',
		'category_id_3',
		'category_name',
		'brand_id',
		'brand_name',
		'goods_image',
		'goods_content',
		'is_own',
		'goods_state',
		'verify_state',
		'verify_state_remark',
		'price',
		'market_price',
		'cost_price',
		'goods_stock',
		'goods_stock_alarm',
		'is_virtual',
		'virtual_indate',
		'is_free_shipping',
		'shipping_template',
		'goods_spec_format',
		'goods_attr_format',
		'is_delete',
		'introduction',
		'keywords',
		'unit',
		'sort',
		'create_time',
		'modify_time',
		'commission_rate',
		'video_url',
		'discount_id',
		'seckill_id',
		'topic_id',
		'pintuan_id',
		'bargain_id',
		'sale_num',
		'goods_shop_category_ids',
		'evaluate',
		'evaluate_shaitu',
		'evaluate_shipin',
		'evaluate_zhuiping',
		'evaluate_haoping',
		'evaluate_zhongping',
		'evaluate_chaping',
		'is_fenxiao',
		'fenxiao_type',
		'supplier_id',
		'sku_id',
		'max_buy',
		'min_buy',
	];
}
