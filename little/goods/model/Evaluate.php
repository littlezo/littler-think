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

namespace little\goods\model;

use little\goods\repository\model\EvaluateAbstract;

/**
 * 商品评价 模型
 */
class Evaluate extends EvaluateAbstract
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
				'dataIndex' => 'evaluate_id',
				'width' => 80,
				'fixed' => 'left',
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '站点id',
				'dataIndex' => 'site_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '订单ID',
				'dataIndex' => 'order_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '订单编号',
				'dataIndex' => 'order_no',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '订单商品ID',
				'dataIndex' => 'order_goods_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品ID',
				'dataIndex' => 'goods_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品skuid',
				'dataIndex' => 'sku_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '评价内容',
				'dataIndex' => 'content',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '评价图片',
				'dataIndex' => 'images',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '评价人id',
				'dataIndex' => 'member_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '评价人名称',
				'dataIndex' => 'member_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '0表示不是 1表示是匿名评价',
				'dataIndex' => 'is_anonymous',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '1-5分',
				'dataIndex' => 'scores',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '追加评价内容',
				'dataIndex' => 'again_content',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '追评评价图片',
				'dataIndex' => 'again_images',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '1好评2中评3差评',
				'dataIndex' => 'explain_type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '1显示 0隐藏',
				'dataIndex' => 'is_show',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '评价时间',
				'dataIndex' => 'create_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '追加评价时间',
				'dataIndex' => 'again_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '描述分值',
				'dataIndex' => 'shop_desccredit',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '服务分值',
				'dataIndex' => 'shop_servicecredit',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '配送分值',
				'dataIndex' => 'shop_deliverycredit',
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
		'rowKey' => 'evaluate_id',
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
				'field' => 'evaluate_id',
				'label' => 'ID',
				'component' => 'Input',

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
				'label' => '站点id',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'order_id',
				'label' => '订单ID',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'order_no',
				'label' => '订单编号',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'order_goods_id',
				'label' => '订单商品ID',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'goods_id',
				'label' => '商品ID',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'sku_id',
				'label' => '商品skuid',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'content',
				'label' => '评价内容',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'images',
				'label' => '评价图片',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'member_id',
				'label' => '评价人id',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'member_name',
				'label' => '评价人名称',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'is_anonymous',
				'label' => '0表示不是 1表示是匿名评价',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'scores',
				'label' => '1-5分',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'again_content',
				'label' => '追加评价内容',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'again_images',
				'label' => '追评评价图片',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'explain_type',
				'label' => '1好评2中评3差评',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'is_show',
				'label' => '1显示 0隐藏',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'create_time',
				'label' => '评价时间',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'again_time',
				'label' => '追加评价时间',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'shop_desccredit',
				'label' => '描述分值',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'shop_servicecredit',
				'label' => '服务分值',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'shop_deliverycredit',
				'label' => '配送分值',
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
