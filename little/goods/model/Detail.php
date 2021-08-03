<?php

/**
 * #logic 做事不讲究逻辑，再努力也只是重复犯错
 * ## 何为相思：不删不聊不打扰，可否具体点：曾爱过。何为遗憾：你来我往皆过客，可否具体点：再无你。
 * ## 只要思想不滑稽，方法总比苦难多！
 * @version 1.0.0
 * @author @小小只^v^ <littlezov@qq.com>  littlezov@qq.com
 * @contact  littlezov@qq.com
 * @see     https://github.com/littlezo
 * @document https://github.com/littlezo/wiki
 * @license  https://github.com/littlezo/MozillaPublicLicense/blob/main/LICENSE
 */

declare(strict_types=1);

namespace little\goods\model;

use little\goods\repository\model\DetailAbstract;

/**
 * 商品列表 模型.
 */
class Detail extends DetailAbstract
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
				'dataIndex' => 'goods_id',
				'width' => 80,
				'fixed' => 'left',
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
				'title' => '商品种类1.实物商品2.虚拟商品3.卡券商品',
				'dataIndex' => 'goods_class',
				'width' => 100,
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
				'title' => '所属店铺id',
				'dataIndex' => 'site_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '分类id',
				'dataIndex' => 'category_id',
				'width' => 80,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => true,
			],
			[
				'title' => '商品主图路径',
				'dataIndex' => 'goods_image',
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
				'title' => '商品价格（取第一个sku）',
				'dataIndex' => 'price',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '市场价格（取第一个sku）',
				'dataIndex' => 'market_price',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '成本价（取第一个sku）',
				'dataIndex' => 'cost_price',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品库存（总和）',
				'dataIndex' => 'goods_stock',
				'width' => 100,
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
				'title' => '是否免邮',
				'dataIndex' => 'is_free_shipping',
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
				'title' => '视频',
				'dataIndex' => 'video_url',
				'width' => 180,
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
				'title' => '拼团id',
				'dataIndex' => 'pintuan_id',
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
				'title' => '评价数',
				'dataIndex' => 'evaluate',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '评价晒图数',
				'dataIndex' => 'evaluate_shaitu',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '评价视频数',
				'dataIndex' => 'evaluate_shipin',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '评价追评数',
				'dataIndex' => 'evaluate_zhuiping',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '评价好评数',
				'dataIndex' => 'evaluate_haoping',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '评价中评数',
				'dataIndex' => 'evaluate_zhongping',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '评价差评数',
				'dataIndex' => 'evaluate_chaping',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品BV',
				'dataIndex' => 'goods_bv',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '第一个商品sku_id',
				'dataIndex' => 'sku_id',
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
		'rowKey' => 'goods_id',
		'searchInfo' => ['order' => 'asc'],
		'actionColumn' => [
			'width' => 100,
			'title' => '操作',
			'dataIndex' => 'action',
			'slots' => ['customRender' => 'action'],
			'fixed' => 'right',
		],
		'dropActions' =>"[
          {
            icon: 'clarity:note-edit-line',
            label: '修改',
            auth: 'goods:detail:update',
            onClick: handleEdit.bind(null, record),
          },
          {
            label: '删除',
            icon: 'ant-design:delete-outlined',
            color: 'error',
            auth: 'goods:detail:delete',
            popConfirm: {
                title: '是否确认删除',
                confirm: handleDelete.bind(null, record),
            },
          },
        ]",
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'schemas' => [
			[
				'field' => 'goods_id',
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
				'field' => 'goods_name',
				'label' => '商品名称',
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
				'field' => 'goods_attr_class',
				'label' => '商品类型id',
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
				'field' => 'category_id',
				'label' => '分类id',
				'component' => 'Input',
				'required' => false,

			],
			[
				'field' => 'goods_image',
				'label' => '商品主图路径',
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
				'field' => 'price',
				'label' => '商品价格（取第一个sku）',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'market_price',
				'label' => '市场价格（取第一个sku）',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'cost_price',
				'label' => '成本价（取第一个sku）',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'goods_stock',
				'label' => '商品库存（总和）',
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
				'field' => 'is_free_shipping',
				'label' => '是否免邮',
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
				'field' => 'video_url',
				'label' => '视频',
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
				'field' => 'pintuan_id',
				'label' => '拼团id',
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
				'field' => 'evaluate',
				'label' => '评价数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'evaluate_shaitu',
				'label' => '评价晒图数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'evaluate_shipin',
				'label' => '评价视频数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'evaluate_zhuiping',
				'label' => '评价追评数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'evaluate_haoping',
				'label' => '评价好评数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'evaluate_zhongping',
				'label' => '评价中评数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'evaluate_chaping',
				'label' => '评价差评数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'goods_bv',
				'label' => '商品BV',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'sku_id',
				'label' => '第一个商品sku_id',
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
