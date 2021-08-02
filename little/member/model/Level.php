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

use little\member\repository\model\LevelAbstract;

/**
 * 会员等级 模型.
 */
class Level extends LevelAbstract
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
				'dataIndex' => 'level_id',
				'width' => 80,
				'fixed' => 'left',
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '等级名称',
				'dataIndex' => 'level_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '等级排序列',
				'dataIndex' => 'sort',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '升级金额',
				'dataIndex' => 'level_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '备注',
				'dataIndex' => 'remark',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否默认',
				'dataIndex' => 'is_default',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否级差升级',
				'dataIndex' => 'is_diff',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'否',1:'是',2:''};
                    const colorMap = {0:'red',1:'blue',2:'green'};
                    const value = record.is_diff;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '邀请奖励',
				'dataIndex' => 'invite_reward',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '兑换比例',
				'dataIndex' => 'buy_ratio',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否允许申请区域代理',
				'dataIndex' => 'is_region',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'否',1:'是',2:''};
                    const colorMap = {0:'red',1:'blue',2:'green'};
                    const value = record.is_region;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '开启代理佣金',
				'dataIndex' => 'is_region_settle',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'否',1:'是',2:''};
                    const colorMap = {0:'red',1:'blue',2:'green'};
                    const value = record.is_region_settle;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '是否允许申请商家',
				'dataIndex' => 'is_shop',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'否',1:'是',2:''};
                    const colorMap = {0:'red',1:'blue',2:'green'};
                    const value = record.is_shop;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => ' 开启商家佣金',
				'dataIndex' => 'is_shop_settle',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'否',1:'是',2:''};
                    const colorMap = {0:'red',1:'blue',2:'green'};
                    const value = record.is_shop_settle;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '是否出券',
				'dataIndex' => 'is_seller',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'否',1:'是',2:''};
                    const colorMap = {0:'red',1:'blue',2:'green'};
                    const value = record.is_seller;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '是否立即结算',
				'dataIndex' => 'is_hand',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'否',1:'是',2:''};
                    const colorMap = {0:'red',1:'blue',2:'green'};
                    const value = record.is_hand;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '分佣比例',
				'dataIndex' => 'settle_ratio',
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
                    const textMap = {0:'禁用',1:'正常'};
                    const colorMap = {0:'red',1:'green'};
                    const value = record.status;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
		],
		'formConfig' => [],
		'pagination' => false,
		'striped' => true,
		'useSearchForm' => false,
		'showTableSetting' => true,
		'bordered' => true,
		'showIndexColumn' => false,
		'canResize' => true,
		'rowKey' => 'level_id',
		'searchInfo' => ['order' => 'asc'],
		'actionColumn' => [
			'width' => 100,
			'title' => '操作',
			'dataIndex' => 'action',
			'slots' => ['customRender' => 'action'],
			'fixed' => 'right',
		],
		'actions' =>"[
          {
            icon: 'clarity:note-edit-line',
            label: '修改',
            auth: 'member:level:update',
            onClick: handleEdit.bind(null, record),
          },
          {
            label: '删除',
            icon: 'ant-design:delete-outlined',
            color: 'error',
            auth: 'member:level:delete',
            popConfirm: {
                title: '是否确认删除',
                confirm: handleDelete.bind(null, record),
            },
          }
        ]",
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'schemas' => [
			[
				'field' => 'level_id',
				'label' => 'ID',
				'component' => 'Input',
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
		],
	];

	/**
	 * @var array 增加表单字段映射
	 */
	public $form_schema = [
		'labelWidth' => 160,
		'schemas' => [
			[
				'field' => 'level_name',
				'label' => '等级名称',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'sort',
				'label' => '等级排序列',
				'component' => 'InputNumber',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'level_money',
				'label' => '升级金额',
				'component' => 'InputNumber',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'is_default',
				'label' => '是否默认',
				'component' => 'RadioButtonGroup',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
				'componentProps' => [
					'options' => [
						[
							'label' => '是',
							'value' => 1,
						],
						[
							'label' => '否',
							'value' => 0,
						],
					],
				],
			],
			[
				'field' => 'is_diff',
				'label' => '是否不差升级',
				'component' => 'RadioButtonGroup',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
				'componentProps' => [
					'options' => [
						[
							'label' => '是',
							'value' => 1,
						],
						[
							'label' => '否',
							'value' => 0,
						],
					],
				],
			],
			[
				'field' => 'invite_reward',
				'label' => '邀请奖励',
				'component' => 'InputNumber',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'buy_ratio',
				'label' => '兑换比例',
				'component' => 'InputNumber',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'is_region',
				'label' => '是否允许申请区域代理',
				'component' => 'RadioButtonGroup',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
				'componentProps' => [
					'options' => [
						[
							'label' => '是',
							'value' => 1,
						],
						[
							'label' => '否',
							'value' => 0,
						],
					],
				],
			],
			[
				'field' => 'is_region_settle',
				'label' => '开启代理佣金',
				'component' => 'RadioButtonGroup',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
				'componentProps' => [
					'options' => [
						[
							'label' => '是',
							'value' => 1,
						],
						[
							'label' => '否',
							'value' => 0,
						],
					],
				],
			],
			[
				'field' => 'is_shop',
				'label' => '是否允许申请商家',
				'component' => 'RadioButtonGroup',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
				'componentProps' => [
					'options' => [
						[
							'label' => '是',
							'value' => 1,
						],
						[
							'label' => '否',
							'value' => 0,
						],
					],
				],
			],
			[
				'field' => 'is_shop_settle',
				'label' => ' 开启商家佣金',
				'component' => 'RadioButtonGroup',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
				'componentProps' => [
					'options' => [
						[
							'label' => '是',
							'value' => 1,
						],
						[
							'label' => '否',
							'value' => 0,
						],
					],
				],
			],
			[
				'field' => 'is_seller',
				'label' => '是否出券',
				'component' => 'RadioButtonGroup',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
				'componentProps' => [
					'options' => [
						[
							'label' => '是',
							'value' => 1,
						],
						[
							'label' => '否',
							'value' => 0,
						],
					],
				],
			],
			[
				'field' => 'is_hand',
				'label' => '是否立即结算',
				'component' => 'RadioButtonGroup',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
				'componentProps' => [
					'options' => [
						[
							'label' => '是',
							'value' => 1,
						],
						[
							'label' => '否',
							'value' => 0,
						],
					],
				],
			],
			[
				'field' => 'settle_ratio',
				'label' => '分佣比例',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'status',
				'label' => '状态',
				'component' => 'RadioButtonGroup',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
				'componentProps' => [
					'options' => [
						[
							'label' => '启用',
							'value' => 1,
						],
						[
							'label' => '禁用',
							'value' => 0,
						],
					],
				],
			],
			[
				'field' => 'remark',
				'label' => '备注',
				'component' => 'InputTextArea',
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];
}
