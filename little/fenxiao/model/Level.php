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

namespace little\fenxiao\model;

use little\fenxiao\repository\model\LevelAbstract;

/**
 * 分销等级 模型
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
				'title' => '等级权重',
				'dataIndex' => 'level_num',
				'width' => 160,
				'fixed' => false,
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
				'title' => '一级佣金比例',
				'dataIndex' => 'one_rate',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '二级佣金比例',
				'dataIndex' => 'two_rate',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '三级佣金比例',
				'dataIndex' => 'three_rate',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '升级方式（0满足任意条件  1满足全部条件）',
				'dataIndex' => 'upgrade_type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '订单总数',
				'dataIndex' => 'fenxiao_order_num',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '订单总金额',
				'dataIndex' => 'fenxiao_order_meney',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '一级分销订单总数',
				'dataIndex' => 'one_fenxiao_order_num',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '一级分销订单总额',
				'dataIndex' => 'one_fenxiao_order_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '自购订单总数',
				'dataIndex' => 'order_num',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '自购订单总额',
				'dataIndex' => 'order_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '下线人数',
				'dataIndex' => 'child_num',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '下线分销商人数',
				'dataIndex' => 'child_fenxiao_num',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '一级下线人数',
				'dataIndex' => 'one_child_num',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '一级下线分销商',
				'dataIndex' => 'one_child_fenxiao_num',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '状态（0关闭 1启用）',
				'dataIndex' => 'status',
				'width' => 100,
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
		],
		'formConfig' => [],
		'pagination' => true,
		'striped' => true,
		'useSearchForm' => true,
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
		'labelWidth' => 120,
		'schemas' => [
			[
				'field' => 'level_num',
				'label' => '等级权重',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'level_name',
				'label' => '等级名称',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'one_rate',
				'label' => '一级佣金比例',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'two_rate',
				'label' => '二级佣金比例',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'three_rate',
				'label' => '三级佣金比例',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'upgrade_type',
				'label' => '升级方式（0满足任意条件  1满足全部条件）',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'fenxiao_order_num',
				'label' => '订单总数',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'fenxiao_order_meney',
				'label' => '订单总金额',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'one_fenxiao_order_num',
				'label' => '一级分销订单总数',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'one_fenxiao_order_money',
				'label' => '一级分销订单总额',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'order_num',
				'label' => '自购订单总数',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'order_money',
				'label' => '自购订单总额',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'child_num',
				'label' => '下线人数',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'child_fenxiao_num',
				'label' => '下线分销商人数',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'one_child_num',
				'label' => '一级下线人数',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'one_child_fenxiao_num',
				'label' => '一级下线分销商',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'status',
				'label' => '状态（0关闭 1启用）',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'create_time',
				'label' => 'CreateTime',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'update_time',
				'label' => 'UpdateTime',
				'component' => 'Input',
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
