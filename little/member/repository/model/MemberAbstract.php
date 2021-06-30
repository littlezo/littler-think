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

namespace little\member\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property member_id $int 主键
 * @property source_member $int 推荐人
 * @property fenxiao_id $int 分销商（分销有效）
 * @property is_fenxiao $int 是否是分销商
 * @property username $string 用户名
 * @property nickname $string 用户昵称
 * @property mobile $string 手机号
 * @property email $string 邮箱
 * @property password $string 用户密码（MD5）
 * @property status $int 用户状态  用户状态默认为1
 * @property headimg $string 用户头像
 * @property member_level $int 用户等级
 * @property member_level_name $string 会员等级名称
 * @property member_label $string 用户标签
 * @property member_label_name $string 会员标签名称
 * @property qq $string qq号
 * @property qq_openid $string qq互联id
 * @property wx_openid $string 微信用户openid
 * @property weapp_openid $string 微信小程序openid
 * @property wx_unionid $string 微信unionid
 * @property ali_openid $string 支付宝账户id
 * @property baidu_openid $string 百度账户id
 * @property toutiao_openid $string 头条账号
 * @property douyin_openid $string 抖音小程序openid
 * @property login_ip $string 当前登录ip
 * @property login_type $string 当前登录的操作终端类型
 * @property login_time $int 当前登录时间
 * @property last_login_ip $string 上次登录ip
 * @property last_login_type $string 上次登录的操作终端类型
 * @property last_login_time $int 上次登录时间
 * @property login_num $int 登录次数
 * @property realname $string 真实姓名
 * @property sex $int 性别 0保密 1男 2女
 * @property location $string 定位地址
 * @property birthday $int 出生日期
 * @property reg_time $int 注册时间
 * @property point $float 积分
 * @property balance $float 余额
 * @property growth $float 成长值
 * @property balance_money $float 现金余额(可提现)
 * @property account5 $float 账户5
 * @property is_auth $int 是否认证
 * @property sign_time $int 最后一次签到时间
 * @property sign_days_series $int 持续签到天数
 * @property pay_password $string 交易密码
 * @property order_money $float 付款后-消费金额
 * @property order_complete_money $float 订单完成-消费金额
 * @property order_num $int 付款后-消费次数
 * @property order_complete_num $int 订单完成-消费次数
 * @property balance_withdraw_apply $float 提现中余额
 * @property balance_withdraw $float 已提现余额
 */
abstract class MemberAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'member_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'member_id' => 'int',
		'source_member' => 'int',
		'fenxiao_id' => 'int',
		'is_fenxiao' => 'int',
		'username' => 'string',
		'nickname' => 'string',
		'mobile' => 'string',
		'email' => 'string',
		'password' => 'string',
		'status' => 'int',
		'headimg' => 'string',
		'member_level' => 'int',
		'member_level_name' => 'string',
		'member_label' => 'string',
		'member_label_name' => 'string',
		'qq' => 'string',
		'qq_openid' => 'string',
		'wx_openid' => 'string',
		'weapp_openid' => 'string',
		'wx_unionid' => 'string',
		'ali_openid' => 'string',
		'baidu_openid' => 'string',
		'toutiao_openid' => 'string',
		'douyin_openid' => 'string',
		'login_ip' => 'string',
		'login_type' => 'string',
		'login_time' => 'int',
		'last_login_ip' => 'string',
		'last_login_type' => 'string',
		'last_login_time' => 'int',
		'login_num' => 'int',
		'realname' => 'string',
		'sex' => 'int',
		'location' => 'string',
		'birthday' => 'int',
		'reg_time' => 'int',
		'point' => 'float',
		'balance' => 'float',
		'growth' => 'float',
		'balance_money' => 'float',
		'account5' => 'float',
		'is_auth' => 'int',
		'sign_time' => 'int',
		'sign_days_series' => 'int',
		'pay_password' => 'string',
		'order_money' => 'float',
		'order_complete_money' => 'float',
		'order_num' => 'int',
		'order_complete_num' => 'int',
		'balance_withdraw_apply' => 'float',
		'balance_withdraw' => 'float',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'member_id' => 'int unsigned',
		'source_member' => 'int',
		'fenxiao_id' => 'int',
		'is_fenxiao' => 'tinyint',
		'username' => 'varchar',
		'nickname' => 'varchar',
		'mobile' => 'varchar',
		'email' => 'varchar',
		'password' => 'varchar',
		'status' => 'int',
		'headimg' => 'varchar',
		'member_level' => 'int',
		'member_level_name' => 'varchar',
		'member_label' => 'varchar',
		'member_label_name' => 'varchar',
		'qq' => 'varchar',
		'qq_openid' => 'varchar',
		'wx_openid' => 'varchar',
		'weapp_openid' => 'varchar',
		'wx_unionid' => 'varchar',
		'ali_openid' => 'varchar',
		'baidu_openid' => 'varchar',
		'toutiao_openid' => 'varchar',
		'douyin_openid' => 'varchar',
		'login_ip' => 'varchar',
		'login_type' => 'varchar',
		'login_time' => 'timestamp',
		'last_login_ip' => 'varchar',
		'last_login_type' => 'varchar',
		'last_login_time' => 'timestamp',
		'login_num' => 'int',
		'realname' => 'varchar',
		'sex' => 'smallint',
		'location' => 'varchar',
		'birthday' => 'int',
		'reg_time' => 'timestamp',
		'point' => 'decimal',
		'balance' => 'decimal',
		'growth' => 'decimal',
		'balance_money' => 'decimal',
		'account5' => 'decimal',
		'is_auth' => 'int',
		'sign_time' => 'timestamp',
		'sign_days_series' => 'int',
		'pay_password' => 'varchar',
		'order_money' => 'decimal',
		'order_complete_money' => 'decimal',
		'order_num' => 'int',
		'order_complete_num' => 'int',
		'balance_withdraw_apply' => 'decimal',
		'balance_withdraw' => 'decimal',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $createTime 关闭创建时间自动写入
	 */
	protected $createTime = false;

	/**
	 * @var array $updateTime 关闭更新时间自动写入
	 */
	protected $updateTime = false;

	/**
	 * @var array $field 允许写入字段
	 */
	protected $field = [
		'member_id',
		'source_member',
		'fenxiao_id',
		'is_fenxiao',
		'username',
		'nickname',
		'mobile',
		'email',
		'password',
		'status',
		'headimg',
		'member_level',
		'member_level_name',
		'member_label',
		'member_label_name',
		'qq',
		'qq_openid',
		'wx_openid',
		'weapp_openid',
		'wx_unionid',
		'ali_openid',
		'baidu_openid',
		'toutiao_openid',
		'douyin_openid',
		'login_ip',
		'login_type',
		'login_time',
		'last_login_ip',
		'last_login_type',
		'last_login_time',
		'login_num',
		'realname',
		'sex',
		'location',
		'birthday',
		'reg_time',
		'point',
		'balance',
		'growth',
		'balance_money',
		'account5',
		'is_auth',
		'sign_time',
		'sign_days_series',
		'pay_password',
		'order_money',
		'order_complete_money',
		'order_num',
		'order_complete_num',
		'balance_withdraw_apply',
		'balance_withdraw',
	];
}
