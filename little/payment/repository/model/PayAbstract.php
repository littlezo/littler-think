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

namespace little\payment\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property id $int 主键
 * @property site_id $int 站点id
 * @property out_trade_no $string 支付流水号
 * @property pay_type $string 支付方式
 * @property trade_no $string 交易单号
 * @property pay_no $string 支付账号
 * @property pay_body $string 支付主体
 * @property pay_detail $string 支付详情
 * @property pay_money $float 支付金额
 * @property pay_voucher $string 支付票据
 * @property pay_status $int 支付状态（0.待支付 1. 支付中 2. 已支付 -1已取消）
 * @property return_url $string 同步回调网址
 * @property event $string 支付成功后事件(事件，网址)
 * @property mch_info $string 商户信息
 * @property create_time $int 创建时间
 * @property pay_time $int 支付时间
 */
abstract class PayAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'payment_pay';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'site_id' => 'int',
		'out_trade_no' => 'string',
		'pay_type' => 'string',
		'trade_no' => 'string',
		'pay_no' => 'string',
		'pay_body' => 'string',
		'pay_detail' => 'string',
		'pay_money' => 'float',
		'pay_voucher' => 'string',
		'pay_status' => 'int',
		'return_url' => 'string',
		'event' => 'string',
		'mch_info' => 'string',
		'create_time' => 'int',
		'pay_time' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['pay_body', 'pay_detail', 'pay_voucher', 'mch_info'];

	/**
	 * @var array $json JSON字段自动转数组
	 */
	protected $jsonAssoc = true;

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
		'out_trade_no',
		'pay_type',
		'trade_no',
		'pay_no',
		'pay_body',
		'pay_detail',
		'pay_money',
		'pay_voucher',
		'pay_status',
		'return_url',
		'event',
		'mch_info',
		'create_time',
		'pay_time',
	];
}
