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
 * @property expire_time $int 到期时间（0表示无限期）
 * @property site_name $string 店铺名称
 * @property username $string 管理员用户
 * @property website_id $int 城市分站
 * @property cert_id $int 认证信息
 * @property is_own $int 是否自营
 * @property level_id $int 店铺等级
 * @property level_name $string 店铺等级名称
 * @property category_id $int 店铺类别
 * @property category_name $string 店铺类别名称
 * @property group_id $int 分组id
 * @property group_name $string 分组名称
 * @property member_id $int 创建会员id
 * @property member_name $string 创建会员名称
 * @property shop_status $int 店铺经营状态（0.关闭，1正常 2. 审核中）
 * @property close_info $string 店铺关闭原因
 * @property sort $int 排序号
 * @property start_time $int 经营时间
 * @property end_time $int 关闭时间
 * @property logo $string 店铺logo
 * @property avatar $string 店铺头像（大图）
 * @property banner $string 店铺条幅
 * @property seo_keywords $string 店铺关键字
 * @property seo_description $string 店铺简介
 * @property qq $string 联系人qq
 * @property ww $string 联系人阿里旺旺
 * @property name $string 联系人姓名
 * @property mobile $string 联系手机号
 * @property telephone $string 联系电话
 * @property is_recommend $int 是否推荐
 * @property shop_desccredit $float 描述分值
 * @property shop_servicecredit $float 服务分值
 * @property shop_deliverycredit $float 发货速度分值
 * @property workingtime $int 工作时间
 * @property shop_baozh $int 保证服务开关
 * @property shop_baozhopen $int 保证金显示开关
 * @property shop_baozhrmb $float 保证金金额
 * @property shop_qtian $int 7天退换
 * @property shop_zhping $int 正品保障
 * @property shop_erxiaoshi $int 两小时发货
 * @property shop_tuihuo $int 退货承诺
 * @property shop_shiyong $int 试用中心
 * @property shop_shiti $int 实体验证
 * @property shop_xiaoxie $int 消协保证
 * @property shop_free_time $string 商家配送时间
 * @property shop_sales $int 店铺销量
 * @property shop_adv $string 店铺广告图
 * @property account $float 账户实际余额
 * @property account_withdraw $float 已提现金额
 * @property account_withdraw_apply $float 申请提现中金额
 * @property work_week $string 工作日
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
 * @property sub_num $int 关注会员数
 * @property shop_open_fee $float 店铺申请续签费用
 * @property email $string 邮箱
 * @property create_time $int 开店时间
 * @property store_settlement_time $int 门店最后结算时间
 */
abstract class ShopListAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'shop_list';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'site_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'site_id' => 'int',
		'expire_time' => 'int',
		'site_name' => 'string',
		'username' => 'string',
		'website_id' => 'int',
		'cert_id' => 'int',
		'is_own' => 'int',
		'level_id' => 'int',
		'level_name' => 'string',
		'category_id' => 'int',
		'category_name' => 'string',
		'group_id' => 'int',
		'group_name' => 'string',
		'member_id' => 'int',
		'member_name' => 'string',
		'shop_status' => 'int',
		'close_info' => 'string',
		'sort' => 'int',
		'start_time' => 'int',
		'end_time' => 'int',
		'logo' => 'string',
		'avatar' => 'string',
		'banner' => 'string',
		'seo_keywords' => 'string',
		'seo_description' => 'string',
		'qq' => 'string',
		'ww' => 'string',
		'name' => 'string',
		'mobile' => 'string',
		'telephone' => 'string',
		'is_recommend' => 'int',
		'shop_desccredit' => 'float',
		'shop_servicecredit' => 'float',
		'shop_deliverycredit' => 'float',
		'workingtime' => 'int',
		'shop_baozh' => 'int',
		'shop_baozhopen' => 'int',
		'shop_baozhrmb' => 'float',
		'shop_qtian' => 'int',
		'shop_zhping' => 'int',
		'shop_erxiaoshi' => 'int',
		'shop_tuihuo' => 'int',
		'shop_shiyong' => 'int',
		'shop_shiti' => 'int',
		'shop_xiaoxie' => 'int',
		'shop_free_time' => 'string',
		'shop_sales' => 'int',
		'shop_adv' => 'string',
		'account' => 'float',
		'account_withdraw' => 'float',
		'account_withdraw_apply' => 'float',
		'work_week' => 'string',
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
		'sub_num' => 'int',
		'shop_open_fee' => 'float',
		'email' => 'string',
		'create_time' => 'int',
		'store_settlement_time' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $updateTime 关闭更新时间自动写入
	 */
	protected $updateTime = false;

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'site_id',
		'expire_time',
		'site_name',
		'username',
		'website_id',
		'cert_id',
		'is_own',
		'level_id',
		'level_name',
		'category_id',
		'category_name',
		'group_id',
		'group_name',
		'member_id',
		'member_name',
		'shop_status',
		'close_info',
		'sort',
		'start_time',
		'end_time',
		'logo',
		'avatar',
		'banner',
		'seo_keywords',
		'seo_description',
		'qq',
		'ww',
		'name',
		'mobile',
		'telephone',
		'is_recommend',
		'shop_desccredit',
		'shop_servicecredit',
		'shop_deliverycredit',
		'workingtime',
		'shop_baozh',
		'shop_baozhopen',
		'shop_baozhrmb',
		'shop_qtian',
		'shop_zhping',
		'shop_erxiaoshi',
		'shop_tuihuo',
		'shop_shiyong',
		'shop_shiti',
		'shop_xiaoxie',
		'shop_free_time',
		'shop_sales',
		'shop_adv',
		'account',
		'account_withdraw',
		'account_withdraw_apply',
		'work_week',
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
		'sub_num',
		'shop_open_fee',
		'email',
		'create_time',
		'store_settlement_time',
	];
}
