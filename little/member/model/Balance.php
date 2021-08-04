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
				'title' => '交易号',
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
                    const value = record.trade_type;
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
				    const value = record.account_type;
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
				    const value = record.type;
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
				    const value = record.pay_status;
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
		// 'searchInfo' => ['order' => 'asc'],
		'actionColumn' => [
			'width' => 100,
			'title' => '操作',
			'dataIndex' => 'action',
			'slots' => ['customRender' => 'action'],
			'fixed' => 'right',
		],
		'actions' => "[
          {
            icon: 'clarity:note-edit-line',
            label: '审核',
            auth: 'member:balance:update',
            ifShow: ()=>record.trade_type===2&&record.status===0,
            onClick: handleEdit.bind(null, record),
          }
        ]",
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'baseColProps'=>  ['xxl'=> 6, 'xl'=> 8, 'lg'=> 12, 'md'=> 24],
		'schemas' => [
			[
				'field' => 'like_trade_no',
				'label' => '交易号',
				'component' => 'Input',
			],
			[
				'field' => 'trade_type',
				'label' => '交易类型',
				'component' => 'Select',
				'componentProps' => [
					'options' => [
						[
							'label' => '充值',
							'value' => 1,
							'key' => 1,
						],
						[
							'label' => '提现',
							'value' => 2,
							'key' => 2,
						],
						[
							'label' => '转账',
							'value' => 3,
							'key' => 3,
						],
						[
							'label' => '购物',
							'value' => 4,
							'key' => 4,
						],
						[
							'label' => '销售利润',
							'value' => 5,
							'key' => 5,
						],
						[
							'label' => '代理收益',
							'value' => 6,
							'key' => 6,
						],
						[
							'label' => '货款结算',
							'value' => 7,
							'key' => 7,
						],
						[
							'label' => '商家保证金',
							'value' => 8,
							'key' => 8,
						],
					],
				],
			],
			[
				'field' => 'member_id',
				'label' => '会员ID',
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
				'label' => '交易号',
				'component' => 'Input',
				'dynamicDisabled' => '({ values }) => {
                    return true;
                }',
			],
			[
				'field' => 'trade_type',
				'label' => '交易类型',
				'component' => 'Select',
				'dynamicDisabled' => '({ values }) => {
                    return true;
                }',
				'componentProps' => [
					'options' => [
						[
							'label' => '充值',
							'value' => 1,
							'key' => 1,
						],
						[
							'label' => '提现',
							'value' => 2,
							'key' => 2,
						],
						[
							'label' => '转账',
							'value' => 3,
							'key' => 3,
						],
						[
							'label' => '购物',
							'value' => 4,
							'key' => 4,
						],
						[
							'label' => '销售利润',
							'value' => 5,
							'key' => 5,
						],
						[
							'label' => '代理收益',
							'value' => 6,
							'key' => 6,
						],
						[
							'label' => '货款结算',
							'value' => 7,
							'key' => 7,
						],
						[
							'label' => '商家保证金',
							'value' => 8,
							'key' => 8,
						],
					],
				],
			],
			[
				'field' => 'remarks',
				'label' => '备注',
				'component' => 'Input',
				'dynamicDisabled' => '({ values }) => {
                    return true;
                }',
			],
			[
				'field' => 'account_type',
				'label' => '账号类型',
				'component' => 'Select',
				'dynamicDisabled' => '({ values }) => {
                    return true;
                }',
				'componentProps' => [
					'options' => [
						[
							'label' => '支付宝',
							'value' => 1,
							'key' => 1,
						],
						[
							'label' => '微信',
							'value' => 2,
							'key' => 2,
						],
						[
							'label' => '银行卡',
							'value' => 3,
							'key' => 3,
						],
						[
							'label' => '会员账户',
							'value' => 4,
							'key' => 4,
						],
					],
				],
			],
			[
				'field' => 'account_name',
				'label' => '收付款人',
				'component' => 'Input',
				'dynamicDisabled' => '({ values }) => {
                    return true;
                }',
			],
			[
				'field' => 'account_number',
				'label' => '收付款账号',
				'component' => 'Input',
				'dynamicDisabled' => '({ values }) => {
                    return true;
                }',
			],
			[
				'field' => 'money',
				'label' => '金额',
				'component' => 'Input',
				'dynamicDisabled' => '({ values }) => {
                    return true;
                }',
			],
			[
				'field' => 'fact_money',
				'label' => '到账金额',
				'component' => 'Input',
				'dynamicDisabled' => '({ values }) => {
                    return true;
                }',
			],
			[
				'field' => 'rate',
				'label' => '手续费率',
				'component' => 'Input',
				'dynamicDisabled' => '({ values }) => {
                    return true;
                }',
			],
			[
				'field' => 'service_money',
				'label' => '手续费',
				'component' => 'Input',
				'dynamicDisabled' => '({ values }) => {
                    return true;
                }',
			],
			[
				'field' => 'create_time',
				'label' => '申请时间',
				'component' => 'Input',
				'dynamicDisabled' => '({ values }) => {
                    return true;
                }',
			],
			[
				'field' => 'status',
				'label' => '状态',
				'component' => 'RadioButtonGroup',
				'required' => true,
				'defaultValue' => 1,
				'componentProps' => [
					'options' => [
						[
							'label' => '拒绝',
							'value' => -1,
						],
						[
							'label' => '通过',
							'value' => 1,
						],
					],
				],
			],
			[
				'field' => 'pay_type',
				'label' => '打款方式',
				'component' => 'RadioButtonGroup',
				'required' => true,
				'ifShow' => '({ values }) => {
                    return values.status===1;
                }',
				'componentProps' => [
					'options' => [
						[
							'label' => '自动打款',
							'value' => 1,
						],
						[
							'label' => '手动打款',
							'value' => 0,
						],
					],
				],
			],
			[
				'field' => 'audit_remark',
				'label' => '审核备注',
				'component' => 'Input',
				'dynamicRules' => '({ values }) => {
                    return values.status===-1?[{required:true}]:[];
                }',
				'ifShow' => '({ values }) => {
                    return values.status===-1;
                }',
			],
			[
				'field' => 'certificate',
				'label' => '凭证',
				// 'component' => 'Input',
				'component' => 'Upload',
				// 'rules' => [
				// 	['required' => true, 'message' => '请选择上传文件'],
				// ],
				'componentProps' => [
					'maxSize' => 10,
					'multiple' => false,
					'accept' => ['jpg', 'jpeg', 'png'],
					'maxNumber' => 1,
					'api' => '(argv)=>uploadApi(argv)',
					'check' => '(argv)=>checkUploadApi(argv)',
					'handleChange' => '(list) => {
			            console.log(list);
			        }',
				],
				'dynamicRules' => '({ values }) => {
                    return values.pay_type===0||values.account_type===3?[{required:true}]:[];
                }',
				'ifShow' => '({ values }) => {
                    return values.pay_type===0 && values.status===1&&[1,2,3].includes(values.account_type);
                }',
			],
			[
				'field' => 'certificate_remark',
				'label' => '凭证备注',
				'component' => 'Input',
				'dynamicRules' => '({ values }) => {
                    return values.pay_type===0||values.account_type===3?[{required:true}]:[];
                }',
				'ifShow' => '({ values }) => {
                    return values.pay_type===0 && values.status===1&&[1,2,3].includes(values.account_type);
                }',
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
