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
 * @property goods_sku_id $int
 * @property goods_id $int 商品ID
 * @property sku_id $int 商品skuID
 * @property level_id $int 分销等级ID
 * @property one_rate $float 一级佣金比例
 * @property one_money $float 一级佣金金额
 * @property two_rate $float 二级佣金比例
 * @property two_money $float 二级佣金金额
 * @property three_rate $float 三级佣金比例
 * @property three_money $float 三级佣金金额
 */
abstract class FenxiaoGoodsSkuAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'fenxiao_goods_sku';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'goods_sku_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'goods_sku_id' => 'int',
		'goods_id' => 'int',
		'sku_id' => 'int',
		'level_id' => 'int',
		'one_rate' => 'float',
		'one_money' => 'float',
		'two_rate' => 'float',
		'two_money' => 'float',
		'three_rate' => 'float',
		'three_money' => 'float',
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
		'goods_sku_id',
		'goods_id',
		'sku_id',
		'level_id',
		'one_rate',
		'one_money',
		'two_rate',
		'two_money',
		'three_rate',
		'three_money',
	];
}
