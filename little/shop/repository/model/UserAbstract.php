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

namespace little\shop\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property site_id $int
 * @property cert_type $int 申请类型1.个人2.公司
 * @property card_no $string 联系人身份证
 * @property card_hand $string 申请人手持身份证电子版
 * @property card_positive $string 申请人身份证正面
 * @property card_back $string 申请人身份证反面
 * @property business_licence_number $string 统一社会信用码
 * @property business_licence_number_electronic $string 营业执照电子版
 * @property business_sphere $string 法定经营范围
 * @property bank_account_name $string 银行开户名
 * @property bank_account_number $string 公司银行账号
 * @property bank_name $string 开户银行支行名称
 * @property bank_address $string 开户银行所在地
 * @property bank_type $int 结算账户类型  1微信 2 支付宝 3银行卡
 * @property settlement_bank_account_name $string 结算银行开户名
 * @property settlement_bank_account_number $string 结算公司银行账号
 * @property settlement_bank_name $string 结算开户银行支行名称
 * @property settlement_bank_address $string 结算开户银行所在地
 * @property site_name $string 店铺名称
 * @property category_id $int 店铺类别
 * @property member_id $int 创建会员id
 * @property shop_status $int 店铺经营状态（0.关闭，1正常 2. 审核中）
 * @property close_info $string 店铺关闭原因
 * @property security_deposit $float 保证金
 * @property deposit_status $int 保证金状态 0等待支付 1已支付 2已退还
 * @property sort $int 排序号
 * @property logo $int 店铺logo
 * @property banner $string 店铺条幅
 * @property keywords $string 店铺关键字
 * @property description $string 店铺简介
 * @property name $string 法人代表
 * @property mobile $string 法人联系电话
 * @property profession_name $string 业务联系人姓名
 * @property profession_mobile $string 业务联系人电话
 * @property business_affairs_name $string 商务联系人姓名
 * @property business_affairs_mobile $string 商务联系人电话
 * @property balance_money $float 账户实际余额
 * @property balance_withdraw $float 已提现金额
 * @property balance_withdraw_apply $float 申请提现中金额
 * @property province $int 省id
 * @property province_name $string 省名称
 * @property city $int 城市id
 * @property city_name $string 城市名称
 * @property district $int 区县id
 * @property district_name $string 区县地址
 * @property community $int 乡镇地址id
 * @property community_name $string 乡镇地址名称
 * @property address $string 详细地址
 * @property full_address $string 完整地址
 * @property longitude $string 经度
 * @property latitude $string 纬度
 * @property create_time $int 开店时间
 * @property shop_type $int 店铺类型 1 线上 2 线下
 * @property is_one_delivery $int 是否支持一件代发
 * @property is_after_sales $int 是否支持售后
 * @property audit_time $int 审核时间
 * @property audit_status $int 审核状态 0拒绝 1通过 2 等待审核
 * @property audit_remark $string 审核备注
 */
abstract class UserAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'shop_user';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'site_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'site_id' => 'int',
		'cert_type' => 'int',
		'card_no' => 'string',
		'card_hand' => 'string',
		'card_positive' => 'string',
		'card_back' => 'string',
		'business_licence_number' => 'string',
		'business_licence_number_electronic' => 'string',
		'business_sphere' => 'string',
		'bank_account_name' => 'string',
		'bank_account_number' => 'string',
		'bank_name' => 'string',
		'bank_address' => 'string',
		'bank_type' => 'int',
		'settlement_bank_account_name' => 'string',
		'settlement_bank_account_number' => 'string',
		'settlement_bank_name' => 'string',
		'settlement_bank_address' => 'string',
		'site_name' => 'string',
		'category_id' => 'int',
		'member_id' => 'int',
		'shop_status' => 'int',
		'close_info' => 'string',
		'security_deposit' => 'float',
		'deposit_status' => 'int',
		'sort' => 'int',
		'logo' => 'int',
		'banner' => 'string',
		'keywords' => 'string',
		'description' => 'string',
		'name' => 'string',
		'mobile' => 'string',
		'profession_name' => 'string',
		'profession_mobile' => 'string',
		'business_affairs_name' => 'string',
		'business_affairs_mobile' => 'string',
		'balance_money' => 'float',
		'balance_withdraw' => 'float',
		'balance_withdraw_apply' => 'float',
		'province' => 'int',
		'province_name' => 'string',
		'city' => 'int',
		'city_name' => 'string',
		'district' => 'int',
		'district_name' => 'string',
		'community' => 'int',
		'community_name' => 'string',
		'address' => 'string',
		'full_address' => 'string',
		'longitude' => 'string',
		'latitude' => 'string',
		'create_time' => 'int',
		'shop_type' => 'int',
		'is_one_delivery' => 'int',
		'is_after_sales' => 'int',
		'audit_time' => 'int',
		'audit_status' => 'int',
		'audit_remark' => 'string',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['banner'];

	/**
	 * @var array $json JSON字段自动转数组
	 */
	protected $jsonAssoc = true;

	/**
	 * @var array $updateTime 关闭更新时间自动写入
	 */
	protected $updateTime = false;

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'site_id',
		'cert_type',
		'card_no',
		'card_hand',
		'card_positive',
		'card_back',
		'business_licence_number',
		'business_licence_number_electronic',
		'business_sphere',
		'bank_account_name',
		'bank_account_number',
		'bank_name',
		'bank_address',
		'bank_type',
		'settlement_bank_account_name',
		'settlement_bank_account_number',
		'settlement_bank_name',
		'settlement_bank_address',
		'site_name',
		'category_id',
		'member_id',
		'shop_status',
		'close_info',
		'security_deposit',
		'deposit_status',
		'sort',
		'logo',
		'banner',
		'keywords',
		'description',
		'name',
		'mobile',
		'profession_name',
		'profession_mobile',
		'business_affairs_name',
		'business_affairs_mobile',
		'balance_money',
		'balance_withdraw',
		'balance_withdraw_apply',
		'province',
		'province_name',
		'city',
		'city_name',
		'district',
		'district_name',
		'community',
		'community_name',
		'address',
		'full_address',
		'longitude',
		'latitude',
		'create_time',
		'shop_type',
		'is_one_delivery',
		'is_after_sales',
		'audit_time',
		'audit_status',
		'audit_remark',
	];
}
