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
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property id $int
 * @property site_id $int 店铺id
 * @property order_id $int 订单id
 * @property order_no $string 订单编号
 * @property sku_id $int 商品sku_id
 * @property sku_name $string 商品名称
 * @property code $string 虚拟商品编码
 * @property is_veirfy $int 是否已经核销
 * @property verify_time $int 核销时间
 * @property member_id $int 所属人
 * @property sku_image $string 虚拟商品图片
 */
abstract class GoodsVirtualAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'goods_virtual';

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
		'order_id' => 'int',
		'order_no' => 'string',
		'sku_id' => 'int',
		'sku_name' => 'string',
		'code' => 'string',
		'is_veirfy' => 'int',
		'verify_time' => 'int',
		'member_id' => 'int',
		'sku_image' => 'string',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'id' => 'int',
		'site_id' => 'int',
		'order_id' => 'int',
		'order_no' => 'varchar',
		'sku_id' => 'int',
		'sku_name' => 'varchar',
		'code' => 'varchar',
		'is_veirfy' => 'int',
		'verify_time' => 'timestamp',
		'member_id' => 'int',
		'sku_image' => 'varchar',
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
	protected $field = [
		'id',
		'site_id',
		'order_id',
		'order_no',
		'sku_id',
		'sku_name',
		'code',
		'is_veirfy',
		'verify_time',
		'member_id',
		'sku_image',
	];
}
