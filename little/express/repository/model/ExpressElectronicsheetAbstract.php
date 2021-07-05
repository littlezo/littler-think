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
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property id $int
 * @property site_id $int 店铺id
 * @property site_name $string 店铺名称
 * @property template_name $string 模板名称
 * @property company_id $int 物流公司id
 * @property company_name $string 物流公司名称
 * @property express_no $string 编码
 * @property customer_name $string CustomerName
 * @property customer_pwd $string CustomerPwd
 * @property send_site $string SendSite
 * @property send_staff $string SendStaff
 * @property month_code $string MonthCode
 * @property postage_payment_method $int 邮费支付方式（1现付 2到付 3月结）
 * @property is_notice $int 快递员上门揽件（0否 1是）
 * @property status $int 状态（0正常 -1不使用）
 * @property is_default $int 是否默认（0否 1是）
 * @property create_time $int
 * @property update_time $int
 * @property print_style $int 模板风格
 */
abstract class ExpressElectronicsheetAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'express_electronicsheet';

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
		'site_name' => 'string',
		'template_name' => 'string',
		'company_id' => 'int',
		'company_name' => 'string',
		'express_no' => 'string',
		'customer_name' => 'string',
		'customer_pwd' => 'string',
		'send_site' => 'string',
		'send_staff' => 'string',
		'month_code' => 'string',
		'postage_payment_method' => 'int',
		'is_notice' => 'int',
		'status' => 'int',
		'is_default' => 'int',
		'create_time' => 'int',
		'update_time' => 'int',
		'print_style' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = [];

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'id',
		'site_id',
		'site_name',
		'template_name',
		'company_id',
		'company_name',
		'express_no',
		'customer_name',
		'customer_pwd',
		'send_site',
		'send_staff',
		'month_code',
		'postage_payment_method',
		'is_notice',
		'status',
		'is_default',
		'create_time',
		'update_time',
		'print_style',
	];
}
