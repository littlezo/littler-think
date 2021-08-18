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
 * @property level_id $int 会员等级
 * @property level_name $string 等级名称
 * @property sort $int 等级排序列
 * @property level_money $float 升级金额
 * @property remark $string 备注
 * @property is_default $int 是否默认，0：否，1：是
 * @property is_diff $int 是否不差升级
 * @property invite_reward $float 邀请奖励
 * @property buy_ratio $float 兑换比例
 * @property is_region $int 是否允许申请区域代理
 * @property is_region_settle $int 开启代理佣金
 * @property is_shop $int 是否允许申请商家
 * @property is_shop_settle $int  开启商家佣金
 * @property is_seller $int 是否出券 1出券
 * @property is_hand $int 是否立即结算
 * @property settle_ratio $int 分佣比例
 * @property p_to_p $float 平推平收益比例（如：0.30 即30%）
 * @property s_to_b $float 小推大收益比例（如：0.30 即30%）
 * @property b_to_s $float 大推小收益比例（如：1.00 即100%）
 * @property status $int 状态 1启用
 */
abstract class LevelAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_level';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'level_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'level_id' => 'int',
		'level_name' => 'string',
		'sort' => 'int',
		'level_money' => 'float',
		'remark' => 'string',
		'is_default' => 'int',
		'is_diff' => 'int',
		'invite_reward' => 'float',
		'buy_ratio' => 'float',
		'is_region' => 'int',
		'is_region_settle' => 'int',
		'is_shop' => 'int',
		'is_shop_settle' => 'int',
		'is_seller' => 'int',
		'is_hand' => 'int',
		'settle_ratio' => 'int',
		'p_to_p' => 'float',
		's_to_b' => 'float',
		'b_to_s' => 'float',
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
	public $field = [
		'level_id',
		'level_name',
		'sort',
		'level_money',
		'remark',
		'is_default',
		'is_diff',
		'invite_reward',
		'buy_ratio',
		'is_region',
		'is_region_settle',
		'is_shop',
		'is_shop_settle',
		'is_seller',
		'is_hand',
		'settle_ratio',
		'p_to_p',
		's_to_b',
		'b_to_s',
		'status',
	];
}
