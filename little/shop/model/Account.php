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

namespace little\shop\model;

use little\shop\repository\model\AccountAbstract;

/**
 * 用户 模型
 */
class Account extends AccountAbstract
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
				'title' => '用户名',
				'dataIndex' => 'username',
				'width' => 160,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '密码',
				'dataIndex' => 'password',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '邮箱',
				'dataIndex' => 'email',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '头像',
				'dataIndex' => 'avatar',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '真实姓名',
				'dataIndex' => 'real_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '手机号',
				'dataIndex' => 'mobile',
				'width' => 160,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '角色ID',
				'dataIndex' => 'roles_ids',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '备注',
				'dataIndex' => 'remark',
				'width' => 160,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '用户状态 1 正常 2 禁用',
				'dataIndex' => 'status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '最后登陆IP',
				'dataIndex' => 'last_login_ip',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '最后登陆时间',
				'dataIndex' => 'last_login_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '创建时间',
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
			[
				'title' => '删除状态，0未删除 >0 已删除',
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
		'dropActions' => [
			[
				'icon' => 'clarity:note-edit-line',
				'label' => '修改',
				'auth' => 'shop:account:update',
				'onClick' => 'handleEdit.bind(null, record)',
			],
			[
				'label' => '删除',
				'icon' => 'ant-design:delete-outlined',
				'color' => 'error',
				'auth' => 'shop:account:delete',
				'popConfirm' => ['title' => '是否确认删除', 'confirm' => 'handleDelete.bind(null, record)'],
			],
		],
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
			['field' => 'username', 'label' => '用户名', 'component' => 'Input', 'required' => true],
			['field' => 'password', 'label' => '密码', 'component' => 'Input', 'required' => true],
			['field' => 'email', 'label' => '邮箱', 'component' => 'Input', 'required' => true],
			['field' => 'avatar', 'label' => '头像', 'component' => 'Input', 'required' => true],
			['field' => 'real_name', 'label' => '真实姓名', 'component' => 'Input', 'required' => true],
			['field' => 'mobile', 'label' => '手机号', 'component' => 'Input', 'required' => true],
			['field' => 'roles_ids', 'label' => '角色ID', 'component' => 'Input', 'required' => true],
			['field' => 'remark', 'label' => '备注', 'component' => 'Input', 'required' => true],
			['field' => 'status', 'label' => '用户状态 1 正常 2 禁用', 'component' => 'Input', 'required' => true],
			['field' => 'last_login_ip', 'label' => '最后登陆IP', 'component' => 'Input', 'required' => true],
			['field' => 'last_login_time', 'label' => '最后登陆时间', 'component' => 'Input', 'required' => true],
			['field' => 'create_time', 'label' => '创建时间', 'component' => 'Input', 'required' => true],
			['field' => 'update_time', 'label' => '更新时间', 'component' => 'Input', 'required' => true],
			[
				'field' => 'delete_time',
				'label' => '删除状态，0未删除 >0 已删除',
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
