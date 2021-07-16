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
use littler\traits\BaseOptionsTrait;
use littler\traits\RewriteTrait;

/**
 * @property cert_id $int
 * @property site_id $int 店铺id（申请为0）
 * @property cert_type $int 申请类型1.个人2.公司
 * @property company_name $string 公司名称
 * @property company_province_id $int 公司所在省
 * @property company_city_id $int 公司所在市
 * @property company_district_id $int 公司所在区/县
 * @property company_address $string 公司地址
 * @property company_full_address $string 公司完整地址
 * @property contacts_name $string 联系人姓名
 * @property contacts_mobile $string 联系人手机
 * @property contacts_card_no $string 联系人身份证
 * @property contacts_card_electronic_1 $string 申请人手持身份证电子版
 * @property contacts_card_electronic_2 $string 申请人身份证正面
 * @property contacts_card_electronic_3 $string 申请人身份证反面
 * @property business_licence_number $string 统一社会信用码
 * @property business_licence_number_electronic $string 营业执照电子版
 * @property business_sphere $string 法定经营范围
 * @property taxpayer_id $string 纳税人识别号
 * @property general_taxpayer $string 一般纳税人证明
 * @property tax_registration_certificate $string 税务登记证号
 * @property tax_registration_certificate_electronic $string 税务登记证号电子版
 * @property bank_account_name $string 银行开户名
 * @property bank_account_number $string 公司银行账号
 * @property bank_name $string 开户银行支行名称
 * @property bank_address $string 开户银行所在地
 * @property bank_code $string 支行联行号
 * @property bank_type $int 结算账户类型  1银行卡 2 支付宝
 * @property settlement_bank_account_name $string 结算银行开户名
 * @property settlement_bank_account_number $string 结算公司银行账号
 * @property settlement_bank_name $string 结算开户银行支行名称
 * @property settlement_bank_address $string 结算开户银行所在地
 */
abstract class CertAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'shop_cert';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'cert_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'cert_id' => 'int',
		'site_id' => 'int',
		'cert_type' => 'int',
		'company_name' => 'string',
		'company_province_id' => 'int',
		'company_city_id' => 'int',
		'company_district_id' => 'int',
		'company_address' => 'string',
		'company_full_address' => 'string',
		'contacts_name' => 'string',
		'contacts_mobile' => 'string',
		'contacts_card_no' => 'string',
		'contacts_card_electronic_1' => 'string',
		'contacts_card_electronic_2' => 'string',
		'contacts_card_electronic_3' => 'string',
		'business_licence_number' => 'string',
		'business_licence_number_electronic' => 'string',
		'business_sphere' => 'string',
		'taxpayer_id' => 'string',
		'general_taxpayer' => 'string',
		'tax_registration_certificate' => 'string',
		'tax_registration_certificate_electronic' => 'string',
		'bank_account_name' => 'string',
		'bank_account_number' => 'string',
		'bank_name' => 'string',
		'bank_address' => 'string',
		'bank_code' => 'string',
		'bank_type' => 'int',
		'settlement_bank_account_name' => 'string',
		'settlement_bank_account_number' => 'string',
		'settlement_bank_name' => 'string',
		'settlement_bank_address' => 'string',
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
		'cert_id',
		'site_id',
		'cert_type',
		'company_name',
		'company_province_id',
		'company_city_id',
		'company_district_id',
		'company_address',
		'company_full_address',
		'contacts_name',
		'contacts_mobile',
		'contacts_card_no',
		'contacts_card_electronic_1',
		'contacts_card_electronic_2',
		'contacts_card_electronic_3',
		'business_licence_number',
		'business_licence_number_electronic',
		'business_sphere',
		'taxpayer_id',
		'general_taxpayer',
		'tax_registration_certificate',
		'tax_registration_certificate_electronic',
		'bank_account_name',
		'bank_account_number',
		'bank_name',
		'bank_address',
		'bank_code',
		'bank_type',
		'settlement_bank_account_name',
		'settlement_bank_account_number',
		'settlement_bank_name',
		'settlement_bank_address',
	];
}
