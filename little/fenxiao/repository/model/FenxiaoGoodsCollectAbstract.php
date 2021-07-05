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
 * @property collect_id $int 主键
 * @property member_id $int 会员id
 * @property fenxiao_id $int 分销商id
 * @property goods_id $int 商品id
 * @property sku_id $int skuid
 * @property create_time $int 收藏时间
 * @property site_id $int 站点id
 */
abstract class FenxiaoGoodsCollectAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'fenxiao_goods_collect';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'collect_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'collect_id' => 'int',
		'member_id' => 'int',
		'fenxiao_id' => 'int',
		'goods_id' => 'int',
		'sku_id' => 'int',
		'create_time' => 'int',
		'site_id' => 'int',
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
	public $field = ['collect_id', 'member_id', 'fenxiao_id', 'goods_id', 'sku_id', 'create_time', 'site_id'];
}
