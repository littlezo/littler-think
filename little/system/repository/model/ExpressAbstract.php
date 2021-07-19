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

namespace little\system\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property company_id $int
 * @property company_name $string 物流公司名称
 * @property logo $string 物流公司logo
 * @property url $string 物流公司网址
 * @property sort $int 排序
 * @property express_no_kdniao $string 快递鸟编码
 * @property express_no_kd100_free $string 快递100编码
 * @property express_no_kd100 $string 快递100编码
 * @property express_no_cainiao $string 菜鸟物流接口编码
 * @property express_no_ext $string 快递查询接口编码
 * @property content_json $string 打印内容
 * @property background_image $string 背景图
 * @property font_size $int 打印字体
 * @property width $int 宽度
 * @property height $int 高度
 * @property scale $float 真实尺寸（mm）与显示尺寸（px）的比例
 * @property create_time $int 创建时间
 * @property update_time $int 修改时间
 * @property is_electronicsheet $int 是否支持电子面单（0不支持  1支持）
 * @property print_style $string 电子面单打印风格
 */
abstract class ExpressAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'system_express';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'company_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'company_id' => 'int',
		'company_name' => 'string',
		'logo' => 'string',
		'url' => 'string',
		'sort' => 'int',
		'express_no_kdniao' => 'string',
		'express_no_kd100_free' => 'string',
		'express_no_kd100' => 'string',
		'express_no_cainiao' => 'string',
		'express_no_ext' => 'string',
		'content_json' => 'string',
		'background_image' => 'string',
		'font_size' => 'int',
		'width' => 'int',
		'height' => 'int',
		'scale' => 'float',
		'create_time' => 'int',
		'update_time' => 'int',
		'is_electronicsheet' => 'int',
		'print_style' => 'string',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'company_id',
		'company_name',
		'logo',
		'url',
		'sort',
		'express_no_kdniao',
		'express_no_kd100_free',
		'express_no_kd100',
		'express_no_cainiao',
		'express_no_ext',
		'content_json',
		'background_image',
		'font_size',
		'width',
		'height',
		'scale',
		'create_time',
		'update_time',
		'is_electronicsheet',
		'print_style',
	];
}
