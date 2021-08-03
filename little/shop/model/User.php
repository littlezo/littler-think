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

use little\shop\repository\model\UserAbstract;
use littler\annotation\model\relation\HasOne;

/**
 * 商家店铺 模型.
 * @HasOne("cert", model="Cert", foreignKey="site_id", localKey="site_id")
 * @HasOne("category", model="Category", foreignKey="category_id", localKey="category_id")
 * @HasOne("member", model="little\member\model\User", foreignKey="id", localKey="member_id")
 */
class User extends UserAbstract
{
	/**
	 * @var array 关联预载
	 */
	public $with = ['cert', 'category', 'member'];

	/**
	 * @var array 列表字段映射
	 */
	public $table_schema = [
		'columns' => [
			[
				'title' => 'ID',
				'dataIndex' => 'site_id',
				'width' => 80,
				'fixed' => 'left',
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
				'title' => '用户名',
				'dataIndex' => 'username',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '联系电话',
				'dataIndex' => 'phone',
				'width' => 160,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			// [
			// 	'title' => '认证信息',
			// 	'dataIndex' => 'cert_id',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			[
				'title' => '店铺类别',
				'dataIndex' => 'category.category_name',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '创建会员',
				'dataIndex' => 'member_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => '({ record }) => {
                    const text = record?.member?.nickname;
                    return  text;
                }',
			],
			[
				'title' => '店铺经营状态',
				'dataIndex' => 'shop_status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'关闭',1:'正常',2:'审核中'};
                    const colorMap = {0:'red',1:'blue',2:'green'};
                    const value = record.shop_status;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '店铺关闭原因',
				'dataIndex' => 'close_info',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '保证金',
				'dataIndex' => 'security_deposit',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '保证金状态',
				'dataIndex' => 'deposit_status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'等待支付',1:'已支付',2:'已退还'};
                    const colorMap = {0:'blue',1:'green',2:'red'};
                    const value = record.deposit_status;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '排序号',
				'dataIndex' => 'sort',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '店铺logo',
				'dataIndex' => 'logo',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ text }) => {
			        return h(ant('Avatar'), {size:60 ,src: getImg(text) });
			    }",
			],
			[
				'title' => '店铺条幅',
				'dataIndex' => 'banner',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => '({ text}) => {
			        return h(Image, {size:60 ,imgList: text, srcPrefix: srcPrefix });
			    }',
			],
			// [
			// 	'title' => '店铺关键字',
			// 	'dataIndex' => 'keywords',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			[
				'title' => '店铺简介',
				'dataIndex' => 'description',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '联系人姓名',
				'dataIndex' => 'name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '联系手机号',
				'dataIndex' => 'mobile',
				'width' => 160,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '业务联系人姓名',
				'dataIndex' => 'profession_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '业务联系人电话',
				'dataIndex' => 'profession_mobile',
				'width' => 160,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商务联系人姓名',
				'dataIndex' => 'business_affairs_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商务联系人电话',
				'dataIndex' => 'business_affairs_mobile',
				'width' => 160,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			// [
			// 	'title' => '是否推荐',
			// 	'dataIndex' => 'is_recommend',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			[
				'title' => '账户实际余额',
				'dataIndex' => 'balance_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '已提现金额',
				'dataIndex' => 'balance_withdraw',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '申请提现中金额',
				'dataIndex' => 'balance_withdraw_apply',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			// [
			// 	'title' => '省id',
			// 	'dataIndex' => 'province',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			[
				'title' => '省',
				'dataIndex' => 'province_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			// [
			// 	'title' => '城市id',
			// 	'dataIndex' => 'city',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			[
				'title' => '市',
				'dataIndex' => 'city_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			// [
			// 	'title' => '区县id',
			// 	'dataIndex' => 'district',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			[
				'title' => '区县',
				'dataIndex' => 'district_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			// [
			// 	'title' => '乡镇地址id',
			// 	'dataIndex' => 'community',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '乡镇地址名称',
			// 	'dataIndex' => 'community_name',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			[
				'title' => '详细地址',
				'dataIndex' => 'address',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			// [
			// 	'title' => '完整地址',
			// 	'dataIndex' => 'full_address',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			[
				'title' => '经度',
				'dataIndex' => 'longitude',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '纬度',
				'dataIndex' => 'latitude',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '开店时间',
				'dataIndex' => 'create_time',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '店铺类型',
				'dataIndex' => 'shop_type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'未知',1:'线上',2:'线下'};
                    const colorMap = {0:'red',1:'blue',2:'green'};
                    const value = record.shop_type;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '是否支持一件代发',
				'dataIndex' => 'is_one_delivery',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'否',1:'是',2:''};
                    const colorMap = {0:'red',1:'blue',2:'green'};
                    const value = record.is_one_delivery;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '是否支持售后',
				'dataIndex' => 'is_after_sales',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'否',1:'是',2:''};
                    const colorMap = {0:'red',1:'blue',2:'green'};
                    const value = record.is_after_sales;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '审核时间',
				'dataIndex' => 'audit_time',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '审核备注',
				'dataIndex' => 'apply_remark',
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
		'rowKey' => 'site_id',
		'searchInfo' => ['order' => 'asc'],
		'actionColumn' => [
			'width' => 100,
			'title' => '操作',
			'dataIndex' => 'action',
			'slots' => ['customRender' => 'action'],
			'fixed' => 'right',
		],
		'actions' => "[
			{
                icon: 'clarity:note-edit-line',
				label : '修改',
				auth : 'shop:user:update',
				onClick : handleEdit.bind(null, record)
            }
		]",
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'baseColProps' => ['xxl' => 6, 'xl' => 8, 'lg' => 12, 'md' => 34],
		'schemas' => [
			[
				'field' => 'site_id',
				'label' => 'ID',
				'component' => 'Input',
			],
			[
				'field' => 'shop_status',
				'label' => '商家状态',
				'component' => 'Select',
				'componentProps' => [
					'options' => [
						[
							'label' => '关闭',
							'value' => -1,
							'key' => -1,
						],
						[
							'label' => '正常',
							'value' => 1,
							'key' => 1,
						],
						[
							'label' => '等待审核',
							'value' => 2,
							'key' => 2,
						],
					],
				],
			],
		],
	];

	/**
	 * @var array 增加表单字段映射
	 */
	public $form_schema = [
		'labelWidth' => 120,
		'baseColProps' => ['xxl' => 6, 'xl' => 8, 'lg' => 12, 'md' => 34],
		'schemas' => [
			[
				'field' => 'site_name',
				'label' => '店铺名称',
				'component' => 'Input',
				'disabled' => true,
			],
			['field' => 'cert.contacts_name', 'label' => '法人代表', 'component' => 'Input', 'disabled' => true],
			['field' => 'phone', 'label' => '联系电话', 'component' => 'Input', 'disabled' => true],
			// ['field' => 'cert_id', 'label' => '认证信息', 'component' => 'Input', 'required' => true],
			['field' => 'category.category_name', 'label' => '店铺类别', 'component' => 'Input', 'required' => true],
			['field' => 'member_id', 'label' => '创建会员id', 'component' => 'Input', 'required' => true],
			[
				'field' => 'shop_status',
				'label' => '店铺经营状态（0.关闭，1正常 2. 审核中）',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'security_deposit', 'label' => '保证金', 'component' => 'Input', 'required' => true],
			[
				'field' => 'deposit_status',
				'label' => '保证金状态 0等待支付 1已支付 2已退还',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'sort', 'label' => '排序号', 'component' => 'Input', 'required' => true],
			['field' => 'logo', 'label' => '店铺logo', 'component' => 'Input', 'required' => true],
			['field' => 'banner', 'label' => '店铺条幅', 'component' => 'Input', 'required' => false],
			['field' => 'name', 'label' => '联系人姓名', 'component' => 'Input', 'required' => true],
			['field' => 'mobile', 'label' => '联系手机号', 'component' => 'Input', 'required' => true],
			['field' => 'profession_name', 'label' => '业务联系人姓名', 'component' => 'Input', 'required' => true],
			[
				'field' => 'profession_mobile',
				'label' => '业务联系人电话',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'business_affairs_name',
				'label' => '商务联系人姓名',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'business_affairs_mobile',
				'label' => '商务联系人电话',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'full_address', 'label' => '地址地址', 'component' => 'Input', 'required' => true],
			['field' => 'create_time', 'label' => '开店时间', 'component' => 'Input', 'required' => true],
			[
				'field' => 'shop_type',
				'label' => '店铺类型 1 线上 2 线下',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'is_one_delivery',
				'label' => '是否支持一件代发',
				'component' => 'Input',
				'disabled' => true,
			],
			['field' => 'is_after_sales', 'label' => '是否支持售后', 'component' => 'Input', 'disabled' => true],
			['field' => 'apply_status', 'label' => '审核状态', 'component' => 'Input', 'required' => true],
			['field' => 'apply_remark', 'label' => '审核备注', 'component' => 'Input', 'required' => true],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];
}
