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
 * @property id $int
 * @property account_no $string 账单编号
 * @property fenxiao_id $int 分销商ID
 * @property fenxiao_name $string 分销商名称
 * @property money $float 费用
 * @property type $string 类型（withdraw提现 order订单结算）
 * @property type_name $string 类型名称
 * @property relate_id $int 关联id
 * @property create_time $int 时间
 */
abstract class FenxiaoAccountAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'fenxiao_account';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'account_no' => 'string',
		'fenxiao_id' => 'int',
		'fenxiao_name' => 'string',
		'money' => 'float',
		'type' => 'string',
		'type_name' => 'string',
		'relate_id' => 'int',
		'create_time' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'id' => 'int unsigned',
		'account_no' => 'varchar',
		'fenxiao_id' => 'int',
		'fenxiao_name' => 'varchar',
		'money' => 'decimal',
		'type' => 'varchar',
		'type_name' => 'varchar',
		'relate_id' => 'int',
		'create_time' => 'timestamp',
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
		'account_no',
		'fenxiao_id',
		'fenxiao_name',
		'money',
		'type',
		'type_name',
		'relate_id',
		'create_time',
	];
}
