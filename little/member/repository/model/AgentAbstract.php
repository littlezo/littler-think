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

/**
 * @property agent_id $int 等级ID
 * @property agent_type $int 代理类型
 * @property agent_money $float 代理费
 * @property agent_ratio $float 代理分润
 * @property invite_ratio $float 推荐分佣
 * @property status $int 状态
 */
abstract class AgentAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_agent';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'agent_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'agent_id' => 'int',
		'agent_type' => 'int',
		'agent_money' => 'float',
		'agent_ratio' => 'float',
		'invite_ratio' => 'float',
		'status' => 'int',
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
	public $field = ['agent_id', 'agent_type', 'agent_money', 'agent_ratio', 'invite_ratio', 'status'];
}
