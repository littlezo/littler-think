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

namespace little\store\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property store_id $int 门店站点id
 * @property store_name $string 门店名称
 * @property telphone $string 联系电话
 * @property store_image $string 门店图片
 * @property site_id $int 商家id
 * @property site_name $string 站点名称
 * @property status $int 状态
 * @property province_id $int 省id
 * @property city_id $int 市id
 * @property district_id $int 区县id
 * @property community_id $int 社区id
 * @property address $string 地址
 * @property full_address $string 详细地址
 * @property longitude $string 经度
 * @property latitude $string 纬度
 * @property is_pickup $int 是否启用自提
 * @property is_o2o $int 是否启用本地配送
 * @property open_date $string 营业时间
 * @property o2o_fee_json $string 配送费用设置
 * @property create_time $int 创建时间
 * @property update_time $int 修改时间
 * @property username $string 门店管理员
 * @property order_money $float 付款后订单金额
 * @property order_complete_money $float 订单完成-订单金额
 * @property order_num $int 订单数
 * @property order_complete_num $int 订单完成数量
 * @property is_frozen $int 是否冻结0-未冻结 1已冻结
 */
abstract class StoreStoreAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'store_store';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'store_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'store_id' => 'int',
		'store_name' => 'string',
		'telphone' => 'string',
		'store_image' => 'string',
		'site_id' => 'int',
		'site_name' => 'string',
		'status' => 'int',
		'province_id' => 'int',
		'city_id' => 'int',
		'district_id' => 'int',
		'community_id' => 'int',
		'address' => 'string',
		'full_address' => 'string',
		'longitude' => 'string',
		'latitude' => 'string',
		'is_pickup' => 'int',
		'is_o2o' => 'int',
		'open_date' => 'string',
		'o2o_fee_json' => 'string',
		'create_time' => 'int',
		'update_time' => 'int',
		'username' => 'string',
		'order_money' => 'float',
		'order_complete_money' => 'float',
		'order_num' => 'int',
		'order_complete_num' => 'int',
		'is_frozen' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'store_id',
		'store_name',
		'telphone',
		'store_image',
		'site_id',
		'site_name',
		'status',
		'province_id',
		'city_id',
		'district_id',
		'community_id',
		'address',
		'full_address',
		'longitude',
		'latitude',
		'is_pickup',
		'is_o2o',
		'open_date',
		'o2o_fee_json',
		'create_time',
		'update_time',
		'username',
		'order_money',
		'order_complete_money',
		'order_num',
		'order_complete_num',
		'is_frozen',
	];
}
