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

namespace little\message\model;

use little\message\repository\model\SendAbstract;

/**
 * 消息 模型
 */
class Send extends SendAbstract
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
				'dataIndex' => 'id',
				'width' => 80,
				'fixed' => 'left',
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '关键字',
				'dataIndex' => 'keywords',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '主题',
				'dataIndex' => 'title',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '消息类型 1 买家消息  2 卖家消息',
				'dataIndex' => 'message_type',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '配置参数',
				'dataIndex' => 'message_json',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否启动邮箱',
				'dataIndex' => 'email_is_open',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '邮箱标题',
				'dataIndex' => 'email_title',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '邮箱发送内容',
				'dataIndex' => 'email_content',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否启动短信',
				'dataIndex' => 'sms_is_open',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '发送短信插件',
				'dataIndex' => 'sms_channel',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '短信配置参数',
				'dataIndex' => 'sms_json',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '短信内容',
				'dataIndex' => 'sms_content',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '微信公众号消息',
				'dataIndex' => 'wechat_is_open',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '配置参数',
				'dataIndex' => 'wechat_json',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '微信小程序是否启动',
				'dataIndex' => 'weapp_is_open',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '微信小程序配置参数',
				'dataIndex' => 'weapp_json',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '支付宝小程序是否启动',
				'dataIndex' => 'aliapp_is_open',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '支付宝小程序配置参数',
				'dataIndex' => 'aliapp_json',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '支持场景 如小程序  wep端',
				'dataIndex' => 'support_type',
				'width' => 180,
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
		'rowKey' => 'id',
		'searchInfo' => ['order' => 'asc'],
		'actionColumn' => [
			'width' => 100,
			'title' => '操作',
			'dataIndex' => 'action',
			'slots' => ['customRender' => 'action'],
			'fixed' => 'right',
		],
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'schemas' => [
			['field' => 'id', 'label' => 'ID', 'component' => 'Input', 'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6]],
		],
	];

	/**
	 * @var array 增加表单字段映射
	 */
	public $form_schema = [
		'labelWidth' => 120,
		'schemas' => [
			[
				'field' => 'keywords',
				'label' => '关键字',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'title',
				'label' => '主题',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'message_type',
				'label' => '消息类型 1 买家消息  2 卖家消息',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'message_json',
				'label' => '配置参数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'email_is_open',
				'label' => '是否启动邮箱',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'email_title',
				'label' => '邮箱标题',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'email_content',
				'label' => '邮箱发送内容',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'sms_is_open',
				'label' => '是否启动短信',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'sms_channel',
				'label' => '发送短信插件',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'sms_json',
				'label' => '短信配置参数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'sms_content',
				'label' => '短信内容',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'wechat_is_open',
				'label' => '微信公众号消息',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'wechat_json',
				'label' => '配置参数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'weapp_is_open',
				'label' => '微信小程序是否启动',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'weapp_json',
				'label' => '微信小程序配置参数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'aliapp_is_open',
				'label' => '支付宝小程序是否启动',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'aliapp_json',
				'label' => '支付宝小程序配置参数',
				'component' => 'Input',
				'required' => true,

			],
			[
				'field' => 'support_type',
				'label' => '支持场景 如小程序  wep端',
				'component' => 'Input',
				'required' => true,

			],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];
}
