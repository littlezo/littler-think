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
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;
use think\model\concern\SoftDelete;

/**
 * @property id $int 主键
 * @property parent $int 推荐人
 * @property username $string 用户名
 * @property nickname $string 用户昵称
 * @property mobile $string 手机号
 * @property email $string 邮箱
 * @property password $string 用户密码（MD5）
 * @property status $int 用户状态
 * @property avatar $string 用户头像
 * @property level_id $int 用户等级
 * @property wx_openid $string 微信用户openid
 * @property wx_account $string 微信号
 * @property weapp_openid $string 微信小程序openid
 * @property wx_unionid $string 微信unionid
 * @property ali_openid $string 支付宝账户id
 * @property login_ip $string 当前登录ip
 * @property login_type $string 当前登录的操作终端类型
 * @property login_time $int 当前登录时间
 * @property last_login_ip $string 上次登录ip
 * @property last_login_type $string 上次登录的操作终端类型
 * @property last_login_time $int 上次登录时间
 * @property login_num $int 登录次数
 * @property realname $string 真实姓名
 * @property sex $int 性别 0保密 1男 2女
 * @property location $string 地址
 * @property birthday $int 出生日期
 * @property point $float 积分
 * @property growth $float 贡献值
 * @property balance_money $float 现金余额
 * @property balance_cash $float 现金卷余额
 * @property balance_deduct $float 抵扣券余额
 * @property balance_withdraw $float 已提现余额
 * @property balance_withdraw_apply $float 提现中余额
 * @property is_auth $int 是否认证
 * @property pay_password $string 交易密码
 * @property Invite_code $string 邀请码
 * @property create_time $int 注册时间
 * @property update_time $int 更新时间
 * @property delete_time $int 删除时间
 */
abstract class UserAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;
	use SoftDelete;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_user';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'parent' => 'int',
		'username' => 'string',
		'nickname' => 'string',
		'mobile' => 'string',
		'email' => 'string',
		'password' => 'string',
		'status' => 'int',
		'avatar' => 'string',
		'level_id' => 'int',
		'wx_openid' => 'string',
		'wx_account' => 'string',
		'weapp_openid' => 'string',
		'wx_unionid' => 'string',
		'ali_openid' => 'string',
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
		'point' => 'float',
		'growth' => 'float',
		'balance_money' => 'float',
		'balance_cash' => 'float',
		'balance_deduct' => 'float',
		'balance_withdraw' => 'float',
		'balance_withdraw_apply' => 'float',
		'is_auth' => 'int',
		'pay_password' => 'string',
		'Invite_code' => 'string',
		'create_time' => 'int',
		'update_time' => 'int',
		'delete_time' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'id',
		'parent',
		'username',
		'nickname',
		'mobile',
		'email',
		'password',
		'status',
		'avatar',
		'level_id',
		'wx_openid',
		'wx_account',
		'weapp_openid',
		'wx_unionid',
		'ali_openid',
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
		'point',
		'growth',
		'balance_money',
		'balance_cash',
		'balance_deduct',
		'balance_withdraw',
		'balance_withdraw_apply',
		'is_auth',
		'pay_password',
		'Invite_code',
		'create_time',
		'update_time',
		'delete_time',
	];
}
