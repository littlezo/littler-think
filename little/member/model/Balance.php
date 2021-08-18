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

namespace little\member\model;

use little\member\repository\model\BalanceAbstract;

/**
 * 会员账户流水 模型
 */
class Balance extends BalanceAbstract
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
				'title' => '交易号',
				'dataIndex' => 'trade_no',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '会员id',
				'dataIndex' => 'member_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '交易类型: 1充值，2提现，3转账，4购物，5销售利润，6代理收益，7货款结算  8商家保证金 9区域代理申请  10贡献值记录',
				'dataIndex' => 'trade_type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '目标用户',
				'dataIndex' => 'to_member_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '状态0待审核1.待到账2已到账 -1已拒绝',
				'dataIndex' => 'status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '结算状态：0 未结算  1已结算 默认:1',
				'dataIndex' => 'settlement_status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '结算截止时间',
				'dataIndex' => 'settlement_end_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '结算条件等级ID',
				'dataIndex' => 'settlement_level_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '备注',
				'dataIndex' => 'remarks',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '审核备注',
				'dataIndex' => 'audit_remark',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '账号类型 1支付宝，2微信，3银行卡，4会员账户',
				'dataIndex' => 'account_type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '收付款人',
				'dataIndex' => 'account_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '收付款账号',
				'dataIndex' => 'account_number',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '变更前金额',
				'dataIndex' => 'before',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '变更后金额',
				'dataIndex' => 'after',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '最新一次变更记录id ',
				'dataIndex' => 'prev_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '金额',
				'dataIndex' => 'money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '到账金额',
				'dataIndex' => 'fact_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '手续费率',
				'dataIndex' => 'rate',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '手续费',
				'dataIndex' => 'service_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '凭证',
				'dataIndex' => 'certificate',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '凭证备注',
				'dataIndex' => 'certificate_remark',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '申请时间',
				'dataIndex' => 'create_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '审核时间',
				'dataIndex' => 'audit_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '转账时间',
				'dataIndex' => 'payment_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '更新时间',
				'dataIndex' => 'update_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '0余额  1现金券 2 抵扣券 3贡献值',
				'dataIndex' => 'type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '支付状态 0支出  1收入',
				'dataIndex' => 'pay_status',
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
		'rowKey' => 'id',
		'searchInfo' => ['order' => 'asc'],
		'actionColumn' => [
			'width' => 100,
			'title' => '操作',
			'dataIndex' => 'action',
			'slots' => ['customRender' => 'action'],
			'fixed' => 'right',
		],
		'dropActions' => '[{"icon":"clarity:note-edit-line","label":"修改","auth":"member:balance:update","onClick":"handleEdit.bind(null, record)"},{"label":"删除","icon":"ant-design:delete-outlined","color":"error","auth":"member:balance:delete","popConfirm":{"title":"是否确认删除","confirm":"handleDelete.bind(null, record)"}}]',
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
			['field' => 'trade_no', 'label' => '交易号', 'component' => 'Input', 'required' => true],
			['field' => 'member_id', 'label' => '会员id', 'component' => 'Input', 'required' => true],
			[
				'field' => 'trade_type',
				'label' => '交易类型: 1充值，2提现，3转账，4购物，5销售利润，6代理收益，7货款结算  8商家保证金 9区域代理申请  10贡献值记录',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'to_member_id', 'label' => '目标用户', 'component' => 'Input', 'required' => true],
			[
				'field' => 'status',
				'label' => '状态0待审核1.待到账2已到账 -1已拒绝',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'settlement_status',
				'label' => '结算状态：0 未结算  1已结算 默认:1',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'settlement_end_time', 'label' => '结算截止时间', 'component' => 'Input', 'required' => true],
			[
				'field' => 'settlement_level_id',
				'label' => '结算条件等级ID',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'remarks', 'label' => '备注', 'component' => 'Input', 'required' => true],
			['field' => 'audit_remark', 'label' => '审核备注', 'component' => 'Input', 'required' => true],
			[
				'field' => 'account_type',
				'label' => '账号类型 1支付宝，2微信，3银行卡，4会员账户',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'account_name', 'label' => '收付款人', 'component' => 'Input', 'required' => true],
			['field' => 'account_number', 'label' => '收付款账号', 'component' => 'Input', 'required' => true],
			['field' => 'before', 'label' => '变更前金额', 'component' => 'Input', 'required' => true],
			['field' => 'after', 'label' => '变更后金额', 'component' => 'Input', 'required' => true],
			['field' => 'prev_id', 'label' => '最新一次变更记录id ', 'component' => 'Input', 'required' => true],
			['field' => 'money', 'label' => '金额', 'component' => 'Input', 'required' => true],
			['field' => 'fact_money', 'label' => '到账金额', 'component' => 'Input', 'required' => true],
			['field' => 'rate', 'label' => '手续费率', 'component' => 'Input', 'required' => true],
			['field' => 'service_money', 'label' => '手续费', 'component' => 'Input', 'required' => true],
			['field' => 'certificate', 'label' => '凭证', 'component' => 'Input', 'required' => true],
			['field' => 'certificate_remark', 'label' => '凭证备注', 'component' => 'Input', 'required' => true],
			['field' => 'create_time', 'label' => '申请时间', 'component' => 'Input', 'required' => true],
			['field' => 'audit_time', 'label' => '审核时间', 'component' => 'Input', 'required' => true],
			['field' => 'payment_time', 'label' => '转账时间', 'component' => 'Input', 'required' => true],
			['field' => 'update_time', 'label' => '更新时间', 'component' => 'Input', 'required' => true],
			[
				'field' => 'type',
				'label' => '0余额  1现金券 2 抵扣券 3贡献值',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'pay_status',
				'label' => '支付状态 0支出  1收入',
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
