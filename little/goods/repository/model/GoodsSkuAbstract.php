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
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property sku_id $int 商品sku_id
 * @property sku_name $string 商品sku名称
 * @property sku_no $string 商品sku编码
 * @property sku_spec_format $string sku规格格式
 * @property price $float sku单价
 * @property market_price $float sku市场价
 * @property cost_price $float sku成本价
 * @property discount_price $float sku折扣价（默认等于单价）
 * @property promotion_type $int 活动类型1.限时折扣
 * @property start_time $int 活动开始时间
 * @property end_time $int 活动结束时间
 * @property stock $int 商品sku库存
 * @property weight $float 重量（单位g）
 * @property volume $float 体积（单位立方米）
 * @property click_num $int 点击量
 * @property sale_num $int 销量
 * @property collect_num $int 收藏量
 * @property sku_image $string sku主图
 * @property sku_images $string sku图片
 * @property goods_id $int 商品id
 * @property goods_class $int 商品种类1.实物商品2.虚拟商品3.卡券商品
 * @property goods_class_name $string 商品种类
 * @property goods_attr_class $int 商品类型id
 * @property goods_attr_name $string 商品类型名称
 * @property goods_name $string 商品名称
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
 * @property goods_content $string 商品详情
 * @property is_own $int 是否自营
 * @property goods_state $int 商品状态（1.正常0下架）
 * @property verify_state $int 审核状态（1 已审核 0 待审核 10 违规下架 -1 审核中 -2 审核失败）
 * @property verify_state_remark $string 商品违规或审核失败说明
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
 * @property commission_rate $float 佣金比率（按照分类）
 * @property video_url $string 视频
 * @property discount_id $int 限时折扣id
 * @property seckill_id $int 秒杀id
 * @property topic_id $int 专题活动id
 * @property pintuan_id $int 拼团id
 * @property bargain_id $int 砍价id
 * @property goods_shop_category_ids $string 店内分类id,逗号隔开
 * @property evaluate $int 评价数
 * @property evaluate_shaitu $int 晒图评价数
 * @property evaluate_shipin $int 视频评价数
 * @property evaluate_zhuiping $int 追评数
 * @property spec_name $string 规格名称
 * @property evaluate_haoping $int 好评数
 * @property evaluate_zhongping $int 中评数
 * @property evaluate_chaping $int 差评数
 * @property supplier_id $int 供应商id
 * @property max_buy $int 限购
 * @property min_buy $int 起购
 */
abstract class GoodsSkuAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'goods_sku';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'sku_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'sku_id' => 'int',
		'sku_name' => 'string',
		'sku_no' => 'string',
		'sku_spec_format' => 'string',
		'price' => 'float',
		'market_price' => 'float',
		'cost_price' => 'float',
		'discount_price' => 'float',
		'promotion_type' => 'int',
		'start_time' => 'int',
		'end_time' => 'int',
		'stock' => 'int',
		'weight' => 'float',
		'volume' => 'float',
		'click_num' => 'int',
		'sale_num' => 'int',
		'collect_num' => 'int',
		'sku_image' => 'string',
		'sku_images' => 'string',
		'goods_id' => 'int',
		'goods_class' => 'int',
		'goods_class_name' => 'string',
		'goods_attr_class' => 'int',
		'goods_attr_name' => 'string',
		'goods_name' => 'string',
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
		'goods_content' => 'string',
		'is_own' => 'int',
		'goods_state' => 'int',
		'verify_state' => 'int',
		'verify_state_remark' => 'string',
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
		'goods_shop_category_ids' => 'string',
		'evaluate' => 'int',
		'evaluate_shaitu' => 'int',
		'evaluate_shipin' => 'int',
		'evaluate_zhuiping' => 'int',
		'spec_name' => 'string',
		'evaluate_haoping' => 'int',
		'evaluate_zhongping' => 'int',
		'evaluate_chaping' => 'int',
		'supplier_id' => 'int',
		'max_buy' => 'int',
		'min_buy' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'sku_id' => 'int unsigned',
		'sku_name' => 'varchar',
		'sku_no' => 'varchar',
		'sku_spec_format' => 'varchar',
		'price' => 'decimal',
		'market_price' => 'decimal',
		'cost_price' => 'decimal',
		'discount_price' => 'decimal',
		'promotion_type' => 'tinyint',
		'start_time' => 'timestamp',
		'end_time' => 'timestamp',
		'stock' => 'int',
		'weight' => 'decimal',
		'volume' => 'decimal',
		'click_num' => 'int',
		'sale_num' => 'int',
		'collect_num' => 'int',
		'sku_image' => 'varchar',
		'sku_images' => 'varchar',
		'goods_id' => 'int',
		'goods_class' => 'int',
		'goods_class_name' => 'varchar',
		'goods_attr_class' => 'int',
		'goods_attr_name' => 'varchar',
		'goods_name' => 'varchar',
		'site_id' => 'int',
		'site_name' => 'varchar',
		'website_id' => 'int',
		'category_id' => 'int',
		'category_id_1' => 'int',
		'category_id_2' => 'int',
		'category_id_3' => 'int',
		'category_name' => 'varchar',
		'brand_id' => 'int',
		'brand_name' => 'varchar',
		'goods_content' => 'mediumtext',
		'is_own' => 'tinyint',
		'goods_state' => 'tinyint',
		'verify_state' => 'int',
		'verify_state_remark' => 'varchar',
		'goods_stock_alarm' => 'int',
		'is_virtual' => 'tinyint',
		'virtual_indate' => 'int',
		'is_free_shipping' => 'tinyint',
		'shipping_template' => 'int',
		'goods_spec_format' => 'varchar',
		'goods_attr_format' => 'varchar',
		'is_delete' => 'tinyint',
		'introduction' => 'varchar',
		'keywords' => 'varchar',
		'unit' => 'varchar',
		'sort' => 'int',
		'create_time' => 'timestamp',
		'modify_time' => 'timestamp',
		'commission_rate' => 'decimal',
		'video_url' => 'varchar',
		'discount_id' => 'int',
		'seckill_id' => 'int',
		'topic_id' => 'int',
		'pintuan_id' => 'int',
		'bargain_id' => 'int',
		'goods_shop_category_ids' => 'varchar',
		'evaluate' => 'int',
		'evaluate_shaitu' => 'int',
		'evaluate_shipin' => 'int',
		'evaluate_zhuiping' => 'int',
		'spec_name' => 'varchar',
		'evaluate_haoping' => 'int',
		'evaluate_zhongping' => 'int',
		'evaluate_chaping' => 'int',
		'supplier_id' => 'int',
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
	protected $field = [
		'sku_id',
		'sku_name',
		'sku_no',
		'sku_spec_format',
		'price',
		'market_price',
		'cost_price',
		'discount_price',
		'promotion_type',
		'start_time',
		'end_time',
		'stock',
		'weight',
		'volume',
		'click_num',
		'sale_num',
		'collect_num',
		'sku_image',
		'sku_images',
		'goods_id',
		'goods_class',
		'goods_class_name',
		'goods_attr_class',
		'goods_attr_name',
		'goods_name',
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
		'goods_content',
		'is_own',
		'goods_state',
		'verify_state',
		'verify_state_remark',
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
		'goods_shop_category_ids',
		'evaluate',
		'evaluate_shaitu',
		'evaluate_shipin',
		'evaluate_zhuiping',
		'spec_name',
		'evaluate_haoping',
		'evaluate_zhongping',
		'evaluate_chaping',
		'supplier_id',
		'max_buy',
		'min_buy',
	];
}
