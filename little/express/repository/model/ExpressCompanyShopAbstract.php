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

namespace little\express\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property id $int
 * @property site_id $int 店铺id
 * @property company_id $int 物流公司id
 * @property content_json $string 打印内容
 * @property background_image $string 背景图
 * @property font_size $string 打印字体
 * @property width $string 宽度
 * @property height $string 高度
 * @property create_time $int 创建时间
 * @property modify_time $int 修改时间
 * @property scale $float 真实尺寸（mm）与显示尺寸（px）的比例
 * @property company_name $string 物流公司名称
 * @property logo $string logo
 */
abstract class ExpressCompanyShopAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'express_company_shop';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'site_id' => 'int',
		'company_id' => 'int',
		'content_json' => 'string',
		'background_image' => 'string',
		'font_size' => 'string',
		'width' => 'string',
		'height' => 'string',
		'create_time' => 'int',
		'modify_time' => 'int',
		'scale' => 'float',
		'company_name' => 'string',
		'logo' => 'string',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['content_json'];

	/**
	 * @var array $json JSON字段自动转数组
	 */
	protected $jsonAssoc = true;

	/**
	 * @var array $updateTime 关闭更新时间自动写入
	 */
	protected $updateTime = false;

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'id',
		'site_id',
		'company_id',
		'content_json',
		'background_image',
		'font_size',
		'width',
		'height',
		'create_time',
		'modify_time',
		'scale',
		'company_name',
		'logo',
	];
}
