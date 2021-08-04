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

namespace little\goods\model;

use little\goods\repository\model\CategoryAbstract;

/**
 * 商品分类 模型.
 */
class Category extends CategoryAbstract
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
				'dataIndex' => 'category_id',
				'width' => 80,
				'fixed' => 'left',
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '分类名称',
				'dataIndex' => 'category_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '简称',
				'dataIndex' => 'short_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '分类上级',
				'dataIndex' => 'parent',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否显示 0是 1否',
				'dataIndex' => 'is_show',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
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
				'title' => '分类图片',
				'dataIndex' => 'image',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '分类页面关键字',
				'dataIndex' => 'keywords',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '分类介绍',
				'dataIndex' => 'description',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '分类广告图',
				'dataIndex' => 'image_adv',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '服务费',
				'dataIndex' => 'service_rate',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '跳转路径',
				'dataIndex' => 'path',
				'width' => 180,
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
		'rowKey' => 'category_id',
		'searchInfo' => ['order' => 'asc'],
		'actionColumn' => [
			'width' => 100,
			'title' => '操作',
			'dataIndex' => 'action',
			'slots' => ['customRender' => 'action'],
			'fixed' => 'right',
		],
		'dropActions' => '[{
            "icon":"clarity:note-edit-line",
            "label":"修改",
            "auth":"goods:category:update",
            "onClick":handleEdit.bind(null, record)
        },{
            "label":"删除","icon":"ant-design:delete-outlined",
            "color":"error",
            "auth":"goods:category:delete",
            "popConfirm":{
                "title":"是否确认删除",
                "confirm":handleDelete.bind(null, record)
            }
        }]',
		'actions' => '[]',
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'baseColProps' => ['xxl' => 6, 'xl' => 8, 'lg' => 12, 'md' => 34],
		'schemas' => [['field' => 'category_id', 'label' => 'ID', 'component' => 'Input']],
	];

	/**
	 * @var array 增加表单字段映射
	 */
	public $form_schema = [
		'labelWidth' => 120,
		'baseColProps' => ['xxl' => 6, 'xl' => 8, 'lg' => 12, 'md' => 34],
		'schemas' => [
			[
				'field' => 'category_name',
				'label' => '分类名称',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'short_name',
				'label' => '简称',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'parent',
				'label' => '分类上级',
				'component' => 'ApiTreeSelect',
				// 'required' => true,
				'componentProps' => '() => {
                    return {
                        params:{order:"asc"},
                        replaceFields: {
                            title: "category_name",
                            key: "category_id",
                            value: "category_id",
                        },
                        api: (argv) => api("get", "/goods/category/list", {...argv}),
                        getPopupContainer: () => document.body,
                    };
                }',
			],
			[
				'field' => 'is_show',
				'label' => '是否显示',
				'component' => 'RadioButtonGroup',
				'required' => true,
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
				'field' => 'sort',
				'label' => '排序',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'image',
				'label' => '分类图片',
				'component' => 'Input',
				'required' => true,
				'render' =>    '({ model, field }) => {
                    return h(LzCropperAvatar,{
                    uploadApi: (argv)=>uploadApi(argv),
                    value: getImg(model[field]),
                    onChange: (e) => {
                        model[field] = e.id;
                    },
                })}',
			],
			[
				'field' => 'keywords',
				'label' => '分类页面关键字',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'description',
				'label' => '分类介绍',
				'component' => 'InputTextArea',
				'required' => true,
			],
			[
				'field' => 'image_adv',
				'label' => '分类广告图',
				'component' => 'Upload',
				'required' => true,
				'componentProps' => [
					'maxSize' => 5,
					'multiple' => false,
					'accept'=>['jpg', 'jpeg', 'png'],
					'maxNumber'=>9,
					'api' => '(argv)=>uploadApi(argv)',
					'check' => '(argv)=>checkUploadApi(argv)',
					'showUploadList'=>false,
					'value' => '(list) => {
			            console.log(list);
			        }',
				],
			],
			[
				'field' => 'service_rate',
				'label' => '服务费',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'path',
				'label' => '跳转路径',
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
