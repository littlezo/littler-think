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
 * @property id $int
 * @property member_id $int 用户id
 * @property account_type $string 账户类型
 * @property account_data $float 账户数据
 * @property from_type $string 来源类型
 * @property type_name $string 来源类型名称
 * @property type_tag $string 关联关键字
 * @property remark $string 备注信息
 * @property create_time $int 创建时间
 * @property username $string 用户名
 * @property mobile $string 手机
 * @property email $string 邮箱
 */
abstract class MemberAccountAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'member_account';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'member_id' => 'int',
		'account_type' => 'string',
		'account_data' => 'float',
		'from_type' => 'string',
		'type_name' => 'string',
		'type_tag' => 'string',
		'remark' => 'string',
		'create_time' => 'int',
		'username' => 'string',
		'mobile' => 'string',
		'email' => 'string',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'id' => 'int unsigned',
		'member_id' => 'int',
		'account_type' => 'varchar',
		'account_data' => 'decimal',
		'from_type' => 'varchar',
		'type_name' => 'varchar',
		'type_tag' => 'varchar',
		'remark' => 'varchar',
		'create_time' => 'timestamp',
		'username' => 'varchar',
		'mobile' => 'varchar',
		'email' => 'varchar',
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
		'id',
		'member_id',
		'account_type',
		'account_data',
		'from_type',
		'type_name',
		'type_tag',
		'remark',
		'create_time',
		'username',
		'mobile',
		'email',
	];
}
