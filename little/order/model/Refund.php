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

use little\order\repository\model\RefundAbstract;

/**
 * 订单退款操作记录 模型
 */
class Refund extends RefundAbstract
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
				'title' => '订单号',
				'dataIndex' => 'order_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '退款订单号',
				'dataIndex' => 'refund_no',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '退款金额',
				'dataIndex' => 'refund_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '退款商户金额',
				'dataIndex' => 'refund_shop_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '退款平台金额',
				'dataIndex' => 'refund_platform_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '实际退款金额',
				'dataIndex' => 'refund_real_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '退款方式 1 原路退款 2线下退款',
				'dataIndex' => 'refund_type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '退款状态 1退款中 2已退款  3已驳回',
				'dataIndex' => 'refund_status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '操作内容',
				'dataIndex' => 'action',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '操作类型1买家2卖家',
				'dataIndex' => 'action_way',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '操作人id',
				'dataIndex' => 'action_userid',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '操作时间',
				'dataIndex' => 'action_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '退款申请时间',
				'dataIndex' => 'create_time',
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
		'dropActions' => '[{"icon":"clarity:note-edit-line","label":"修改","auth":"order:refund:update","onClick":"handleEdit.bind(null, record)"},{"label":"删除","icon":"ant-design:delete-outlined","color":"error","auth":"order:refund:delete","popConfirm":{"title":"是否确认删除","confirm":"handleDelete.bind(null, record)"}}]',
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
			['field' => 'order_id', 'label' => '订单号', 'component' => 'Input', 'required' => true],
			['field' => 'refund_no', 'label' => '退款订单号', 'component' => 'Input', 'required' => true],
			['field' => 'refund_money', 'label' => '退款金额', 'component' => 'Input', 'required' => true],
			['field' => 'refund_shop_money', 'label' => '退款商户金额', 'component' => 'Input', 'required' => true],
			[
				'field' => 'refund_platform_money',
				'label' => '退款平台金额',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'refund_real_money', 'label' => '实际退款金额', 'component' => 'Input', 'required' => true],
			[
				'field' => 'refund_type',
				'label' => '退款方式 1 原路退款 2线下退款',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'refund_status',
				'label' => '退款状态 1退款中 2已退款  3已驳回',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'action', 'label' => '操作内容', 'component' => 'Input', 'required' => true],
			['field' => 'action_way', 'label' => '操作类型1买家2卖家', 'component' => 'Input', 'required' => true],
			['field' => 'action_userid', 'label' => '操作人id', 'component' => 'Input', 'required' => true],
			['field' => 'action_time', 'label' => '操作时间', 'component' => 'Input', 'required' => true],
			['field' => 'create_time', 'label' => '退款申请时间', 'component' => 'Input', 'required' => true],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];
}
