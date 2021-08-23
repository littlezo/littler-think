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
 * @property spl_id $int 服务商等级
 * @property level_id $int 用户等级
 * @property mobile $string 手机号
 * @property email $string 邮箱
 * @property status $int 用户状态 1启用
 * @property spl_status $int 服务商状态
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
		'spl_id' => 'int',
		'level_id' => 'int',
		'mobile' => 'string',
		'email' => 'string',
		'status' => 'int',
		'spl_status' => 'int',
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
		'spl_id',
		'level_id',
		'mobile',
		'email',
		'status',
		'spl_status',
		'create_time',
		'update_time',
		'delete_time',
	];
}
