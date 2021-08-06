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
use think\model\concern\SoftDelete;

/**
 * @property goods_id $int 商品id
 * @property goods_name $string 商品名称
 * @property site_id $int 所属店铺id
 * @property category_id $int 分类id
 * @property goods_image $string 商品主图路径
 * @property goods_content $string 商品详情
 * @property sku_id $int 默认规格
 * @property goods_state $int 商品状态（1.正常0下架）
 * @property verify_state $int 审核状态（1 已审核 0 待审核 10 违规下架 -1 审核中 -2 审核失败）
 * @property verify_remark $string 商品违规或审核失败说明
 * @property is_free_freight $int 是否免邮
 * @property freight_free $float 运费
 * @property introduction $string 促销语
 * @property max_buy $int 最多购买数
 * @property min_buy $int 最低购买数
 * @property limit_buy $int 限制购买数
 * @property keywords $string 关键词
 * @property label $string 商品标签
 * @property sort $int 排序
 * @property seckill_id $int 秒杀id
 * @property pintuan_id $int 拼团id
 * @property sale_num $int 销量
 * @property evaluate $int 评价数
 * @property goods_service_rate $float 商品服务费
 * @property is_selected $int 0 否 1是   是否精选
 * @property is_benefits $int 0 否  1是  是否实惠
 * @property is_new $int 0 否  1是   新品
 * @property is_recommend $int 0 否  1是  是否推荐
 * @property goods_spec $string 商品规格
 * @property create_time $int 创建时间
 * @property update_time $int 修改时间
 * @property delete_time $int 删除时间
 */
abstract class DetailAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;
	use SoftDelete;

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
		'site_id' => 'int',
		'category_id' => 'int',
		'goods_image' => 'string',
		'goods_content' => 'string',
		'sku_id' => 'int',
		'goods_state' => 'int',
		'verify_state' => 'int',
		'verify_remark' => 'string',
		'is_free_freight' => 'int',
		'freight_free' => 'float',
		'introduction' => 'string',
		'max_buy' => 'int',
		'min_buy' => 'int',
		'limit_buy' => 'int',
		'keywords' => 'string',
		'label' => 'string',
		'sort' => 'int',
		'seckill_id' => 'int',
		'pintuan_id' => 'int',
		'sale_num' => 'int',
		'evaluate' => 'int',
		'goods_service_rate' => 'float',
		'is_selected' => 'int',
		'is_benefits' => 'int',
		'is_new' => 'int',
		'is_recommend' => 'int',
		'goods_spec' => 'string',
		'create_time' => 'int',
		'update_time' => 'int',
		'delete_time' => 'int',
	];

	/**
	 * @var array $json JSON类型字段
	 */
	protected $json = ['goods_image', 'keywords', 'goods_spec'];

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
		'site_id',
		'category_id',
		'goods_image',
		'goods_content',
		'sku_id',
		'goods_state',
		'verify_state',
		'verify_remark',
		'is_free_freight',
		'freight_free',
		'introduction',
		'max_buy',
		'min_buy',
		'limit_buy',
		'keywords',
		'label',
		'sort',
		'seckill_id',
		'pintuan_id',
		'sale_num',
		'evaluate',
		'goods_service_rate',
		'is_selected',
		'is_benefits',
		'is_new',
		'is_recommend',
		'goods_spec',
		'create_time',
		'update_time',
		'delete_time',
	];
}
