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

use little\order\repository\model\SettlementAbstract;

/**
 * 订单结算 模型
 */
class Settlement extends SettlementAbstract
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
				'dataIndex' => 'id',
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
				'title' => '店铺金额',
				'dataIndex' => 'shop_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '平台费率',
				'dataIndex' => 'platform_rate',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '平台服务费',
				'dataIndex' => 'platform_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '总佣金',
				'dataIndex' => 'rebate_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '结算详情',
				'dataIndex' => 'settlement_detail',
				'width' => 80,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => true,
			],
			[
				'title' => '结算时间',
				'dataIndex' => 'settlement_time',
				'width' => 120,
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
		'rowKey' => 'id',
		'searchInfo' => ['order' => 'asc'],
		'actionColumn' => [
			'width' => 100,
			'title' => '操作',
			'dataIndex' => 'action',
			'slots' => ['customRender' => 'action'],
			'fixed' => 'right',
		],
		'dropActions' => '[{"icon":"clarity:note-edit-line","label":"修改","auth":"order:settlement:update","onClick":"handleEdit.bind(null, record)"},{"label":"删除","icon":"ant-design:delete-outlined","color":"error","auth":"order:settlement:delete","popConfirm":{"title":"是否确认删除","confirm":"handleDelete.bind(null, record)"}}]',
		'actions' => '[]',
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'baseColProps' => ['xxl' => 6, 'xl' => 8, 'lg' => 12, 'md' => 34],
		'schemas' => [['field' => 'id', 'label' => 'ID', 'component' => 'Input']],
	];

	/**
	 * @var array 增加表单字段映射
	 */
	public $form_schema = [
		'labelWidth' => 120,
		'baseColProps' => ['xxl' => 6, 'xl' => 8, 'lg' => 12, 'md' => 34],
		'schemas' => [
			['field' => 'order_id', 'label' => '订单ID', 'component' => 'Input', 'required' => false],
			['field' => 'shop_money', 'label' => '店铺金额', 'component' => 'Input', 'required' => false],
			['field' => 'platform_rate', 'label' => '平台费率', 'component' => 'Input', 'required' => false],
			['field' => 'platform_money', 'label' => '平台服务费', 'component' => 'Input', 'required' => false],
			['field' => 'rebate_money', 'label' => '总佣金', 'component' => 'Input', 'required' => false],
			['field' => 'settlement_detail', 'label' => '结算详情', 'component' => 'Input', 'required' => false],
			['field' => 'settlement_time', 'label' => '结算时间', 'component' => 'Input', 'required' => false],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];
}
