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
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property fenxiao_id $int
 * @property fenxiao_no $string 分销商编号
 * @property fenxiao_name $string 分销店铺名
 * @property mobile $string 联系电话
 * @property member_id $int 会员ID
 * @property level_id $int 分销商等级id
 * @property level_name $string 等级名称
 * @property parent $int 上级ID
 * @property grand_parent $int 上上级id
 * @property account $float 当前佣金
 * @property account_withdraw $float 已提现佣金
 * @property account_withdraw_apply $float 提现中佣金
 * @property status $int 状态（1已审核 2拒绝 -1已冻结）
 * @property create_time $int 创建时间
 * @property audit_time $int 成为经分销商时间
 * @property lock_time $int 冻结时间
 * @property one_fenxiao_order_num $int 一级分销订单总数
 * @property one_fenxiao_order_money $float 一级分销订单总额
 * @property one_child_num $int 一级下线人数
 * @property one_child_fenxiao_num $int 一级下线分销商
 * @property two_child_fenxiao_num $int 二级下线分销商
 * @property total_commission $float 累计佣金
 */
abstract class FenxiaoAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'fenxiao';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'fenxiao_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'fenxiao_id' => 'int',
		'fenxiao_no' => 'string',
		'fenxiao_name' => 'string',
		'mobile' => 'string',
		'member_id' => 'int',
		'level_id' => 'int',
		'level_name' => 'string',
		'parent' => 'int',
		'grand_parent' => 'int',
		'account' => 'float',
		'account_withdraw' => 'float',
		'account_withdraw_apply' => 'float',
		'status' => 'int',
		'create_time' => 'int',
		'audit_time' => 'int',
		'lock_time' => 'int',
		'one_fenxiao_order_num' => 'int',
		'one_fenxiao_order_money' => 'float',
		'one_child_num' => 'int',
		'one_child_fenxiao_num' => 'int',
		'two_child_fenxiao_num' => 'int',
		'total_commission' => 'float',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'fenxiao_id' => 'int',
		'fenxiao_no' => 'varchar',
		'fenxiao_name' => 'varchar',
		'mobile' => 'varchar',
		'member_id' => 'int',
		'level_id' => 'int',
		'level_name' => 'varchar',
		'parent' => 'int',
		'grand_parent' => 'int',
		'account' => 'decimal',
		'account_withdraw' => 'decimal',
		'account_withdraw_apply' => 'decimal',
		'status' => 'tinyint',
		'create_time' => 'timestamp',
		'audit_time' => 'timestamp',
		'lock_time' => 'timestamp',
		'one_fenxiao_order_num' => 'int',
		'one_fenxiao_order_money' => 'decimal',
		'one_child_num' => 'int',
		'one_child_fenxiao_num' => 'int',
		'two_child_fenxiao_num' => 'int',
		'total_commission' => 'decimal',
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
	protected $field = [
		'fenxiao_id',
		'fenxiao_no',
		'fenxiao_name',
		'mobile',
		'member_id',
		'level_id',
		'level_name',
		'parent',
		'grand_parent',
		'account',
		'account_withdraw',
		'account_withdraw_apply',
		'status',
		'create_time',
		'audit_time',
		'lock_time',
		'one_fenxiao_order_num',
		'one_fenxiao_order_money',
		'one_child_num',
		'one_child_fenxiao_num',
		'two_child_fenxiao_num',
		'total_commission',
	];
}
