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

namespace little\system\model;

use little\system\repository\model\ConfigAbstract;

/**
 * 系统配置 模型.
 */
class Config extends ConfigAbstract
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
				'title' => '配置项关键字',
				'dataIndex' => 'config_key',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '描述',
				'dataIndex' => 'config_desc',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否启用',
				'dataIndex' => 'is_use',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    return h(ant('Switch'), {
                        checked: record.is_use === 1,
                        checkedChildren: '正常',
                        unCheckedChildren: '禁用',
                        onChange(checked) {
                        const newStatus = checked ? 1 : 0;
                        const row_id = record.id;
                        api('put','/system/config/'+row_id, {is_use:newStatus})
                            .then(() => {
                                record.is_use = newStatus;
                            })
                        },
                    });
                }",
			],
			[
				'title' => '修改时间',
				'dataIndex' => 'update_time',
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
		'actions' =>"[
          {
            icon: 'clarity:note-edit-line',
            label: '修改',
            auth: 'member:user:update',
            onClick: handleEdit.bind(null, record),
          },
          {
            label: '删除',
            icon: 'ant-design:delete-outlined',
            color: 'error',
            auth: 'member:user:delete',
            popConfirm: {
                title: '是否确认删除',
                confirm: handleDelete.bind(null, record),
            },
          },
          {
            icon: 'clarity:note-edit-line',
            label: '字段管理',
            auth: 'member:user:update',
            onClick: handleRowPart.bind(null, record, {
                columns:[
                    {
                        title: '字段',
                        dataIndex: 'field',
                        editRow: true,
                    },
                    {
                        title: '描述',
                        dataIndex: 'label',
                        editRow: true,
                    },
                    {
                        title: '组件',
                        dataIndex: 'component',
                        editRow: true,
                    },
                    {
                        title: '组件参数',
                        dataIndex: 'props',
                        editRow: true,
                    },{
                        title: '自定义组件',
                        dataIndex: 'render',
                        editRow: true,
                        defaultValue:'{}',
						editComponent:'CodeEditor',
                    }
                ],
                field:'config_label',
                record,
                api:{
                    method:'put',
                    api:'/system/config',
                },
                title:'配置字段参数'
            }),
          },
        ]",
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'schemas' => [
			['field' => 'id', 'label' => 'ID', 'component' => 'Input', 'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6]],
		],
	];

	/**
	 * @var array 增加表单字段映射
	 */
	public $form_schema = [
		'labelWidth' => 120,
		'schemas' => [
			[
				'field' => 'config_key',
				'label' => '配置项关键字',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'config_desc',
				'label' => '描述',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'is_use',
				'label' => '是否启用',
				'component' => 'Switch',
				'required' => true,

				'componentProps' => [
					'checkedChildren' => '启用',
					'unCheckedChildren' => '禁用',
					'checkedValue' => 1,
					'unCheckedValue' => 0,
				],
			],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];
}
