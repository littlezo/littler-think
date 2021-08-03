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
 * @property site_name $string 店铺名称
 * @property username $string 用户名
 * @property phone $string 联系电话
 * @property cert_id $int 认证信息
 * @property category_id $int 店铺类别
 * @property member_id $int 创建会员id
 * @property shop_status $int 店铺经营状态（0.关闭，1正常 2. 审核中）
 * @property close_info $string 店铺关闭原因
 * @property sort $int 排序号
 * @property logo $string 店铺logo
 * @property avatar $string 店铺头像（大图）
 * @property banner $string 店铺条幅
 * @property keywords $string 店铺关键字
 * @property description $string 店铺简介
 * @property name $string 联系人姓名
 * @property mobile $string 联系手机号
 * @property profession_name $string 业务联系人姓名
 * @property profession_mobile $string 业务联系人电话
 * @property business_affairs_name $string 商务联系人姓名
 * @property business_affairs_mobile $string 商务联系人电话
 * @property is_recommend $int 是否推荐
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
 * @property expire_time $int 到期时间（0表示无限期）
 * @property shop_type $int 店铺类型 1 线上 2 线下
 * @property is_one_delivery $int 是否支持一件代发
 * @property is_after_sales $int 是否支持售后
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
		'site_name' => 'string',
		'username' => 'string',
		'phone' => 'string',
		'cert_id' => 'int',
		'category_id' => 'int',
		'member_id' => 'int',
		'shop_status' => 'int',
		'close_info' => 'string',
		'sort' => 'int',
		'logo' => 'string',
		'avatar' => 'string',
		'banner' => 'string',
		'keywords' => 'string',
		'description' => 'string',
		'name' => 'string',
		'mobile' => 'string',
		'profession_name' => 'string',
		'profession_mobile' => 'string',
		'business_affairs_name' => 'string',
		'business_affairs_mobile' => 'string',
		'is_recommend' => 'int',
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
		'expire_time' => 'int',
		'shop_type' => 'int',
		'is_one_delivery' => 'int',
		'is_after_sales' => 'int',
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
		'site_name',
		'username',
		'phone',
		'cert_id',
		'category_id',
		'member_id',
		'shop_status',
		'close_info',
		'sort',
		'logo',
		'avatar',
		'banner',
		'keywords',
		'description',
		'name',
		'mobile',
		'profession_name',
		'profession_mobile',
		'business_affairs_name',
		'business_affairs_mobile',
		'is_recommend',
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
		'expire_time',
		'shop_type',
		'is_one_delivery',
		'is_after_sales',
	];
}
