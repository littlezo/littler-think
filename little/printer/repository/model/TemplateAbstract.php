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
 * @property template_id $int
 * @property site_id $int 站点id
 * @property site_name $string 站点名
 * @property template_type $string 模板类型（预留字段）
 * @property template_name $string 模板名称
 * @property title $string 小票名称
 * @property head $int 头部内容
 * @property buy_notes $int 买家留言（0否 1是）
 * @property seller_notes $int 卖家留言（0否  1是）
 * @property buy_name $int 买家姓名
 * @property buy_mobile $int 买家联系电话
 * @property buy_address $int 买家地址
 * @property shop_mobile $int 商家联系电话
 * @property shop_address $int 商家地址
 * @property shop_qrcode $int 商家二维码
 * @property qrcode_url $string 二维码链接
 * @property bottom $string 底部内容
 * @property create_time $int
 * @property update_time $int
 */
abstract class TemplateAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'printer_template';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'template_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'template_id' => 'int',
		'site_id' => 'int',
		'site_name' => 'string',
		'template_type' => 'string',
		'template_name' => 'string',
		'title' => 'string',
		'head' => 'int',
		'buy_notes' => 'int',
		'seller_notes' => 'int',
		'buy_name' => 'int',
		'buy_mobile' => 'int',
		'buy_address' => 'int',
		'shop_mobile' => 'int',
		'shop_address' => 'int',
		'shop_qrcode' => 'int',
		'qrcode_url' => 'string',
		'bottom' => 'string',
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
		'template_id',
		'site_id',
		'site_name',
		'template_type',
		'template_name',
		'title',
		'head',
		'buy_notes',
		'seller_notes',
		'buy_name',
		'buy_mobile',
		'buy_address',
		'shop_mobile',
		'shop_address',
		'shop_qrcode',
		'qrcode_url',
		'bottom',
		'create_time',
		'update_time',
	];
}
