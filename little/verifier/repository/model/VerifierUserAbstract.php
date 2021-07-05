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

namespace little\verifier\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property verifier_id $int 核销员id
 * @property verifier_name $string 核销员姓名
 * @property site_id $int 商家id
 * @property member_id $int 前台会员id
 * @property uid $int 后台用户id
 * @property create_time $int 创建时间
 * @property modify_time $int 修改时间
 */
abstract class VerifierUserAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'verifier_user';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'verifier_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'verifier_id' => 'int',
		'verifier_name' => 'string',
		'site_id' => 'int',
		'member_id' => 'int',
		'uid' => 'int',
		'create_time' => 'int',
		'modify_time' => 'int',
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
	public $field = ['verifier_id', 'verifier_name', 'site_id', 'member_id', 'uid', 'create_time', 'modify_time'];
}
