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

use little\member\repository\model\RechargesAbstract;

/**
 * 会员套餐 模型.
 */
class Recharges extends RechargesAbstract
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
				'title' => '套餐名称',
				'dataIndex' => 'name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			// [
			// 	'title' => '封面',
			// 	'dataIndex' => 'cover_img',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// 	// 'customRender' => "({ record }) => {
			// 	//     return h(ant('Avatar'), {size:60 ,src: getImg(record.cover_img) });
			// 	// }",
			// ],
			[
				'title' => '面值',
				'dataIndex' => 'face_value',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '购买金额',
				'dataIndex' => 'buy_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '贡献值',
				'dataIndex' => 'growth',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '描述',
				'dataIndex' => 'desc',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否新用户',
				'dataIndex' => 'is_new',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'否',1:'是',2:''};
                    const colorMap = {0:'red',1:'blue',2:'green'};
                    const value = record.is_new;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '是否首页',
				'dataIndex' => 'is_home',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'否',1:'是',2:''};
                    const colorMap = {0:'red',1:'blue',2:'green'};
                    const value = record.is_home;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '排序',
				'dataIndex' => 'sort',
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
		'rowKey' => 'id',
		'searchInfo' => ['order' => 'asc'],
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
                label: '修改',
                auth: 'member:recharges:update',
                onClick: handleEdit.bind(null, record),
            },
            {
                label: '删除',
                icon: 'ant-design:delete-outlined',
                color: 'error',
                auth: 'member:recharges:delete',
                popConfirm: {
                    title: '是否确认删除',
                    confirm: handleDelete.bind(null, record),
                },
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
				'field' => 'name',
				'label' => '套餐名称',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			// [
			// 	'field' => 'cover_img',
			// 	'label' => '封面',
			// 	'component' => 'Upload',
			// 	'required' => true,
			// 	'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			// 	'rules' => [
			// 		['required' => true, 'message' => '请选择上传文件'],
			// 	],
			// 	'componentProps' => [
			// 		'maxSize' => 10,
			// 		'multiple' => false,
			// 		'accept'=>['jpg', 'jpeg', 'png'],
			// 		'maxNumber'=>1,
			// 		'api' => '(argv)=>uploadApi(argv)',
			// 		'check' => '(argv)=>checkUploadApi(argv)',
			// 		'handleChange' => '(list) => {
			//             console.log(list);
			//         }',
			// 	],
			// ],
			[
				'field' => 'face_value',
				'label' => '面值',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'buy_money',
				'label' => '购买金额',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'growth',
				'label' => '贡献值',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],

			[
				'field' => 'sort',
				'label' => '排序',
				'component' => 'InputNumber',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'is_new',
				'label' => '是否新用户专享',
				'component' => 'RadioButtonGroup',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
				'defaultValue'=>1,
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
				'field' => 'is_home',
				'label' => '是否首页推荐',
				'component' => 'RadioButtonGroup',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
				'defaultValue'=>1,
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
			// [
			// 	'field' => 'type',
			// 	'label' => '套餐类型 ',
			// 	'component' => 'RadioGroup',
			// 	'required' => true,
			// 	'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			// 	'defaultValue' => 1,
			// 	'componentProps' => [
			// 		'options' => [
			// 			[
			// 				'label' => '现金劵',
			// 				'value' => 1,
			// 			],
			// 			[
			// 				'label' => '抵扣卷',
			// 				'value' => 2,
			// 			],
			// 		],
			// 	],
			// ],
			[
				'field' => 'status',
				'label' => '状态',
				'component' => 'Switch',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
				'componentProps' => [
					'checkedChildren' => '正常',
					'unCheckedChildren' => '禁用',
					'checkedValue' => 1,
					'unCheckedValue' => 0,
				],
			],
			[
				'field' => 'desc',
				'label' => '描述',
				'component' => 'InputTextArea',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];
}
