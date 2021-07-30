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
 * @property goods_id $int 商品id
 * @property goods_name $string 商品名称
 * @property goods_class $int 商品种类1.实物商品2.虚拟商品3.卡券商品
 * @property goods_attr_class $int 商品类型id
 * @property site_id $int 所属店铺id
 * @property category_id $string 分类id
 * @property goods_image $string 商品主图路径
 * @property goods_content $string 商品详情
 * @property is_own $int 是否自营
 * @property goods_state $int 商品状态（1.正常0下架）
 * @property verify_state $int 审核状态（1 已审核 0 待审核 10 违规下架 -1 审核中 -2 审核失败）
 * @property verify_state_remark $string 商品违规或审核失败说明
 * @property price $float 商品价格（取第一个sku）
 * @property market_price $float 市场价格（取第一个sku）
 * @property cost_price $float 成本价（取第一个sku）
 * @property goods_stock $int 商品库存（总和）
 * @property goods_stock_alarm $int 库存预警
 * @property is_free_shipping $int 是否免邮
 * @property goods_spec_format $string 商品规格格式
 * @property goods_attr_format $string 商品属性格式
 * @property is_delete $int 是否已经删除
 * @property introduction $string 促销语
 * @property keywords $string 关键词
 * @property unit $string 单位
 * @property sort $int 排序
 * @property create_time $int 创建时间
 * @property update_time $int 修改时间
 * @property video_url $string 视频
 * @property seckill_id $int 秒杀id
 * @property pintuan_id $int 拼团id
 * @property sale_num $int 销量
 * @property evaluate $int 评价数
 * @property evaluate_shaitu $int 评价晒图数
 * @property evaluate_shipin $int 评价视频数
 * @property evaluate_zhuiping $int 评价追评数
 * @property evaluate_haoping $int 评价好评数
 * @property evaluate_zhongping $int 评价中评数
 * @property evaluate_chaping $int 评价差评数
 * @property goods_bv $int 商品BV
 * @property sku_id $int 第一个商品sku_id
 * @property max_buy $int 限购
 * @property min_buy $int 起购
 */
abstract class DetailAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'goods_detail';

	/**
	 * @var string $pk 主键
	 */
	public $pk = 'goods_id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'goods_id' => 'int',
		'goods_name' => 'string',
		'goods_class' => 'int',
		'goods_attr_class' => 'int',
		'site_id' => 'int',
		'category_id' => 'string',
		'goods_image' => 'string',
		'goods_content' => 'string',
		'is_own' => 'int',
		'goods_state' => 'int',
		'verify_state' => 'int',
		'verify_state_remark' => 'string',
		'price' => 'float',
		'market_price' => 'float',
		'cost_price' => 'float',
		'goods_stock' => 'int',
		'goods_stock_alarm' => 'int',
		'is_free_shipping' => 'int',
		'goods_spec_format' => 'string',
		'goods_attr_format' => 'string',
		'is_delete' => 'int',
		'introduction' => 'string',
		'keywords' => 'string',
		'unit' => 'string',
		'sort' => 'int',
		'create_time' => 'int',
		'update_time' => 'int',
		'video_url' => 'string',
		'seckill_id' => 'int',
		'pintuan_id' => 'int',
		'sale_num' => 'int',
		'evaluate' => 'int',
		'evaluate_shaitu' => 'int',
		'evaluate_shipin' => 'int',
		'evaluate_zhuiping' => 'int',
		'evaluate_haoping' => 'int',
		'evaluate_zhongping' => 'int',
		'evaluate_chaping' => 'int',
		'goods_bv' => 'int',
		'sku_id' => 'int',
		'max_buy' => 'int',
		'min_buy' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['category_id'];

	/**
	 * @var array $json JSON字段自动转数组
	 */
	protected $jsonAssoc = true;

	/**
	 * @var array $field 允许写入字段
	 */
	public $field = [
		'goods_id',
		'goods_name',
		'goods_class',
		'goods_attr_class',
		'site_id',
		'category_id',
		'goods_image',
		'goods_content',
		'is_own',
		'goods_state',
		'verify_state',
		'verify_state_remark',
		'price',
		'market_price',
		'cost_price',
		'goods_stock',
		'goods_stock_alarm',
		'is_free_shipping',
		'goods_spec_format',
		'goods_attr_format',
		'is_delete',
		'introduction',
		'keywords',
		'unit',
		'sort',
		'create_time',
		'update_time',
		'video_url',
		'seckill_id',
		'pintuan_id',
		'sale_num',
		'evaluate',
		'evaluate_shaitu',
		'evaluate_shipin',
		'evaluate_zhuiping',
		'evaluate_haoping',
		'evaluate_zhongping',
		'evaluate_chaping',
		'goods_bv',
		'sku_id',
		'max_buy',
		'min_buy',
	];
}
