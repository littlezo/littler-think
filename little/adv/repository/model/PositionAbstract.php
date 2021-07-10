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

namespace little\adv\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property ap_id $int 广告位置id
 * @property site_id $int 站点id
 * @property ap_name $string 广告位置名
 * @property ap_intro $string 广告位简介
 * @property ap_height $int 广告位高度
 * @property ap_width $int 广告位宽度
 * @property default_content $string
 * @property ap_background_color $string 广告位背景色 默认白色
 * @property type $int 广告位所在位置类型   1 pc端  2 手机端
 * @property keyword $string 关键字
 */
abstract class PositionAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'adv_position';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'ap_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'ap_id' => 'int',
		'site_id' => 'int',
		'ap_name' => 'string',
		'ap_intro' => 'string',
		'ap_height' => 'int',
		'ap_width' => 'int',
		'default_content' => 'string',
		'ap_background_color' => 'string',
		'type' => 'int',
		'keyword' => 'string',
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
		'ap_id',
		'site_id',
		'ap_name',
		'ap_intro',
		'ap_height',
		'ap_width',
		'default_content',
		'ap_background_color',
		'type',
		'keyword',
	];
}
