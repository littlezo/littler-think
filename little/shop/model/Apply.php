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

namespace little\shop\model;

use little\shop\repository\model\ApplyAbstract;
use littler\annotation\model\relation\HasOne;

/**
 * 商家申请 模型.
 * @HasOne("cert", model="Cert", foreignKey="site_id", localKey="site_id")
 * @HasOne("category", model="Category", foreignKey="category_id", localKey="category_id")
 * @HasOne("member", model="little\member\model\User", foreignKey="id", localKey="member_id")
 */
class Apply extends ApplyAbstract
{
	/**
	 * @var array 关联预载
	 */
	public $with = ['cert', 'member', 'category'];

	/**
	 * @var array 列表字段映射
	 */
	public $table_schema = [
		'columns' => [
			[
				'title' => 'ID',
				'dataIndex' => 'apply_id',
				'width' => 80,
				'fixed' => 'left',
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '申请编号',
				'dataIndex' => 'apply_no',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '申请会员',
				'dataIndex' => 'member_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => '({record }) => {
			        return record?.member?.nickname;
			    }',
			],
			[
				'title' => '申请店铺名称',
				'dataIndex' => 'shop_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '申请状态',
				'dataIndex' => 'apply_status',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				// 'customRender' => "({ record }) => {
				//     const textMap = {-1:'财务审核拒绝',0:'待审核',1:'开店通过'};
				//     const colorMap = {-2:'red',-1:'red',1:'blue',2:'blue',3:'green'};
				//     const value = record.apply_status;
				//     const color = colorMap[value];
				//     const text = textMap[value];
				//     return h(ant('Tag'), { color: color }, () => text);
				// }",
			],
			[
				'title' => '管理员审核信息',
				'dataIndex' => 'apply_remark',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '店铺分类',
				'dataIndex' => 'category_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => '({ record }) => {
			        return record?.category?.category_name;
			    }',
			],
			// [
			// 	'title' => '付款凭证',
			// 	'dataIndex' => 'pay_certificate',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '付款凭证说明',
			// 	'dataIndex' => 'pay_certificate_remark',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			[
				'title' => '保证金',
				'dataIndex' => 'security_deposit',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '付款金额',
				'dataIndex' => 'pay_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],

			// [
			// 	'title' => '申请类型1.个人2.公司',
			// 	'dataIndex' => 'cert_type',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '公司名称',
			// 	'dataIndex' => 'company_name',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '公司所在省',
			// 	'dataIndex' => 'company_province_id',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '公司所在市',
			// 	'dataIndex' => 'company_city_id',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '公司所在区/县',
			// 	'dataIndex' => 'company_district_id',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '公司地址',
			// 	'dataIndex' => 'company_address',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '公司完整地址',
			// 	'dataIndex' => 'company_full_address',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '联系人姓名',
			// 	'dataIndex' => 'contacts_name',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '联系人手机',
			// 	'dataIndex' => 'contacts_mobile',
			// 	'width' => 160,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '联系人身份证',
			// 	'dataIndex' => 'contacts_card_no',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '申请人手持身份证电子版',
			// 	'dataIndex' => 'contacts_card_hand',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '申请人身份证正面',
			// 	'dataIndex' => 'contacts_card_positive',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '申请人身份证反面',
			// 	'dataIndex' => 'contacts_card_back',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '统一社会信用码',
			// 	'dataIndex' => 'business_licence_number',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '营业执照电子版',
			// 	'dataIndex' => 'business_licence_number_electronic',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '法定经营范围',
			// 	'dataIndex' => 'business_sphere',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '银行开户名',
			// 	'dataIndex' => 'bank_account_name',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '公司银行账号',
			// 	'dataIndex' => 'bank_account_number',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '开户银行支行名称',
			// 	'dataIndex' => 'bank_name',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '开户银行所在地',
			// 	'dataIndex' => 'bank_address',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '结算账户类型  1微信 2 支付宝 3银行卡 ',
			// 	'dataIndex' => 'bank_type',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '结算银行开户名',
			// 	'dataIndex' => 'settlement_bank_account_name',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '结算公司银行账号',
			// 	'dataIndex' => 'settlement_bank_account_number',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '结算开户银行支行名称',
			// 	'dataIndex' => 'settlement_bank_name',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '结算开户银行所在地',
			// 	'dataIndex' => 'settlement_bank_address',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],

			[
				'title' => '创建时间',
				'dataIndex' => 'create_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '审核通过时间',
				'dataIndex' => 'audit_time',
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
		'rowKey' => 'apply_id',
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
				'field' => 'apply_id',
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
				'field' => 'apply_no',
				'label' => '申请编号',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'site_id',
				'label' => '店铺',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'member_id',
				'label' => '申请会员',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'cert_id',
				'label' => '认证信息',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'username',
				'label' => '账号',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'shop_name',
				'label' => '申请店铺名称',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'apply_status',
				'label' => '申请状态 1. 待审核 2. 财务凭据审核中  3. 开店通过 -1.审核失败 -2 财务审核拒绝',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'apply_remark',
				'label' => '管理员审核信息',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'category_id',
				'label' => '店铺分类',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'pay_certificate',
				'label' => '付款凭证',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'pay_certificate_remark',
				'label' => '付款凭证说明',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'security_deposit',
				'label' => '保证金',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'pay_money',
				'label' => '付款金额',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'create_time',
				'label' => '创建时间',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'audit_time',
				'label' => '审核通过时间',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'finish_time',
				'label' => '创建成功时间',
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
