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

namespace little\order\model;

use little\order\repository\model\DetailAbstract;

/**
 * 订单详情 模型.
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
				'dataIndex' => 'order_id',
				'width' => 80,
				'fixed' => 'left',
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '订单编号',
				'dataIndex' => 'order_no',
				'width' => 180,
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
				'title' => '订单内容',
				'dataIndex' => 'order_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '订单来源',
				'dataIndex' => 'order_from',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '订单类型 1. 线上订单  2. 线下订单  3. 抵扣卷订单  4余额订单 5现金券 6区域代理订单  10贡献值订单',
				'dataIndex' => 'order_type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '支付流水号',
				'dataIndex' => 'out_trade_no',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '支付方式 1微信 2 支付宝 3 余额 ',
				'dataIndex' => 'pay_type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '购买人uid',
				'dataIndex' => 'member_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '购买人姓名',
				'dataIndex' => 'name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '购买人手机',
				'dataIndex' => 'mobile',
				'width' => 160,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '实付金额',
				'dataIndex' => 'pay_money',
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
				'title' => '订单状态  1待发货  2已发货 3已完成 4退款中 5 已退款  6拼团进行中',
				'dataIndex' => 'order_status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '支付状态 1已支付',
				'dataIndex' => 'pay_status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '订单支付时间',
				'dataIndex' => 'pay_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否锁定订单（针对维权，锁定不可操作）',
				'dataIndex' => 'is_lock',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '订单详情',
				'dataIndex' => 'order_detail',
				'width' => 80,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => true,
			],
			[
				'title' => '服务商锁',
				'dataIndex' => 'is_spl',
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
		'rowKey' => 'order_id',
		'searchInfo' => ['order' => 'asc'],
		'actionColumn' => [
			'width' => 100,
			'title' => '操作',
			'dataIndex' => 'action',
			'slots' => ['customRender' => 'action'],
			'fixed' => 'right',
		],
		'dropActions' => '[{"icon":"clarity:note-edit-line","label":"修改","auth":"order:detail:update","onClick":"handleEdit.bind(null, record)"},{"label":"删除","icon":"ant-design:delete-outlined","color":"error","auth":"order:detail:delete","popConfirm":{"title":"是否确认删除","confirm":"handleDelete.bind(null, record)"}}]',
		'actions' => '[]',
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'baseColProps' => ['xxl' => 6, 'xl' => 8, 'lg' => 12, 'md' => 34],
		'schemas' => [['field' => 'order_id', 'label' => 'ID', 'component' => 'Input']],
	];

	/**
	 * @var array 增加表单字段映射
	 */
	public $form_schema = [
		'labelWidth' => 120,
		'baseColProps' => ['xxl' => 6, 'xl' => 8, 'lg' => 12, 'md' => 34],
		'schemas' => [
			['field' => 'order_no', 'label' => '订单编号', 'component' => 'Input', 'required' => true],
			['field' => 'site_id', 'label' => '商家id', 'component' => 'Input', 'required' => true],
			['field' => 'order_name', 'label' => '订单内容', 'component' => 'Input', 'required' => true],
			['field' => 'order_from', 'label' => '订单来源', 'component' => 'Input', 'required' => true],
			[
				'field' => 'order_type',
				'label' => '订单类型 1. 线上订单  2. 线下订单  3. 抵扣卷订单  4余额订单 5现金券 6区域代理订单  10贡献值订单',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'out_trade_no', 'label' => '支付流水号', 'component' => 'Input', 'required' => true],
			[
				'field' => 'pay_type',
				'label' => '支付方式 1微信 2 支付宝 3 余额 ',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'member_id', 'label' => '购买人uid', 'component' => 'Input', 'required' => true],
			['field' => 'name', 'label' => '购买人姓名', 'component' => 'Input', 'required' => true],
			['field' => 'mobile', 'label' => '购买人手机', 'component' => 'Input', 'required' => true],
			['field' => 'pay_money', 'label' => '实付金额', 'component' => 'Input', 'required' => true],
			['field' => 'create_time', 'label' => '创建时间', 'component' => 'Input', 'required' => true],
			[
				'field' => 'order_status',
				'label' => '订单状态  1待发货  2已发货 3已完成 4退款中 5 已退款  6拼团进行中',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'pay_status', 'label' => '支付状态 1已支付', 'component' => 'Input', 'required' => true],
			['field' => 'pay_time', 'label' => '订单支付时间', 'component' => 'Input', 'required' => true],
			[
				'field' => 'is_lock',
				'label' => '是否锁定订单（针对维权，锁定不可操作）',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'order_detail', 'label' => '订单详情', 'component' => 'Input', 'required' => false],
			['field' => 'is_spl', 'label' => '服务商锁', 'component' => 'Input', 'required' => true],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];

	protected $connection = 'source';

	// 设置JSON字段的类型
	protected $jsonType = [
		'order_detail->level'	=>	'int',
		'order_detail->is_spl'	=>	'int',
	];
}
