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

namespace little\admin\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;
use think\model\concern\SoftDelete;

/**
 * @property id $int
 * @property company_id $int 企业id
 * @property name $string 名称
 * @property acount $string 账号
 * @property passwd $string 密码
 * @property salt $string 密码盐
 * @property avatar $string 头像
 * @property email $string 电子邮箱
 * @property status $int 状态：1正常 0禁用
 * @property remark $string 备注
 * @property create_time $int
 * @property update_time $int
 * @property delete_time $int
 */
abstract class AdminAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;
	use SoftDelete;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'admin';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'company_id' => 'int',
		'name' => 'string',
		'acount' => 'string',
		'passwd' => 'string',
		'salt' => 'string',
		'avatar' => 'string',
		'email' => 'string',
		'status' => 'int',
		'remark' => 'string',
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
		'company_id',
		'name',
		'acount',
		'passwd',
		'salt',
		'avatar',
		'email',
		'status',
		'remark',
		'create_time',
		'update_time',
		'delete_time',
	];
}
