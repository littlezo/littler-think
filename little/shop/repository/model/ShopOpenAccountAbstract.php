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

namespace little\shop\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property id $int
 * @property account_no $string 账单编号
 * @property site_id $int 店铺ID
 * @property site_name $string 店铺名称
 * @property money $float 费用
 * @property type $int 类型（1开店  2续签）
 * @property type_name $string 类型名称
 * @property relate_id $int 关联开店续签id
 * @property create_time $int 时间
 * @property website_id $int 对应分站
 * @property website_name $string 分站名称
 * @property website_commission $float 分站分成
 * @property settlement_id $int 分站结算id
 */
abstract class ShopOpenAccountAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'shop_open_account';

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
		'site_id' => 'int',
		'site_name' => 'string',
		'money' => 'float',
		'type' => 'int',
		'type_name' => 'string',
		'relate_id' => 'int',
		'create_time' => 'int',
		'website_id' => 'int',
		'website_name' => 'string',
		'website_commission' => 'float',
		'settlement_id' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'id' => 'int unsigned',
		'account_no' => 'varchar',
		'site_id' => 'int',
		'site_name' => 'varchar',
		'money' => 'decimal',
		'type' => 'tinyint',
		'type_name' => 'varchar',
		'relate_id' => 'int',
		'create_time' => 'timestamp',
		'website_id' => 'int',
		'website_name' => 'varchar',
		'website_commission' => 'decimal',
		'settlement_id' => 'int',
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
		'site_id',
		'site_name',
		'money',
		'type',
		'type_name',
		'relate_id',
		'create_time',
		'website_id',
		'website_name',
		'website_commission',
		'settlement_id',
	];
}
