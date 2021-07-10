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

namespace little\fenxiao\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property level_id $int
 * @property level_num $string 等级权重
 * @property level_name $string 等级名称
 * @property one_rate $float 一级佣金比例
 * @property two_rate $float 二级佣金比例
 * @property three_rate $float 三级佣金比例
 * @property upgrade_type $int 升级方式（0满足任意条件  1满足全部条件）
 * @property fenxiao_order_num $int 订单总数
 * @property fenxiao_order_meney $float 订单总金额
 * @property one_fenxiao_order_num $int 一级分销订单总数
 * @property one_fenxiao_order_money $float 一级分销订单总额
 * @property order_num $int 自购订单总数
 * @property order_money $float 自购订单总额
 * @property child_num $int 下线人数
 * @property child_fenxiao_num $int 下线分销商人数
 * @property one_child_num $int 一级下线人数
 * @property one_child_fenxiao_num $int 一级下线分销商
 * @property status $int 状态（0关闭 1启用）
 * @property create_time $int
 * @property update_time $int
 */
abstract class LevelAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'fenxiao_level';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'level_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'level_id' => 'int',
		'level_num' => 'string',
		'level_name' => 'string',
		'one_rate' => 'float',
		'two_rate' => 'float',
		'three_rate' => 'float',
		'upgrade_type' => 'int',
		'fenxiao_order_num' => 'int',
		'fenxiao_order_meney' => 'float',
		'one_fenxiao_order_num' => 'int',
		'one_fenxiao_order_money' => 'float',
		'order_num' => 'int',
		'order_money' => 'float',
		'child_num' => 'int',
		'child_fenxiao_num' => 'int',
		'one_child_num' => 'int',
		'one_child_fenxiao_num' => 'int',
		'status' => 'int',
		'create_time' => 'int',
		'update_time' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'level_id',
		'level_num',
		'level_name',
		'one_rate',
		'two_rate',
		'three_rate',
		'upgrade_type',
		'fenxiao_order_num',
		'fenxiao_order_meney',
		'one_fenxiao_order_num',
		'one_fenxiao_order_money',
		'order_num',
		'order_money',
		'child_num',
		'child_fenxiao_num',
		'one_child_num',
		'one_child_fenxiao_num',
		'status',
		'create_time',
		'update_time',
	];
}
