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

namespace little\goods\model;

use little\goods\repository\model\SkuAbstract;

/**
 * 商品SKU 模型
 */
class Sku extends SkuAbstract
{
	/**
	 * @var array 关联预载
	 */
	public $with = [];

	/**
	 * @var array 列表字段映射
	 */
	public $table_schema = [
		'columns' => [
			[
				'title' => 'ID',
				'dataIndex' => 'sku_id',
				'width' => 80,
				'fixed' => 'left',
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品sku名称',
				'dataIndex' => 'sku_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品sku编码',
				'dataIndex' => 'sku_no',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => 'sku规格格式',
				'dataIndex' => 'sku_spec_format',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => 'sku单价',
				'dataIndex' => 'price',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => 'sku市场价',
				'dataIndex' => 'market_price',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => 'sku成本价',
				'dataIndex' => 'cost_price',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => 'sku折扣价（默认等于单价）',
				'dataIndex' => 'discount_price',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '活动类型1.限时折扣',
				'dataIndex' => 'promotion_type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '活动开始时间',
				'dataIndex' => 'start_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '活动结束时间',
				'dataIndex' => 'end_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品sku库存',
				'dataIndex' => 'stock',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '重量（单位g）',
				'dataIndex' => 'weight',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '体积（单位立方米）',
				'dataIndex' => 'volume',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '点击量',
				'dataIndex' => 'click_num',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '销量',
				'dataIndex' => 'sale_num',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '收藏量',
				'dataIndex' => 'collect_num',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => 'sku主图',
				'dataIndex' => 'sku_image',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => 'sku图片',
				'dataIndex' => 'sku_images',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品id',
				'dataIndex' => 'goods_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品种类1.实物商品2.虚拟商品3.卡券商品',
				'dataIndex' => 'goods_class',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品种类',
				'dataIndex' => 'goods_class_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品类型id',
				'dataIndex' => 'goods_attr_class',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品类型名称',
				'dataIndex' => 'goods_attr_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品名称',
				'dataIndex' => 'goods_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '所属店铺id',
				'dataIndex' => 'site_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '所属店铺名称',
				'dataIndex' => 'site_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '所属分站id',
				'dataIndex' => 'website_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '分类id',
				'dataIndex' => 'category_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '品牌id',
				'dataIndex' => 'brand_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '所属品牌名称',
				'dataIndex' => 'brand_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品详情',
				'dataIndex' => 'goods_content',
				'width' => 80,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => true,
			],
			[
				'title' => '是否自营',
				'dataIndex' => 'is_own',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品状态（1.正常0下架）',
				'dataIndex' => 'goods_state',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '审核状态（1 已审核 0 待审核 10 违规下架 -1 审核中 -2 审核失败）',
				'dataIndex' => 'verify_state',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品违规或审核失败说明',
				'dataIndex' => 'verify_state_remark',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '库存预警',
				'dataIndex' => 'goods_stock_alarm',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否虚拟类商品（0实物1.虚拟）',
				'dataIndex' => 'is_virtual',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '虚拟商品有效期',
				'dataIndex' => 'virtual_indate',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否免邮',
				'dataIndex' => 'is_free_shipping',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '指定运费模板',
				'dataIndex' => 'shipping_template',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品规格格式',
				'dataIndex' => 'goods_spec_format',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品属性格式',
				'dataIndex' => 'goods_attr_format',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '促销语',
				'dataIndex' => 'introduction',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '关键词',
				'dataIndex' => 'keywords',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '单位',
				'dataIndex' => 'unit',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '排序',
				'dataIndex' => 'sort',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '创建时间',
				'dataIndex' => 'create_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '修改时间',
				'dataIndex' => 'update_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '佣金比率（按照分类）',
				'dataIndex' => 'commission_rate',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '视频',
				'dataIndex' => 'video_url',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '限时折扣id',
				'dataIndex' => 'discount_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '秒杀id',
				'dataIndex' => 'seckill_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '专题活动id',
				'dataIndex' => 'topic_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '拼团id',
				'dataIndex' => 'pintuan_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '砍价id',
				'dataIndex' => 'bargain_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '店内分类id,逗号隔开',
				'dataIndex' => 'goods_shop_category_ids',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '评价数',
				'dataIndex' => 'evaluate',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '晒图评价数',
				'dataIndex' => 'evaluate_shaitu',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '视频评价数',
				'dataIndex' => 'evaluate_shipin',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '追评数',
				'dataIndex' => 'evaluate_zhuiping',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '规格名称',
				'dataIndex' => 'spec_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '好评数',
				'dataIndex' => 'evaluate_haoping',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '中评数',
				'dataIndex' => 'evaluate_zhongping',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '差评数',
				'dataIndex' => 'evaluate_chaping',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '供应商id',
				'dataIndex' => 'supplier_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '限购',
				'dataIndex' => 'max_buy',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '起购',
				'dataIndex' => 'min_buy',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
		],
		'formConfig' => [],
		'pagination' => true,
		'striped' => true,
		'useSearchForm' => true,
		'showTableSetting' => true,
		'bordered' => true,
		'showIndexColumn' => false,
		'canResize' => true,
		'rowKey' => 'sku_id',
		'searchInfo' => ['order' => 'asc'],
		'actionColumn' => [
			'width' => 100,
			'title' => '操作',
			'dataIndex' => 'action',
			'slots' => ['customRender' => 'action'],
			'fixed' => 'right',
		],
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'schemas' => [
			[
				'field' => 'sku_id',
				'label' => 'ID',
				'component' => 'Input',

			],
		],
	];

	/**
	 * @var array 增加表单字段映射
	 */
	public $form_schema = [
		'labelWidth' => 120,
		'schemas' => [
			[
				'field' => 'sku_name',
				'label' => '商品sku名称',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'sku_no',
				'label' => '商品sku编码',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'sku_spec_format',
				'label' => 'sku规格格式',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'price',
				'label' => 'sku单价',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'market_price',
				'label' => 'sku市场价',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'cost_price',
				'label' => 'sku成本价',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'discount_price',
				'label' => 'sku折扣价（默认等于单价）',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'promotion_type',
				'label' => '活动类型1.限时折扣',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'start_time',
				'label' => '活动开始时间',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'end_time',
				'label' => '活动结束时间',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'stock',
				'label' => '商品sku库存',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'weight',
				'label' => '重量（单位g）',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'volume',
				'label' => '体积（单位立方米）',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'click_num',
				'label' => '点击量',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'sale_num',
				'label' => '销量',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'collect_num',
				'label' => '收藏量',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'sku_image',
				'label' => 'sku主图',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'sku_images',
				'label' => 'sku图片',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'goods_id',
				'label' => '商品id',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'goods_class',
				'label' => '商品种类1.实物商品2.虚拟商品3.卡券商品',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'goods_class_name',
				'label' => '商品种类',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'goods_attr_class',
				'label' => '商品类型id',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'goods_attr_name',
				'label' => '商品类型名称',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'goods_name',
				'label' => '商品名称',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'site_id',
				'label' => '所属店铺id',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'site_name',
				'label' => '所属店铺名称',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'website_id',
				'label' => '所属分站id',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'category_id',
				'label' => '分类id',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'brand_id',
				'label' => '品牌id',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'brand_name',
				'label' => '所属品牌名称',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'goods_content',
				'label' => '商品详情',
				'component' => 'Input',
				'required' => false,

			],
			[
				'field' => 'is_own',
				'label' => '是否自营',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'goods_state',
				'label' => '商品状态（1.正常0下架）',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'verify_state',
				'label' => '审核状态（1 已审核 0 待审核 10 违规下架 -1 审核中 -2 审核失败）',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'verify_state_remark',
				'label' => '商品违规或审核失败说明',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'goods_stock_alarm',
				'label' => '库存预警',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'is_virtual',
				'label' => '是否虚拟类商品（0实物1.虚拟）',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'virtual_indate',
				'label' => '虚拟商品有效期',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'is_free_shipping',
				'label' => '是否免邮',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'shipping_template',
				'label' => '指定运费模板',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'goods_spec_format',
				'label' => '商品规格格式',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'goods_attr_format',
				'label' => '商品属性格式',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'is_delete',
				'label' => '是否已经删除',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'introduction',
				'label' => '促销语',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'keywords',
				'label' => '关键词',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'unit',
				'label' => '单位',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'sort',
				'label' => '排序',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'create_time',
				'label' => '创建时间',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'update_time',
				'label' => '修改时间',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'commission_rate',
				'label' => '佣金比率（按照分类）',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'video_url',
				'label' => '视频',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'discount_id',
				'label' => '限时折扣id',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'seckill_id',
				'label' => '秒杀id',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'topic_id',
				'label' => '专题活动id',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'pintuan_id',
				'label' => '拼团id',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'bargain_id',
				'label' => '砍价id',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'goods_shop_category_ids',
				'label' => '店内分类id,逗号隔开',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'evaluate',
				'label' => '评价数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'evaluate_shaitu',
				'label' => '晒图评价数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'evaluate_shipin',
				'label' => '视频评价数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'evaluate_zhuiping',
				'label' => '追评数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'spec_name',
				'label' => '规格名称',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'evaluate_haoping',
				'label' => '好评数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'evaluate_zhongping',
				'label' => '中评数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'evaluate_chaping',
				'label' => '差评数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'supplier_id',
				'label' => '供应商id',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'max_buy',
				'label' => '限购',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'min_buy',
				'label' => '起购',
				'component' => 'Input',
				'required' => true,

			],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];
}
