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
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int 主键
 * @property site_id $int 站点id
 * @property site_name $string 站点名称
 * @property verify_code $string 核销码
 * @property verify_type $string 核销类型
 * @property verify_type_name $string 核销类型名称
 * @property verify_content_json $string 核销相关数据
 * @property verifier_id $int 核销员id
 * @property verifier_name $string 核销员姓名
 * @property is_verify $int 是否已经核销
 * @property create_time $int 创建时间
 * @property verify_time $int 核销时间
 */
abstract class VerifierCodeAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'verifier_code';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'site_id' => 'int',
		'site_name' => 'string',
		'verify_code' => 'string',
		'verify_type' => 'string',
		'verify_type_name' => 'string',
		'verify_content_json' => 'string',
		'verifier_id' => 'int',
		'verifier_name' => 'string',
		'is_verify' => 'int',
		'create_time' => 'int',
		'verify_time' => 'int',
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
		'id',
		'site_id',
		'site_name',
		'verify_code',
		'verify_type',
		'verify_type_name',
		'verify_content_json',
		'verifier_id',
		'verifier_name',
		'is_verify',
		'create_time',
		'verify_time',
	];
}
