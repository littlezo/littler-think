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
			// [
			// 	'title' => '认证信息',
			// 	'dataIndex' => 'cert_id',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '是否自营',
			// 	'dataIndex' => 'is_own',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '店铺等级',
			// 	'dataIndex' => 'level_id',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			[
				'title' => '店铺类别',
				'dataIndex' => 'category_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '创建会员id',
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
			// [
			// 	'title' => '排序号',
			// 	'dataIndex' => 'sort',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '经营时间',
			// 	'dataIndex' => 'start_time',
			// 	'width' => 120,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '关闭时间',
			// 	'dataIndex' => 'end_time',
			// 	'width' => 120,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			[
				'title' => '店铺logo',
				'dataIndex' => 'logo',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ text }) => {
                    // console.log(text)
			        return h(ant('Avatar'), {size:60 ,src: getImg(text) });
			    }",
			],
			// [
			// 	'title' => '店铺头像（大图）',
			// 	'dataIndex' => 'avatar',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
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
			// [
			// 	'title' => '店铺简介',
			// 	'dataIndex' => 'description',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
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
			// [
			// 	'title' => '描述分值',
			// 	'dataIndex' => 'desccredit',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '服务分值',
			// 	'dataIndex' => 'servicecredit',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '发货速度分值',
			// 	'dataIndex' => 'deliverycredit',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '工作时间',
			// 	'dataIndex' => 'workingtime',
			// 	'width' => 120,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '商家配送时间',
			// 	'dataIndex' => 'delivery_time',
			// 	'width' => 80,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => true,
			// ],
			// [
			// 	'title' => '店铺销量',
			// 	'dataIndex' => 'sales_volume',
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
			// 	'title' => '工作日',
			// 	'dataIndex' => 'work_week',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '省id',
			// 	'dataIndex' => 'province',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '省名称',
			// 	'dataIndex' => 'province_name',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '城市id',
			// 	'dataIndex' => 'city',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '城市名称',
			// 	'dataIndex' => 'city_name',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '区县id',
			// 	'dataIndex' => 'district',
			// 	'width' => 100,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			// [
			// 	'title' => '区县地址',
			// 	'dataIndex' => 'district_name',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
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
			// [
			// 	'title' => '详细地址',
			// 	'dataIndex' => 'address',
			// 	'width' => 180,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
			[
				'title' => '商家地址',
				'dataIndex' => 'full_address',
				'width' => 300,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
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
			// [
			// 	'title' => '到期时间（0表示无限期）',
			// 	'dataIndex' => 'expire_time',
			// 	'width' => 120,
			// 	'fixed' => false,
			// 	'align' => 'center',
			// 	'defaultHidden' => false,
			// ],
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
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'schemas' => [
			[
				'field' => 'site_id',
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
				'field' => 'site_name',
				'label' => '店铺名称',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'username',
				'label' => '用户名',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'cert_id',
				'label' => '认证信息',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'is_own',
				'label' => '是否自营',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'level_id',
				'label' => '店铺等级',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'category_id',
				'label' => '店铺类别',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'member_id',
				'label' => '创建会员id',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'shop_status',
				'label' => '店铺经营状态（0.关闭，1正常 2. 审核中）',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'close_info',
				'label' => '店铺关闭原因',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'sort',
				'label' => '排序号',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'start_time',
				'label' => '经营时间',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'end_time',
				'label' => '关闭时间',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'logo',
				'label' => '店铺logo',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'avatar',
				'label' => '店铺头像（大图）',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'banner',
				'label' => '店铺条幅',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'keywords',
				'label' => '店铺关键字',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'description',
				'label' => '店铺简介',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'name',
				'label' => '联系人姓名',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'mobile',
				'label' => '联系手机号',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'profession_name',
				'label' => '业务联系人姓名',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'profession_mobile',
				'label' => '业务联系人电话',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'business_affairs_name',
				'label' => '商务联系人姓名',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'business_affairs_mobile',
				'label' => '商务联系人电话',
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
				'field' => 'desccredit',
				'label' => '描述分值',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'servicecredit',
				'label' => '服务分值',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'deliverycredit',
				'label' => '发货速度分值',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'workingtime',
				'label' => '工作时间',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'delivery_time',
				'label' => '商家配送时间',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'sales_volume',
				'label' => '店铺销量',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'balance_money',
				'label' => '账户实际余额',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'balance_withdraw',
				'label' => '已提现金额',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'balance_withdraw_apply',
				'label' => '申请提现中金额',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'work_week',
				'label' => '工作日',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'province',
				'label' => '省id',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'province_name',
				'label' => '省名称',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'city',
				'label' => '城市id',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'city_name',
				'label' => '城市名称',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'district',
				'label' => '区县id',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'district_name',
				'label' => '区县地址',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'community',
				'label' => '乡镇地址id',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'community_name',
				'label' => '乡镇地址名称',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'address',
				'label' => '详细地址',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'full_address',
				'label' => '完整地址',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'longitude',
				'label' => '经度',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'latitude',
				'label' => '纬度',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'create_time',
				'label' => '开店时间',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'expire_time',
				'label' => '到期时间（0表示无限期）',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'shop_type',
				'label' => '店铺类型 1 线上 2 线下',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'is_one_delivery',
				'label' => '是否支持一件代发',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'is_after_sales',
				'label' => '是否支持售后',
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
