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
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int
 * @property site_id $int 站点id
 * @property order_id $int 订单id
 * @property order_goods_id_array $string 订单项商品组合列表
 * @property goods_id_array $string 商品组合列表
 * @property package_name $string 包裹名称  （包裹- 1 包裹 - 2）
 * @property delivery_type $int 发货方式1 需要物流 0无需物流
 * @property express_company_id $int 快递公司id
 * @property express_company_name $string 物流公司名称
 * @property delivery_no $string 运单编号
 * @property delivery_time $int 发货时间
 * @property member_id $int 会员id
 * @property member_name $string 会员名称
 * @property express_company_image $string 发货公司图片
 * @property type $string 发货方式（manual 手动发货  electronicsheet 电子面单发货）
 * @property template_id $int 电子面单模板id
 * @property template_name $string 电子面单模板名称
 */
abstract class InformationAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'express_information';

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
		'order_goods_id_array' => 'string',
		'goods_id_array' => 'string',
		'package_name' => 'string',
		'delivery_type' => 'int',
		'express_company_id' => 'int',
		'express_company_name' => 'string',
		'delivery_no' => 'string',
		'delivery_time' => 'int',
		'member_id' => 'int',
		'member_name' => 'string',
		'express_company_image' => 'string',
		'type' => 'string',
		'template_id' => 'int',
		'template_name' => 'string',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['order_goods_id_array', 'goods_id_array'];

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
		'id',
		'site_id',
		'order_id',
		'order_goods_id_array',
		'goods_id_array',
		'package_name',
		'delivery_type',
		'express_company_id',
		'express_company_name',
		'delivery_no',
		'delivery_time',
		'member_id',
		'member_name',
		'express_company_image',
		'type',
		'template_id',
		'template_name',
	];
}
