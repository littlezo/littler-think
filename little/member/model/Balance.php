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

namespace little\member\model;

use little\member\repository\model\BalanceAbstract;
use littler\annotation\model\relation\HasOne;

/**
 * 会员账户流水 模型.
 * @HasOne("member", model="User", foreignKey="id", localKey="member_id")
 * @HasOne("target", model="User", foreignKey="id", localKey="to_member_id")
 */
class Balance extends BalanceAbstract
{
	/**
	 * @var array 关联预载
	 */
	public $with = ['member', 'target'];

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
				'title' => '提现交易号',
				'dataIndex' => 'trade_no',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '会员',
				'dataIndex' => 'member.nickname',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '手机号',
				'dataIndex' => 'member.mobile',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '交易类型',
				'dataIndex' => 'trade_type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {
                        1:'充值',
                        2:'提现',
                        3:'转账',
                        4:'购物',
                        5:'销售利润',
                        6:'代理收益',
                        7:'货款结算',
                        8:'商家保证金'
                    };
                    const colorMap = {
                        1:'pink',
                        2:'red',
                        3:'orange',
                        4:'green',
                        5:'cyan',
                        6:'blue',
                        7:'purple',
                        8:'#2db7f5',
                    };
                    const value = record.status;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '目标用户',
				'dataIndex' => 'target.nickname',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '目标手机号',
				'dataIndex' => 'target.mobile',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '状态',
				'dataIndex' => 'status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
				    const textMap = {
				        '-1':'已拒绝',
				        '0':'待审核',
				        '1':'待到账',
				        '2':'已到账',
                    };
				    const colorMap = {
				        '-1':'red',
				        '0':'pink',
				        '1':'orange',
				        '2':'green',
                    };
				    const value = record.status;
				    const color = colorMap[value];
				    const text = textMap[value];
				    return h(ant('Tag'), { color: color }, () => text);
				}",
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
				'title' => '账号类型',
				'dataIndex' => 'account_type',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
				    const textMap = {
				        '1':'支付宝',
				        '2':'微信',
				        '3':'银行卡',
				        '4':'会员账户',
                    };
				    const colorMap = {
				        '1':'red',
				        '2':'pink',
				        '3':'orange',
				        '4':'green',
                    };
				    const value = record.status;
				    const color = colorMap[value];
				    const text = textMap[value];
				    return h(ant('Tag'), { color: color }, () => text);
				}",
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
				'title' => '变更金额',
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
				'title' => '余额类型',
				'dataIndex' => 'type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
				    const textMap = {
				        '0':'余额',
				        '1':'现金劵',
				        '2':'抵扣券',
                    };
				    const colorMap = {
				        '0':'pink',
				        '1':'orange',
				        '2':'green',
                    };
				    const value = record.status;
				    const color = colorMap[value];
				    const text = textMap[value];
				    return h(ant('Tag'), { color: color }, () => text);
				}",
			],
			[
				'title' => '收支类型',
				'dataIndex' => 'pay_status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
				    const textMap = {
				        '0':'支出',
				        '1':'收入',
                    };
				    const colorMap = {
				        '0':'orange',
				        '1':'green',
                    };
				    const value = record.status;
				    const color = colorMap[value];
				    const text = textMap[value];
				    return h(ant('Tag'), { color: color }, () => text);
				}",
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
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'schemas' => [
			[
				'field' => 'id',
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
				'field' => 'trade_no',
				'label' => '提现交易号',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'member_id',
				'label' => '会员id',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'trade_type',
				'label' => '交易类型: 1充值，2提现，3转账，4购物，5销售利润，6代理收益，7货款结算  8商家保证金',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'to_member_id',
				'label' => '目标用户',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'status',
				'label' => '状态0待审核1.待到账2已到账 -1已拒绝',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'remarks',
				'label' => '备注',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'audit_remark',
				'label' => '审核备注',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'transfer_type_name',
				'label' => '转账方式名称',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'account_type',
				'label' => '账号类型 1支付宝，2微信，3银行卡，4会员账户',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'account_name',
				'label' => '收付款人',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'account_number',
				'label' => '收付款账号',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'before',
				'label' => '变更前金额',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'after',
				'label' => '变更后金额',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'prev_id',
				'label' => '最新一次变更记录id ',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'money',
				'label' => '金额',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'fact_money',
				'label' => '到账金额',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'rate',
				'label' => '手续费率',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'service_money',
				'label' => '手续费',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'certificate',
				'label' => '凭证',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'certificate_remark',
				'label' => '凭证备注',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'create_time',
				'label' => '申请时间',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'audit_time',
				'label' => '审核时间',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'payment_time',
				'label' => '转账时间',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'update_time',
				'label' => '更新时间',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'type',
				'label' => '0余额  1现金券 2 抵扣券',
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

	public function getAuditTimeAttr($value)
	{
		return date('Y-m-d H:i:s', $value);
	}

	public function getPaymentTimeAttr($value)
	{
		return date('Y-m-d H:i:s', $value);
	}
}
