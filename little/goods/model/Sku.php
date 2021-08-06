<?php

/**
 * #logic 做事不讲究逻辑，再努力也只是重复犯错
 * ## 何为相思：不删不聊不打扰，可否具体点：曾爱过。何为遗憾：你来我往皆过客，可否具体点：再无你。
 * ## 只要思想不滑稽，方法总比苦难多！
 * @version 1.0.0
 * @author @小小只^v^ <littlezov@qq.com>  littlezov@qq.com
 * @contact  littlezov@qq.com
 * @see     https://github.com/littlezo
 * @document https://github.com/littlezo/wiki
 * @license  https://github.com/littlezo/MozillaPublicLicense/blob/main/LICENSE
 */

declare(strict_types=1);

namespace little\goods\model;

use little\goods\repository\model\SkuAbstract;

/**
 * 商品SKU 模型.
 */
class Sku extends SkuAbstract
{
	/**
	 * @var array 关联预载
	 */
	public $with = [];

	/**
	 * @var array 列表字段映射
	 */
	public $table_schema = [
		'columns' => [
			[
				'title' => 'ID',
				'dataIndex' => 'sku_id',
				'defaultHidden' => true,
			],
			[
				'title' => '规格名称',
				'dataIndex' => 'sku_name',
				'editRow'=> true,
			],
			[
				'title' => '规格图片',
				'dataIndex' => 'sku_image',
				'editRow'=> true,
			],
			[
				'title' => '售价',
				'dataIndex' => 'price',
				'editRow'=> true,
			],
			[
				'title' => '市场价',
				'dataIndex' => 'market_price',
				'editRow'=> true,
			],
			[
				'title' => '成本价',
				'dataIndex' => 'cost_price',
				'editRow'=> true,
			],
			[
				'title' => '库存',
				'dataIndex' => 'stock',
				'editRow'=> true,
			],
			[
				'title' => '商品id',
				'dataIndex' => 'goods_id',
				'defaultHidden' => true,
			],
			[
				'title' => '库存预警',
				'dataIndex' => 'stock_alarm',
				'editRow'=> true,
			],
			[
				'title' => '单位',
				'dataIndex' => 'unit',
				'editRow'=> true,
			],
		],
		'formConfig' => [],
		'pagination' => false,
		'striped' => true,
		'bordered' => true,
		'showIndexColumn' => false,
		'canResize' => true,
		'rowKey' => 'sku_id',
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'baseColProps' => ['xxl' => 6, 'xl' => 8, 'lg' => 12, 'md' => 34],
		'schemas' => [['field' => 'sku_id', 'label' => 'ID', 'component' => 'Input']],
	];

	/**
	 * @var array 增加表单字段映射
	 */
	public $form_schema = [
		'labelWidth' => 120,
		'baseColProps' => ['xxl' => 6, 'xl' => 8, 'lg' => 12, 'md' => 34],
		'schemas' => [
			['field' => 'sku_name', 'label' => '商品sku名称', 'component' => 'Input', 'required' => true],
			['field' => 'price', 'label' => '售价', 'component' => 'Input', 'required' => true],
			['field' => 'market_price', 'label' => '市场价', 'component' => 'Input', 'required' => true],
			['field' => 'cost_price', 'label' => '成本价', 'component' => 'Input', 'required' => true],
			['field' => 'stock', 'label' => '规格库存', 'component' => 'Input', 'required' => true],
			['field' => 'click_num', 'label' => '点击量', 'component' => 'Input', 'required' => true],
			['field' => 'sale_num', 'label' => '销量', 'component' => 'Input', 'required' => true],
			['field' => 'collect_num', 'label' => '收藏量', 'component' => 'Input', 'required' => true],
			['field' => 'sku_image', 'label' => '规格图片', 'component' => 'Input', 'required' => true],
			['field' => 'goods_id', 'label' => '商品id', 'component' => 'Input', 'required' => true],
			['field' => 'stock_alarm', 'label' => '库存预警', 'component' => 'Input', 'required' => true],
			['field' => 'unit', 'label' => '单位', 'component' => 'Input', 'required' => true],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];
}
