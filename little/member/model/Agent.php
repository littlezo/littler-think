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

use little\member\repository\model\AgentAbstract;

/**
 * MemberAgent 模型.
 */
class Agent extends AgentAbstract
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
				'dataIndex' => 'agent_id',
				'width' => 80,
				'fixed' => 'left',
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '代理类型',
				'dataIndex' => 'agent_type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '代理费',
				'dataIndex' => 'agent_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '代理分润',
				'dataIndex' => 'agent_ratio',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '推荐分佣',
				'dataIndex' => 'invite_ratio',
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
		'rowKey' => 'agent_id',
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
            auth: 'member:agent:update',
            onClick: handleEdit.bind(null, record),
          },
          {
            label: '删除',
            icon: 'ant-design:delete-outlined',
            color: 'error',
            auth: 'member:agent:delete',
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
		],
	];

	/**
	 * @var array 增加表单字段映射
	 */
	public $form_schema = [
		'labelWidth' => 120,
		'schemas' => [
			[
				'field' => 'agent_type',
				'label' => '代理类型',
				'component' => 'RadioButtonGroup',
				'required' => true,

				'defaultValue'=>1,
				'componentProps' => [
					'options' => [
						[
							'label' => '省代',
							'value' => 1,
						],
						[
							'label' => '市代',
							'value' => 2,
						],
						[
							'label' => '区县代',
							'value' => 3,
						],
					],
				],
			],
			[
				'field' => 'agent_money',
				'label' => '代理费',
				'component' => 'InputNumber',
				'required' => true,

			],
			[
				'field' => 'agent_ratio',
				'label' => '代理分润',
				'component' => 'InputNumber',
				'required' => true,

			],
			[
				'field' => 'invite_ratio',
				'label' => '推荐分佣',
				'component' => 'InputNumber',
				'required' => true,

			],
			[
				'field' => 'status',
				'label' => '状态',
				'component' => 'RadioButtonGroup',
				'required' => true,

				'defaultValue'=>1,
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
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];
}
