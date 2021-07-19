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

namespace little\pintuan\model;

use little\pintuan\repository\model\PintuanAbstract;

/**
 * 拼团活动 模型
 */
class Pintuan extends PintuanAbstract
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
				'dataIndex' => 'pintuan_id',
				'width' => 80,
				'fixed' => 'left',
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '店铺id',
				'dataIndex' => 'site_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '店铺名称',
				'dataIndex' => 'site_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '活动名称',
				'dataIndex' => 'pintuan_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品id',
				'dataIndex' => 'goods_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否是虚拟商品（0否 1是）',
				'dataIndex' => 'is_virtual_goods',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '参团人数',
				'dataIndex' => 'pintuan_num',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '拼团有效期',
				'dataIndex' => 'pintuan_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '备注',
				'dataIndex' => 'remark',
				'width' => 80,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => true,
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
				'title' => '修改时间',
				'dataIndex' => 'update_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否推荐',
				'dataIndex' => 'is_recommend',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '开始时间',
				'dataIndex' => 'start_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '结束时间',
				'dataIndex' => 'end_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '拼团限制购买',
				'dataIndex' => 'buy_num',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '显示拼团价',
				'dataIndex' => 'pintuan_price',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否单独购买',
				'dataIndex' => 'is_single_buy',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否虚拟成团',
				'dataIndex' => 'is_virtual_buy',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否团长优惠',
				'dataIndex' => 'is_promotion',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '状态（0正常 1活动进行中  2活动已结束  3失效  4删除）',
				'dataIndex' => 'status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '开团组数',
				'dataIndex' => 'group_num',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '购买人数',
				'dataIndex' => 'order_num',
				'width' => 100,
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
		'rowKey' => 'pintuan_id',
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
				'field' => 'pintuan_id',
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
				'field' => 'site_id',
				'label' => '店铺id',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'site_name',
				'label' => '店铺名称',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'pintuan_name',
				'label' => '活动名称',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'goods_id',
				'label' => '商品id',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'is_virtual_goods',
				'label' => '是否是虚拟商品（0否 1是）',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'pintuan_num',
				'label' => '参团人数',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'pintuan_time',
				'label' => '拼团有效期',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'remark',
				'label' => '备注',
				'component' => 'Input',
				'required' => false,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'create_time',
				'label' => '创建时间',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'update_time',
				'label' => '修改时间',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'is_recommend',
				'label' => '是否推荐',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'start_time',
				'label' => '开始时间',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'end_time',
				'label' => '结束时间',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'buy_num',
				'label' => '拼团限制购买',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'pintuan_price',
				'label' => '显示拼团价',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'is_single_buy',
				'label' => '是否单独购买',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'is_virtual_buy',
				'label' => '是否虚拟成团',
				'component' => 'Input',
				'required' => false,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'is_promotion',
				'label' => '是否团长优惠',
				'component' => 'Input',
				'required' => false,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'status',
				'label' => '状态（0正常 1活动进行中  2活动已结束  3失效  4删除）',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'group_num',
				'label' => '开团组数',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'order_num',
				'label' => '购买人数',
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
