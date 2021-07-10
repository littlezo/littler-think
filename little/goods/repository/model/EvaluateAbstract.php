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
 * @property evaluate_id $int 评价ID
 * @property site_id $int 站点id
 * @property website_id $int 分站id
 * @property order_id $int 订单ID
 * @property order_no $int 订单编号
 * @property order_goods_id $int 订单项ID
 * @property goods_id $int 商品ID
 * @property sku_id $int 商品skuid
 * @property sku_name $string 商品名称
 * @property sku_price $float 商品价格
 * @property sku_image $string 商品图片
 * @property content $string 评价内容
 * @property images $string 评价图片
 * @property explain_first $string 解释内容
 * @property member_id $int 评价人id
 * @property member_name $string 评价人名称
 * @property member_headimg $string 评价人头像
 * @property is_anonymous $int 0表示不是 1表示是匿名评价
 * @property scores $int 1-5分
 * @property again_content $string 追加评价内容
 * @property again_images $string 追评评价图片
 * @property again_explain $string 追加解释内容
 * @property explain_type $int 1好评2中评3差评
 * @property is_show $int 1显示 0隐藏
 * @property create_time $int 评价时间
 * @property again_time $int 追加评价时间
 * @property shop_desccredit $float 描述分值
 * @property shop_servicecredit $float 服务分值
 * @property shop_deliverycredit $float 配送分值
 */
abstract class EvaluateAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'goods_evaluate';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'evaluate_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'evaluate_id' => 'int',
		'site_id' => 'int',
		'website_id' => 'int',
		'order_id' => 'int',
		'order_no' => 'int',
		'order_goods_id' => 'int',
		'goods_id' => 'int',
		'sku_id' => 'int',
		'sku_name' => 'string',
		'sku_price' => 'float',
		'sku_image' => 'string',
		'content' => 'string',
		'images' => 'string',
		'explain_first' => 'string',
		'member_id' => 'int',
		'member_name' => 'string',
		'member_headimg' => 'string',
		'is_anonymous' => 'int',
		'scores' => 'int',
		'again_content' => 'string',
		'again_images' => 'string',
		'again_explain' => 'string',
		'explain_type' => 'int',
		'is_show' => 'int',
		'create_time' => 'int',
		'again_time' => 'int',
		'shop_desccredit' => 'float',
		'shop_servicecredit' => 'float',
		'shop_deliverycredit' => 'float',
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
	public $field = [
		'evaluate_id',
		'site_id',
		'website_id',
		'order_id',
		'order_no',
		'order_goods_id',
		'goods_id',
		'sku_id',
		'sku_name',
		'sku_price',
		'sku_image',
		'content',
		'images',
		'explain_first',
		'member_id',
		'member_name',
		'member_headimg',
		'is_anonymous',
		'scores',
		'again_content',
		'again_images',
		'again_explain',
		'explain_type',
		'is_show',
		'create_time',
		'again_time',
		'shop_desccredit',
		'shop_servicecredit',
		'shop_deliverycredit',
	];
}
