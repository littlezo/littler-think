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

namespace little\user\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property uid $int
 * @property app_module $string 应用端口
 * @property app_group $int 应用所属组
 * @property is_admin $int 是否是管理员
 * @property site_id $int 站点id
 * @property group_id $int 权限id
 * @property group_name $string 权限组
 * @property username $string 账号
 * @property password $string 密码
 * @property member_id $int 会员id
 * @property create_time $int 创建时间
 * @property update_time $int
 * @property status $int 状态 1 正常
 * @property login_time $int 最新一次登陆时间
 * @property login_ip $string 最新登录ip
 */
abstract class UserAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'user';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'uid';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'uid' => 'int',
		'app_module' => 'string',
		'app_group' => 'int',
		'is_admin' => 'int',
		'site_id' => 'int',
		'group_id' => 'int',
		'group_name' => 'string',
		'username' => 'string',
		'password' => 'string',
		'member_id' => 'int',
		'create_time' => 'int',
		'update_time' => 'int',
		'status' => 'int',
		'login_time' => 'int',
		'login_ip' => 'string',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'uid',
		'app_module',
		'app_group',
		'is_admin',
		'site_id',
		'group_id',
		'group_name',
		'username',
		'password',
		'member_id',
		'create_time',
		'update_time',
		'status',
		'login_time',
		'login_ip',
	];
}
