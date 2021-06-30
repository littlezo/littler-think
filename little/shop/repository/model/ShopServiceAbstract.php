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

namespace little\shop\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property apply_id $int 主键
 * @property site_id $int 站点id
 * @property site_name $string 申请站点名称
 * @property service_type $string 申请服务类型
 * @property service_type_name $string 申请服务类型名称
 * @property status $int 申请状态0待审核1.已审核-1已拒绝
 * @property remark $string 同意或者拒绝理由
 * @property create_time $int 创建时间
 * @property audit_time $int 通过时间
 */
abstract class ShopServiceAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'shop_service';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'apply_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'apply_id' => 'int',
		'site_id' => 'int',
		'site_name' => 'string',
		'service_type' => 'string',
		'service_type_name' => 'string',
		'status' => 'int',
		'remark' => 'string',
		'create_time' => 'int',
		'audit_time' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'apply_id' => 'int unsigned',
		'site_id' => 'int',
		'site_name' => 'varchar',
		'service_type' => 'varchar',
		'service_type_name' => 'varchar',
		'status' => 'int',
		'remark' => 'varchar',
		'create_time' => 'timestamp',
		'audit_time' => 'timestamp',
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
	protected $field = [
		'apply_id',
		'site_id',
		'site_name',
		'service_type',
		'service_type_name',
		'status',
		'remark',
		'create_time',
		'audit_time',
	];
}
