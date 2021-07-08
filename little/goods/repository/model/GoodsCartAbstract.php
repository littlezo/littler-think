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

namespace little\goods\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property cart_id $int
 * @property site_id $int 站点id
 * @property member_id $int 会员id
 * @property sku_id $int sku_id
 * @property num $int 数量
 */
abstract class GoodsCartAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'goods_cart';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'cart_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = ['cart_id' => 'int', 'site_id' => 'int', 'member_id' => 'int', 'sku_id' => 'int', 'num' => 'int'];

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
	public $field = ['cart_id', 'site_id', 'member_id', 'sku_id', 'num'];
}
