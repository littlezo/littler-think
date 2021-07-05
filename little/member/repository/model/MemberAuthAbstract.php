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
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property auth_id $int 主键
 * @property member_id $int 会员ID
 * @property member_username $string 会员用户名
 * @property auth_card_name $string 实名姓名
 * @property auth_card_no $string 实名身份证
 * @property auth_card_hand $string 申请人手持身份证电子版
 * @property auth_card_front $string 申请人身份证正面
 * @property auth_card_back $string 申请人身份证反面
 * @property status $int 审核状态0待审核1.已审核-1已拒绝
 * @property remark $string 审核意见
 * @property create_time $int 创建时间
 * @property audit_time $int 审核通过时间
 */
abstract class MemberAuthAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_auth';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'auth_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'auth_id' => 'int',
		'member_id' => 'int',
		'member_username' => 'string',
		'auth_card_name' => 'string',
		'auth_card_no' => 'string',
		'auth_card_hand' => 'string',
		'auth_card_front' => 'string',
		'auth_card_back' => 'string',
		'status' => 'int',
		'remark' => 'string',
		'create_time' => 'int',
		'audit_time' => 'int',
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
		'auth_id',
		'member_id',
		'member_username',
		'auth_card_name',
		'auth_card_no',
		'auth_card_hand',
		'auth_card_front',
		'auth_card_back',
		'status',
		'remark',
		'create_time',
		'audit_time',
	];
}
