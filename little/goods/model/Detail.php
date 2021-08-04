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

use little\goods\repository\model\DetailAbstract;

/**
 * 商品列表 模型.
 */
class Detail extends DetailAbstract
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
				'dataIndex' => 'goods_id',
				'width' => 80,
				'fixed' => 'left',
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品名称',
				'dataIndex' => 'goods_name',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '所属店铺id',
				'dataIndex' => 'site_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '分类id',
				'dataIndex' => 'category_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品主图路径',
				'dataIndex' => 'goods_image',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品详情',
				'dataIndex' => 'goods_content',
				'width' => 80,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => true,
			],
			[
				'title' => '默认规格',
				'dataIndex' => 'sku_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品状态（1.正常0下架）',
				'dataIndex' => 'goods_state',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '审核状态（1 已审核 0 待审核 10 违规下架 -1 审核中 -2 审核失败）',
				'dataIndex' => 'verify_state',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品违规或审核失败说明',
				'dataIndex' => 'verify_remark',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否免邮',
				'dataIndex' => 'is_free_shipping',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '促销语',
				'dataIndex' => 'introduction',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '关键词',
				'dataIndex' => 'keywords',
				'width' => 80,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => true,
			],
			[
				'title' => '商品标签',
				'dataIndex' => 'label',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '排序',
				'dataIndex' => 'sort',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '秒杀id',
				'dataIndex' => 'seckill_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '拼团id',
				'dataIndex' => 'pintuan_id',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '销量',
				'dataIndex' => 'sale_num',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '评价数',
				'dataIndex' => 'evaluate',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '商品服务费',
				'dataIndex' => 'goods_service_rate',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '0 否 1是   是否精选',
				'dataIndex' => 'is_selected',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '0 否  1是  是否实惠',
				'dataIndex' => 'is_benefits',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '0 否  1是   新品',
				'dataIndex' => 'is_new',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '0 否  1是  是否推荐',
				'dataIndex' => 'is_recommend',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '创建时间',
				'dataIndex' => 'create_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '修改时间',
				'dataIndex' => 'update_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '删除时间',
				'dataIndex' => 'delete_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
		],
		'formConfig' => [],
		'pagination' => true,
		'striped' => true,
		'useSearchForm' => true,
		'showTableSetting' => true,
		'bordered' => true,
		'showIndexColumn' => false,
		'canResize' => true,
		'rowKey' => 'goods_id',
		'searchInfo' => ['order' => 'asc'],
		'actionColumn' => [
			'width' => 100,
			'title' => '操作',
			'dataIndex' => 'action',
			'slots' => ['customRender' => 'action'],
			'fixed' => 'right',
		],
		'dropActions' => '[{
            "icon":"clarity:note-edit-line",
            "label":"修改","auth":"goods:detail:update",
            "onClick":handleEdit.bind(null, record)
        },{
            "label":"删除","icon":"ant-design:delete-outlined",
            "color":"error","auth":"goods:detail:delete",
            "popConfirm":{
                "title":"是否确认删除",
                "confirm":handleDelete.bind(null, record)
            }
        }]',
		'actions' => '[]',
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'baseColProps' => ['xxl' => 6, 'xl' => 8, 'lg' => 12, 'md' => 34],
		'schemas' => [['field' => 'goods_id', 'label' => 'ID', 'component' => 'Input']],
	];

	/**
	 * @var array 增加表单字段映射
	 */
	public $form_schema = [
		'labelWidth' => 120,
		'baseColProps' => ['xxl' => 6, 'xl' => 8, 'lg' => 12, 'md' => 34],
		'schemas' => [
			['field' => 'goods_name', 'label' => '商品名称', 'component' => 'Input', 'required' => true],
			[
				'field' => 'site_id',
				'label' => '所属店铺id',
				'component' => 'ApiTreeSelect',
				'required' => true,
				'componentProps' => '() => {
                        // labelField: "ApiTreeSelect",
                        // valueField: "id",
                        // showSearch:true,
                        // params:{},
                    return {
                        api: (argv) => api("get", "/goods/category/list", {...argv}),
                    };
                }',
		],
			['field' => 'category_id', 'label' => '分类id', 'component' => 'Input', 'required' => true],
			['field' => 'goods_image', 'label' => '商品主图路径', 'component' => 'Input', 'required' => true],
			['field' => 'goods_content', 'label' => '商品详情', 'component' => 'Input', 'required' => false],
			['field' => 'sku_id', 'label' => '默认规格', 'component' => 'Input', 'required' => true],
			[
				'field' => 'goods_state',
				'label' => '商品状态（1.正常0下架）',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'verify_state',
				'label' => '审核状态（1 已审核 0 待审核 10 违规下架 -1 审核中 -2 审核失败）',
				'component' => 'Input',
				'required' => true,
			],
			[
				'field' => 'verify_remark',
				'label' => '商品违规或审核失败说明',
				'component' => 'Input',
				'required' => true,
			],
			['field' => 'is_free_shipping', 'label' => '是否免邮', 'component' => 'Input', 'required' => true],
			['field' => 'introduction', 'label' => '促销语', 'component' => 'Input', 'required' => true],
			['field' => 'keywords', 'label' => '关键词', 'component' => 'Input', 'required' => false],
			['field' => 'label', 'label' => '商品标签', 'component' => 'Input', 'required' => true],
			['field' => 'sort', 'label' => '排序', 'component' => 'Input', 'required' => true],
			['field' => 'evaluate', 'label' => '评价数', 'component' => 'Input', 'required' => true],
			['field' => 'goods_service_rate', 'label' => '商品服务费', 'component' => 'Input', 'required' => true],
			['field' => 'is_selected', 'label' => '0 否 1是   是否精选', 'component' => 'Input', 'required' => true],
			['field' => 'is_benefits', 'label' => '0 否  1是  是否实惠', 'component' => 'Input', 'required' => true],
			['field' => 'is_new', 'label' => '0 否  1是   新品', 'component' => 'Input', 'required' => true],
			['field' => 'is_recommend', 'label' => '0 否  1是  是否推荐', 'component' => 'Input', 'required' => true],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];
}
