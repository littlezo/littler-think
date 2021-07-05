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
 * @property account_no $string 流水号
 * @property site_id $int 站点id
 * @property account_type $string 类型
 * @property account_data $float 金额
 * @property from_type $string 来源类型
 * @property type_name $string 类型名称
 * @property relate_tag $string 说明
 * @property create_time $int 创建时间
 * @property remark $string 说明
 */
abstract class ShopAccountAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'shop_account';

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
		'account_type' => 'string',
		'account_data' => 'float',
		'from_type' => 'string',
		'type_name' => 'string',
		'relate_tag' => 'string',
		'create_time' => 'int',
		'remark' => 'string',
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
		'account_no',
		'site_id',
		'account_type',
		'account_data',
		'from_type',
		'type_name',
		'relate_tag',
		'create_time',
		'remark',
	];
}
