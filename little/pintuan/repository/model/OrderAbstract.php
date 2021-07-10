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

namespace little\pintuan\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int
 * @property pintuan_id $int 拼团id
 * @property order_id $int 订单id
 * @property order_no $string 订单编号
 * @property group_id $int 拼团分组id
 * @property pintuan_status $int 拼团状态(0未支付 1拼团失败 2组团中 3拼团成功)
 * @property order_type $int 订单类型
 * @property head_id $int 团长id
 * @property member_id $int 订单会员id
 * @property member_img $string 会员头像图
 * @property nickname $string 会员昵称
 */
abstract class OrderAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'pintuan_order';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'pintuan_id' => 'int',
		'order_id' => 'int',
		'order_no' => 'string',
		'group_id' => 'int',
		'pintuan_status' => 'int',
		'order_type' => 'int',
		'head_id' => 'int',
		'member_id' => 'int',
		'member_img' => 'string',
		'nickname' => 'string',
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
		'id',
		'pintuan_id',
		'order_id',
		'order_no',
		'group_id',
		'pintuan_status',
		'order_type',
		'head_id',
		'member_id',
		'member_img',
		'nickname',
	];
}
