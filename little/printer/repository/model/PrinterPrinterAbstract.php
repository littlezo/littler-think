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

namespace little\printer\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property printer_id $int
 * @property site_id $int 站点id
 * @property brand $string 小票打印机品牌（365 飞鹤 易联云）
 * @property printer_name $string 打印机名称
 * @property printer_code $string 打印机编号
 * @property printer_key $string 打印机秘钥
 * @property open_id $string 开发者id
 * @property apikey $string 开发者密钥
 * @property print_num $int 打印张数
 * @property order_type $string 打印的订单类型
 * @property template_id $int 模板id
 * @property create_time $int
 * @property update_time $int
 */
abstract class PrinterPrinterAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'printer_printer';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'printer_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'printer_id' => 'int',
		'site_id' => 'int',
		'brand' => 'string',
		'printer_name' => 'string',
		'printer_code' => 'string',
		'printer_key' => 'string',
		'open_id' => 'string',
		'apikey' => 'string',
		'print_num' => 'int',
		'order_type' => 'string',
		'template_id' => 'int',
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
		'printer_id',
		'site_id',
		'brand',
		'printer_name',
		'printer_code',
		'printer_key',
		'open_id',
		'apikey',
		'print_num',
		'order_type',
		'template_id',
		'create_time',
		'update_time',
	];
}
