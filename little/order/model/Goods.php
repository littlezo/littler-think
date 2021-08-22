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

namespace little\order\model;

use little\order\repository\model\GoodsAbstract;

/**
 * 订单商品 模型
 */
class Goods extends GoodsAbstract
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
				'dataIndex' => 'order_goods_id',
				'width' => 80,
				'fixed' => 'left',
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '订单ID',
				'dataIndex' => 'order_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商家id',
				'dataIndex' => 'site_id',
				'width' => 100,
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
				'title' => '商品skuid',
				'dataIndex' => 'sku_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品sku 详情',
				'dataIndex' => 'sku_details',
				'width' => 80,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => true,
			],
			[
				'title' => '商品卖价',
				'dataIndex' => 'price',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '成本价',
				'dataIndex' => 'cost_price',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '购买数量',
				'dataIndex' => 'num',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品总价',
				'dataIndex' => 'goods_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '成本总价',
				'dataIndex' => 'cost_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '赠品标识',
				'dataIndex' => 'gift_flag',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '0 待评价  1已评价 2追评',
				'dataIndex' => 'evaluate_status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '实际商品购买价',
				'dataIndex' => 'real_goods_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '抵扣金额',
				'dataIndex' => 'deduct_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '现金券金额',
				'dataIndex' => 'cash_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '余额金额',
				'dataIndex' => 'balance_money',
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
		'rowKey' => 'order_goods_id',
		'searchInfo' => ['order' => 'asc'],
		'actionColumn' => [
			'width' => 100,
			'title' => '操作',
			'dataIndex' => 'action',
			'slots' => ['customRender' => 'action'],
			'fixed' => 'right',
		],
		'dropActions' => '[{"icon":"clarity:note-edit-line","label":"修改","auth":"order:goods:update","onClick":"handleEdit.bind(null, record)"},{"label":"删除","icon":"ant-design:delete-outlined","color":"error","auth":"order:goods:delete","popConfirm":{"title":"是否确认删除","confirm":"handleDelete.bind(null, record)"}}]',
		'actions' => '[]',
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'baseColProps' => ['xxl' => 6, 'xl' => 8, 'lg' => 12, 'md' => 34],
		'schemas' => [['field' => 'order_goods_id', 'label' => 'ID', 'component' => 'Input']],
	];

	/**
	 * @var array 增加表单字段映射
	 */
	public $form_schema = [
		'labelWidth' => 120,
		'baseColProps' => ['xxl' => 6, 'xl' => 8, 'lg' => 12, 'md' => 34],
		'schemas' => [
			['field' => 'order_id', 'label' => '订单ID', 'component' => 'Input', 'required' => true],
			['field' => 'site_id', 'label' => '商家id', 'component' => 'Input', 'required' => true],
			['field' => 'goods_id', 'label' => '商品id', 'component' => 'Input', 'required' => true],
			['field' => 'sku_id', 'label' => '商品skuid', 'component' => 'Input', 'required' => true],
			['field' => 'sku_details', 'label' => '商品sku 详情', 'component' => 'Input', 'required' => false],
			['field' => 'price', 'label' => '商品卖价', 'component' => 'Input', 'required' => true],
			['field' => 'cost_price', 'label' => '成本价', 'component' => 'Input', 'required' => true],
			['field' => 'num', 'label' => '购买数量', 'component' => 'Input', 'required' => true],
			['field' => 'goods_money', 'label' => '商品总价', 'component' => 'Input', 'required' => true],
			['field' => 'cost_money', 'label' => '成本总价', 'component' => 'Input', 'required' => true],
			['field' => 'gift_flag', 'label' => '赠品标识', 'component' => 'Input', 'required' => true],
			[
				'field' => 'evaluate_status',
				'label' => '0 待评价  1已评价 2追评',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'real_goods_money', 'label' => '实际商品购买价', 'component' => 'Input', 'required' => true],
			['field' => 'deduct_money', 'label' => '抵扣金额', 'component' => 'Input', 'required' => false],
			['field' => 'cash_money', 'label' => '现金券金额', 'component' => 'Input', 'required' => false],
			['field' => 'balance_money', 'label' => '余额金额', 'component' => 'Input', 'required' => false],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];
}
