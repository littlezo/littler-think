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

use little\member\repository\model\UserAbstract;
use littler\annotation\model\relation\HasOne;

/**
 * 会员列表 模型.
 * @HasOne("level",model="Level",foreignKey="level_id",localKey="level_id")
 * @HasOne("spl",model="Spl",foreignKey="id",localKey="spl_id")
 */
class User extends UserAbstract
{
	/**
	 * @var array 关联预载
	 */
	public $with = ['level', 'spl'];

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
				'title' => '推荐人',
				'dataIndex' => 'parent',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '用户名',
				'dataIndex' => 'username',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '用户昵称',
				'dataIndex' => 'nickname',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '服务商等级',
				'dataIndex' => 'spl_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '用户等级',
				'dataIndex' => 'level_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '手机号',
				'dataIndex' => 'mobile',
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
				'title' => '用户状态 1启用',
				'dataIndex' => 'status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '服务商状态',
				'dataIndex' => 'spl_status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '注册时间',
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
				'title' => '删除时间',
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
		'dropActions' => '[{"icon":"clarity:note-edit-line","label":"修改","auth":"member:user:update","onClick":"handleEdit.bind(null, record)"},{"label":"删除","icon":"ant-design:delete-outlined","color":"error","auth":"member:user:delete","popConfirm":{"title":"是否确认删除","confirm":"handleDelete.bind(null, record)"}}]',
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
			['field' => 'parent', 'label' => '推荐人', 'component' => 'Input', 'required' => true],
			['field' => 'username', 'label' => '用户名', 'component' => 'Input', 'required' => true],
			['field' => 'nickname', 'label' => '用户昵称', 'component' => 'Input', 'required' => true],
			['field' => 'spl_id', 'label' => '服务商等级', 'component' => 'Input', 'required' => true],
			['field' => 'level_id', 'label' => '用户等级', 'component' => 'Input', 'required' => true],
			['field' => 'mobile', 'label' => '手机号', 'component' => 'Input', 'required' => true],
			['field' => 'email', 'label' => '邮箱', 'component' => 'Input', 'required' => true],
			['field' => 'status', 'label' => '用户状态 1启用', 'component' => 'Input', 'required' => true],
			['field' => 'spl_status', 'label' => '服务商状态', 'component' => 'Input', 'required' => true],
			['field' => 'create_time', 'label' => '注册时间', 'component' => 'Input', 'required' => true],
			['field' => 'update_time', 'label' => '更新时间', 'component' => 'Input', 'required' => true],
			['field' => 'delete_time', 'label' => '删除时间', 'component' => 'Input', 'required' => true],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];

	protected $connection = 'source';
}
