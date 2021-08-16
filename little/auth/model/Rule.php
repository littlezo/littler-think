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

namespace little\auth\model;

use little\auth\repository\model\RuleAbstract;

/**
 * AuthRule 模型
 */
class Rule extends RuleAbstract
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
				'title' => '菜单名称',
				'dataIndex' => 'name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '父级id',
				'dataIndex' => 'pid',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '组件路径',
				'dataIndex' => 'component',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '路由名称',
				'dataIndex' => 'route_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '路由地址',
				'dataIndex' => 'path',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '排序(升)',
				'dataIndex' => 'sort',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否为外链: 0否 1是',
				'dataIndex' => 'is_frame',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '菜单类型: 0目录 1菜单 2按钮 3接口',
				'dataIndex' => 'menu_type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '菜单状态: 0隐藏 1显示',
				'dataIndex' => 'visible',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '状态: 0禁用 1正常',
				'dataIndex' => 'status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '权限标识',
				'dataIndex' => 'permission',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '菜单图标',
				'dataIndex' => 'icon',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '请求方式',
				'dataIndex' => 'action',
				'width' => 160,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => 'CreateTime',
				'dataIndex' => 'create_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => 'UpdateTime',
				'dataIndex' => 'update_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => 'DeleteTime',
				'dataIndex' => 'delete_time',
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
		'dropActions' => '[{"icon":"clarity:note-edit-line","label":"修改","auth":"auth:rule:update","onClick":"handleEdit.bind(null, record)"},{"label":"删除","icon":"ant-design:delete-outlined","color":"error","auth":"auth:rule:delete","popConfirm":{"title":"是否确认删除","confirm":"handleDelete.bind(null, record)"}}]',
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
			['field' => 'name', 'label' => '菜单名称', 'component' => 'Input', 'required' => true],
			['field' => 'pid', 'label' => '父级id', 'component' => 'Input', 'required' => false],
			['field' => 'component', 'label' => '组件路径', 'component' => 'Input', 'required' => false],
			['field' => 'route_name', 'label' => '路由名称', 'component' => 'Input', 'required' => false],
			['field' => 'path', 'label' => '路由地址', 'component' => 'Input', 'required' => false],
			['field' => 'sort', 'label' => '排序(升)', 'component' => 'Input', 'required' => false],
			['field' => 'is_frame', 'label' => '是否为外链: 0否 1是', 'component' => 'Input', 'required' => true],
			[
				'field' => 'menu_type',
				'label' => '菜单类型: 0目录 1菜单 2按钮 3接口',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'visible', 'label' => '菜单状态: 0隐藏 1显示', 'component' => 'Input', 'required' => true],
			['field' => 'status', 'label' => '状态: 0禁用 1正常', 'component' => 'Input', 'required' => true],
			['field' => 'permission', 'label' => '权限标识', 'component' => 'Input', 'required' => false],
			['field' => 'icon', 'label' => '菜单图标', 'component' => 'Input', 'required' => false],
			['field' => 'action', 'label' => '请求方式', 'component' => 'Input', 'required' => false],
			['field' => 'create_time', 'label' => 'CreateTime', 'component' => 'Input', 'required' => true],
			['field' => 'update_time', 'label' => 'UpdateTime', 'component' => 'Input', 'required' => true],
			['field' => 'delete_time', 'label' => 'DeleteTime', 'component' => 'Input', 'required' => false],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];
}
