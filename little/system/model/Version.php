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

use little\system\repository\model\VersionAbstract;

/**
 * 版本分发 模型.
 */
class Version extends VersionAbstract
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
				'title' => '标题',
				'dataIndex' => 'title',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '平台',
				'dataIndex' => 'platform',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '更新内容',
				'dataIndex' => 'content',
				'width' => 80,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '版本',
				'dataIndex' => 'version',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '版本号',
				'dataIndex' => 'version_code',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '版本类型 ',
				'dataIndex' => 'type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const value = record.type;
                    const enable = ~~value === 1;
                    const color = enable ? 'green' : 'red';
                    const text = enable ? '整包' : '补丁';
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '是否强制更新',
				'dataIndex' => 'is_force',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const value = record.is_force;
                    const enable = ~~value === 1;
                    const color = !enable ? 'green' : 'red';
                    const text = enable ? '是' : '否';
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '发布时间',
				'dataIndex' => 'create_time',
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
		'dropActions' =>"[
          {
            icon: 'clarity:note-edit-line',
            label: '修改',
            auth: 'system:version:update',
            onClick: handleEdit.bind(null, record),
          },
          {
            label: '删除',
            icon: 'ant-design:delete-outlined',
            color: 'error',
            auth: 'system:version:delete',
            popConfirm: {
                title: '是否确认删除',
                confirm: handleDelete.bind(null, record),
            },
          },
          {
              label: '查看详情',
              icon: 'ant-design:profile-outlined',
              auth: 'system:version:info',
              onClick: handleDetail.bind(null, record),
          }
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
				'field' => 'title',
				'label' => '标题',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'platform',
				'label' => '平台',
				'component' => 'RadioGroup',
				'required' => true,

				'defaultValue'=>'android',
				'componentProps' => [
					'options' => [
						[
							'label' => 'Android',
							'value' => 'android',
						],
						[
							'label' => 'iOS',
							'value' => 'ios',
						],
					],
				],
			],

			[
				'field' => 'version',
				'label' => '版本',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'version_code',
				'label' => '版本号',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'type',
				'label' => '版本类型 ',
				'component' => 'RadioGroup',
				'required' => true,

				'defaultValue'=>1,
				'componentProps' => [
					'options' => [
						[
							'label' => '整包',
							'value' => 1,
						],
						[
							'label' => '补丁',
							'value' => 2,
						],
					],
				],
			],
			// [
			// 	'field' => 'name',
			// 	'label' => '文件名',
			// 	'component' => 'Input',
			// 	'required' => true,
			//
			// ],
			// [showUploadList
			// 	'field' => 'url',
			// 	'label' => '下载地址',
			// 	'component' => 'Input',
			// 	'required' => true,
			//
			// ],showUploadList
			[
				'field' => 'path',
				'label' => '下载路径',
				'component' => 'Upload',
				'required' => true,

				'componentProps' => [
					'maxSize' => 256,
					'multiple' => false,
					'accept'=>['apk', 'ipa', 'wgt'],
					'maxNumber'=>1,
					'api' => '(argv)=>uploadApi(argv)',
					'check' => '(argv)=>checkUploadApi(argv)',
					'showUploadList'=>false,
					'value' => '(list) => {
			            console.log(list);
			        }',
				],
			],
			[
				'field' => 'is_force',
				'label' => '是否强制更新',
				'component' => 'Switch',
				'required' => true,

				'defaultValue'=>0,
				'componentProps' => [
					'checkedChildren' => '是',
					'unCheckedChildren' => '否',
					'checkedValue' => 1,
					'unCheckedValue' => 0,
				],
			],
			[
				'field' => 'content',
				'label' => '更新内容',
				'component' => 'InputTextArea',
				'required' => false,

			],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];
}
