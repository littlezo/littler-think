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
 * @property apply_id $int
 * @property fenxiao_name $string 分销商店铺名
 * @property parent $int 上级分销商ID
 * @property member_id $int 会员ID
 * @property mobile $string 联系电话
 * @property nickname $string 用户昵称
 * @property headimg $string 用户头像
 * @property level_id $int 申请等级
 * @property level_name $string 等级名称
 * @property order_complete_money $float 订单完成-消费金额
 * @property order_complete_num $int 订单完成-消费次数
 * @property reg_time $int 注册时间
 * @property create_time $int 申请时间
 * @property update_time $int
 * @property status $int 申请状态（1申请中  2通过 -1拒绝）
 */
abstract class FenxiaoApplyAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'fenxiao_apply';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'apply_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'apply_id' => 'int',
		'fenxiao_name' => 'string',
		'parent' => 'int',
		'member_id' => 'int',
		'mobile' => 'string',
		'nickname' => 'string',
		'headimg' => 'string',
		'level_id' => 'int',
		'level_name' => 'string',
		'order_complete_money' => 'float',
		'order_complete_num' => 'int',
		'reg_time' => 'int',
		'create_time' => 'int',
		'update_time' => 'int',
		'status' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'apply_id',
		'fenxiao_name',
		'parent',
		'member_id',
		'mobile',
		'nickname',
		'headimg',
		'level_id',
		'level_name',
		'order_complete_money',
		'order_complete_num',
		'reg_time',
		'create_time',
		'update_time',
		'status',
	];
}
