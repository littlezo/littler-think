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

namespace little\payment\model;

use little\payment\repository\model\PayAbstract;

/**
 * 支付记录 模型
 */
class Pay extends PayAbstract
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
				'title' => '站点id',
				'dataIndex' => 'site_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '支付流水号',
				'dataIndex' => 'out_trade_no',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '支付方式',
				'dataIndex' => 'pay_type',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '交易单号',
				'dataIndex' => 'trade_no',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '支付账号',
				'dataIndex' => 'pay_no',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '支付主体',
				'dataIndex' => 'pay_body',
				'width' => 80,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => true,
			],
			[
				'title' => '支付详情',
				'dataIndex' => 'pay_detail',
				'width' => 80,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => true,
			],
			[
				'title' => '支付金额',
				'dataIndex' => 'pay_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '支付票据',
				'dataIndex' => 'pay_voucher',
				'width' => 80,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => true,
			],
			[
				'title' => '支付状态（0.待支付 1. 支付中 2. 已支付 -1已取消）',
				'dataIndex' => 'pay_status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '同步回调网址',
				'dataIndex' => 'return_url',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '支付成功后事件(事件，网址)',
				'dataIndex' => 'event',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商户信息',
				'dataIndex' => 'mch_info',
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
				'title' => '支付时间',
				'dataIndex' => 'pay_time',
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
				'field' => 'site_id',
				'label' => '站点id',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'out_trade_no',
				'label' => '支付流水号',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'pay_type',
				'label' => '支付方式',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'trade_no',
				'label' => '交易单号',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'pay_no',
				'label' => '支付账号',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'pay_body',
				'label' => '支付主体',
				'component' => 'Input',
				'required' => false,

			],
			[
				'field' => 'pay_detail',
				'label' => '支付详情',
				'component' => 'Input',
				'required' => false,

			],
			[
				'field' => 'pay_money',
				'label' => '支付金额',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'pay_voucher',
				'label' => '支付票据',
				'component' => 'Input',
				'required' => false,

			],
			[
				'field' => 'pay_status',
				'label' => '支付状态（0.待支付 1. 支付中 2. 已支付 -1已取消）',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'return_url',
				'label' => '同步回调网址',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'event',
				'label' => '支付成功后事件(事件，网址)',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'mch_info',
				'label' => '商户信息',
				'component' => 'Input',
				'required' => false,

			],
			[
				'field' => 'create_time',
				'label' => '创建时间',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'pay_time',
				'label' => '支付时间',
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
