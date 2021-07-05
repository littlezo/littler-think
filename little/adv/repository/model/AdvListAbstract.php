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
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property adv_id $int 主键
 * @property site_id $int 站点id
 * @property ap_id $int 广告位id
 * @property adv_title $string 广告内容描述
 * @property adv_url $string 广告链接
 * @property adv_image $string 广告内容图片
 * @property slide_sort $int 排序号
 * @property price $float 广告价格/月
 * @property background $string 背景色
 * @property start_time $int 开始时间
 */
abstract class AdvListAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'adv_list';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'adv_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'adv_id' => 'int',
		'site_id' => 'int',
		'ap_id' => 'int',
		'adv_title' => 'string',
		'adv_url' => 'string',
		'adv_image' => 'string',
		'slide_sort' => 'int',
		'price' => 'float',
		'background' => 'string',
		'start_time' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['adv_title', 'adv_url', 'background'];

	/**
	 * @var array $json JSON字段自动转数组
	 */
	protected $jsonAssoc = true;

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
		'adv_id',
		'site_id',
		'ap_id',
		'adv_title',
		'adv_url',
		'adv_image',
		'slide_sort',
		'price',
		'background',
		'start_time',
	];
}
