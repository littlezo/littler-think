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
 * @HasOne("category", model="Category", foreignKey="category_id", localKey="category_id")
 * @HasOne("member", model="little\member\model\User", foreignKey="id", localKey="member_id")
 */
class User extends UserAbstract
{
	/**
	 * @var array 关联预载
	 */
	public $with = ['category', 'member'];

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
				'title' => '联系电话',
				'dataIndex' => 'phone',
				'width' => 160,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '店铺类别',
				'dataIndex' => 'category_id.category_name',
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
			// [
			// 	'title' => '申请类型1.个人2.公司',
			// 	'dataIndex' => 'cert_type',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			[
				'title' => '联系人身份证',
				'dataIndex' => 'card_no',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '申请人手持身份证电子版',
				'dataIndex' => 'card_hand',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '申请人身份证正面',
				'dataIndex' => 'card_positive',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '申请人身份证反面',
				'dataIndex' => 'card_back',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '统一社会信用码',
				'dataIndex' => 'business_licence_number',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '营业执照电子版',
				'dataIndex' => 'business_licence_number_electronic',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '法定经营范围',
				'dataIndex' => 'business_sphere',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '银行开户名',
				'dataIndex' => 'bank_account_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '公司银行账号',
				'dataIndex' => 'bank_account_number',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '开户银行支行名称',
				'dataIndex' => 'bank_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '开户银行所在地',
				'dataIndex' => 'bank_address',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '结算账户类型  1微信 2 支付宝 3银行卡 ',
				'dataIndex' => 'bank_type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '结算银行开户名',
				'dataIndex' => 'settlement_bank_account_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '结算公司银行账号',
				'dataIndex' => 'settlement_bank_account_number',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '结算开户银行支行名称',
				'dataIndex' => 'settlement_bank_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '结算开户银行所在地',
				'dataIndex' => 'settlement_bank_address',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
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
				'title' => '法人代表',
				'dataIndex' => 'name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '联系电话',
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
				'width' => 150,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '审核状态',
				'dataIndex' => 'audit_status',
				'width' => 150,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'拒绝',1:'通过',2:'等待审核'};
                    const colorMap = {0:'red',1:'blue',2:'green'};
                    const value = record.shop_status;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '审核备注',
				'dataIndex' => 'audit_remark',
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
				label : '审核',
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
		'labelWidth' => 180,
		'baseColProps' => ['xl' => 8, 'lg' => 12, 'md' => 34],
		'schemas' => [
			[
				'field' => 'site_name',
				'label' => '店铺名称',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],
			[
				'field' => 'name',
				'label' => '法人代表',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],
			[
				'field' => 'mobile',
				'label' => '联系电话',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],
			[
				'field' => 'category',
				'label' => '分类',
				'component' => 'Input',
				'ifShow' => '({ values }) => {
                    return false;
                }',
			],
			[
				'field' => 'category_id',
				'label' => '店铺类别',
				// 'component' => 'Input',
				'render' => '({ model, field }) => {
					return model.category?.category_name;
				}',
			],
			[
				'field' => 'member',
				'label' => '会员',
				// 'component' => 'Input',
				'ifShow' => '({ values }) => {
                    return false;
                }',
			],
			[
				'field' => 'member_id',
				'label' => '创建会员',
				'component' => 'Input',
				'render' => '({ model, field,values }) => {
					return model[field] + "-"+values.member?.nickname;
				}',
			],
			[
				'field' => 'card_no',
				'label' => '联系人身份证',
				'component' => 'Input',
				'render' => "({ model, field }) => {
				    return h(ant('Image'), {width:60 ,src: getImg(model[field]) });
				}",
			],
			[
				'field' => 'business_licence_number_electronic',
				'label' => '营业执照电子版',
				'component' => 'Input',
				'render' => "({ model, field }) => {
				    return h(ant('Image'), {width:60 ,src: getImg(model[field]) });
				}",
			],
			[
				'field' => 'card_hand',
				'label' => '申请人手持身份证电子版',
				'component' => 'Input',
				'render' => "({ model, field }) => {
				    return h(ant('Image'), {width:60 ,src: getImg(model[field]) });
				}",
			],
			[
				'field' => 'card_positive',
				'label' => '申请人身份证正面',
				'component' => 'Input',
				'render' => "({ model, field }) => {
				    return h(ant('Image'), {width:60 ,src: getImg(model[field]) });
				}",
			],
			[
				'field' => 'card_back',
				'label' => '申请人身份证反面',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],

			[
				'field' => 'shop_status',
				'label' => '店铺经营状态',
				'component' => 'Input',
				'render' => "({ model, field }) => {
                    const textMap = {0:'关闭',1:'正常',2:'审核中'};
					return textMap[model[field]];
				}",
			],
			[
				'field' => 'close_info',
				'label' => '店铺关闭原因',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],
			[
				'field' => 'security_deposit',
				'label' => '保证金',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],
			[
				'field' => 'deposit_status',
				'label' => '保证金状态',
				'component' => 'Input',
				'render' => "({ model, field }) => {
                    const textMap = {0:'等待支付',1:'已支付',2:'已退还'}
					return textMap[model[field]];
				}",
			],
			[
				'field' => 'logo',
				'label' => '店铺logo',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
				'render' => "({ model, field }) => {
				    return h(ant('Image'), {width:60 ,src: getImg(model[field]) });
				}",
			],
			[
				'field' => 'banner',
				'label' => '店铺条幅',
				'component' => 'Input',
				'disabled' => false,
				'render' => '({ model, field }) => {
					return model[field];
				}',
				'render' => '({ model, field }) => {
                    return h(Image, {size:60 ,imgList: model[field], srcPrefix: srcPrefix });
                }',
			],

			[
				'field' => 'profession_name',
				'label' => '业务联系人姓名',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],
			[
				'field' => 'profession_mobile',
				'label' => '业务联系人电话',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],
			[
				'field' => 'business_affairs_name',
				'label' => '商务联系人姓名',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],
			[
				'field' => 'business_affairs_mobile',
				'label' => '商务联系人电话',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],

			[
				'field' => 'province_name',
				'label' => '省名称',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],
			[
				'field' => 'city_name',
				'label' => '城市名称',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],
			[
				'field' => 'district_name',
				'label' => '区县地址',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],
			[
				'field' => 'address',
				'label' => '详细地址',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],
			[
				'field' => 'full_address',
				'label' => '完整地址',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],
			[
				'field' => 'create_time',
				'label' => '开店时间',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],
			[
				'field' => 'shop_type',
				'label' => '店铺类型 ',
				'component' => 'Input',
				'render' => "({ model, field }) => {
                    const textMap = {1:'线上',2:'线下'};
					return textMap[model[field]];
				}",
			],
			[
				'field' => 'is_one_delivery',
				'label' => '是否支持一件代发',
				'component' => 'Input',
				'render' => "({ model, field }) => {
                    const textMap = {1:'是',0:'否'};
					return textMap[model[field]];
				}",
			],
			[
				'field' => 'is_after_sales',
				'label' => '是否支持售后',
				'component' => 'Input',
				 'render' => "({ model, field }) => {
                    const textMap = {1:'是',0:'否'};
					return textMap[model[field]];
				}",
			],
			[
				'field' => 'audit_time',
				'label' => '审核时间',
				'component' => 'Input',
				'render' => '({ model, field }) => {
					return model[field];
				}',
			],
			[
				'field' => 'audit_status',
				'label' => '状态',
				'component' => 'RadioButtonGroup',
				'required' => true,
				'componentProps' => [
					'options' => [
						[
							'label' => '拒绝',
							'value' => 0,
						],
						[
							'label' => '通过',
							'value' => 1,
						],
					],
				],
				// 'render' => '({ model, field }) => {
				//     if( model[field]===1){
				//         model.shop = 1;
				//     }
				//     if( model[field]===0){
				//         model.shop = 2;
				//     }
				// }',
			],
			[
				'field' => 'audit_remark',
				'label' => '审核备注',
				'component' => 'InputTextArea',
				'required' => true,
			],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];
}
