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

namespace little\member\model;

use little\member\repository\model\UserAbstract;
use littler\annotation\model\relation\HasMany;
use littler\annotation\model\relation\HasOne;
use littler\user\AuthorizeInterface;
use littler\user\Traits\User as TraitsUser;

/**
 * 会员列表 模型.
 * @HasOne("sup", model="user", foreignKey="id", localKey="parent")
 * @HasMany("children", model="user", foreignKey="parent", localKey="id")
 * @HasOne("level", model="Level", foreignKey="level_id", localKey="level_id")
 */
class User extends UserAbstract implements AuthorizeInterface
{
	use TraitsUser;

	/**
	 * @var array 关联预载
	 */
	public $with = ['sup', 'level'];

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
				'title' => '推荐人',
				'dataIndex' => 'sup.nickname',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '用户名',
				'dataIndex' => 'username',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '用户昵称',
				'dataIndex' => 'nickname',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '手机号',
				'dataIndex' => 'mobile',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '邮箱',
				'dataIndex' => 'email',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '用户状态',
				'dataIndex' => 'status',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    return h(ant('Switch'), {
                        checked: record.status === 1,
                        checkedChildren: '正常',
                        unCheckedChildren: '禁用',
                        onChange(checked) {
                        const newStatus = checked ? 1 : 0;
                        const member_id = record.id;
                        api('put','/member/user/'+member_id, {status:newStatus})
                            .then(() => {
                                record.status = newStatus;
                                createMessage.success(`已成功用户状态 `);
                            })
                            .catch(() => {
                              createMessage.error('修改用户状态失败');
                            })
                        },
                    });
                    const value = record.status;
                    const enable = ~~value === 1;
                    const color = enable ? 'green' : 'red';
                    const text = enable ? '正常' : '停用';
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '用户头像',
				'dataIndex' => 'avatar',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
					// console.log(h);
			        return h(ant('Avatar'), {size:60 ,src: getImg(record.avatar) });
			    }",
			],
			[
				'title' => '用户等级',
				'dataIndex' => 'level.level_name',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '微信用户openid',
				'dataIndex' => 'wx_openid',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => true,
			],
			[
				'title' => '微信号',
				'dataIndex' => 'wx_account',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '微信小程序openid',
				'dataIndex' => 'weapp_openid',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => true,
			],
			[
				'title' => '微信unionid',
				'dataIndex' => 'wx_unionid',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => true,
			],
			[
				'title' => '支付宝账户id',
				'dataIndex' => 'ali_openid',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => true,
			],
			[
				'title' => '真实姓名',
				'dataIndex' => 'realname',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '性别',
				'dataIndex' => 'sex',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const textMap = {0:'女',1:'男',2:'未知'};
                    const colorMap = {0:'red',1:'blue',2:'green'};
                    const value = record.sex;
                    const color = colorMap[value];
                    const text = textMap[value];
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '地址',
				'dataIndex' => 'location',
				'width' => 180,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '出生日期',
				'dataIndex' => 'birthday',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '贡献值',
				'dataIndex' => 'growth',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '现金余额',
				'dataIndex' => 'balance_money',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '现金卷余额',
				'dataIndex' => 'balance_cash',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '抵扣券余额',
				'dataIndex' => 'balance_deduct',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '已提现余额',
				'dataIndex' => 'balance_withdraw',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '提现中余额',
				'dataIndex' => 'balance_withdraw_apply',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '是否认证',
				'dataIndex' => 'is_auth',
				'width' => 100,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
				'customRender' => "({ record }) => {
                    const value = record.status;
                    const enable = ~~value === 1;
                    const color = enable ? 'green' : 'red';
                    const text = enable ? '是' : '否';
                    return h(ant('Tag'), { color: color }, () => text);
                }",
			],
			[
				'title' => '邀请码',
				'dataIndex' => 'Invite_code',
				'width' => 160,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '注册时间',
				'dataIndex' => 'create_time',
				'width' => 120,
				'fixed' => false,
				'align' => 'center',
				'defaultHidden' => false,
			],
			[
				'title' => '更新时间',
				'dataIndex' => 'update_time',
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
		'rowKey' => 'id',
		'searchInfo' => ['order' => 'asc'],
		'actionColumn' => [
			'width' => 100,
			'title' => '操作',
			'dataIndex' => 'action',
			'slots' => ['customRender' => 'action'],
			'fixed' => 'right',
		],
		'actions' =>"[
          {
            icon: 'clarity:note-edit-line',
            label: '修改',
            auth: 'member:user:update',
            onClick: handleEdit.bind(null, record),
          },
          {
            label: '删除',
            icon: 'ant-design:delete-outlined',
            color: 'error',
            auth: 'member:user:delete',
            popConfirm: {
                title: '是否确认删除',
                confirm: handleDelete.bind(null, record),
            },
          },
          {
            icon: 'clarity:note-edit-line',
            label: '余额操作',
            auth: 'member:user:update',
            onClick: handleRowPart.bind(null, record, {
                schemas:[
                    {
                    field: 'field',
                    label: '操作类型',
                    component: 'RadioButtonGroup',
                    defaultValue: 1,
                    componentProps: {
                        options: [
                            { label: '余额', value: 1 },
                            { label: '现金劵', value: 2 },
                            { label: '抵扣券', value: 3 },
                        ],
                    },
                },
                {
                    field: 'type',
                    label: '类型',
                    component: 'RadioButtonGroup',
                    defaultValue: 0,
                    componentProps: {
                        options: [
                            { label: '扣除', value: 0 },
                            { label: '增加', value: 1 },
                        ],
                    },
                },
                {
                    field: 'money',
                    label: '金额',
                    required: true,
                    component: 'Input',
                },
                {
                    label: '备注',
                    field: 'remark',
                    required: true,
                    component: 'InputTextArea',
                }],
                api:{
                    method:'put',
                    api:'/member/user/money',
                },
                title:'余额操作'
            }),
          },
          {
              label: '查看详情',
              icon: 'ant-design:profile-outlined',
              auth: 'member:user:info',
              onClick: handleDetail.bind(null, record),
          }
        ]",
	];

	/**
	 * @var array 搜索表单字段映射  具体字段规则参见 快速搜索定义
	 */
	public $search_schema = [
		'labelWidth' => 100,
		'schemas' => [
			['field' => 'id', 'label' => 'ID', 'component' => 'Input', 'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6]],
			['field' => 'left_like_mobile', 'label' => '手机号', 'component' => 'Input', 'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6]],
			['field' => 'left_like_nickname', 'label' => '昵称', 'component' => 'Input', 'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6]],
		],
	];

	/**
	 * @var array 增加表单字段映射
	 */
	public $form_schema = [
		'labelWidth' => 120,
		'schemas' => [
			[
				'field' => 'parent',
				'label' => '推荐人',
				'component' => 'Select',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
				'componentProps' => '() => {
                    return {
                        labelField: "nickname",
                        valueField: "id",
                        showSearch:true,
                        api: (argv) => api("get", "/member/user/list", {...argv},),
                    };
                }',
			],
			[
				'field' => 'mobile',
				'label' => '手机号',
				'component' => 'Input',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'password',
				'label' => '用户密码',
				'component' => 'InputPassword',
				'required' => false,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
			],
			[
				'field' => 'status',
				'label' => '用户状态 ',
				'component' => 'Switch',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
				'defaultValue' => 1,
				'componentProps' => [
					'checkedValue' => 1,
					'unCheckedValue' => 0,
				],
			],
			[
				'field' => 'level_id',
				'label' => '用户等级',
				'component' => 'ApiSelect',
				'required' => true,
				'colProps' => ['lg' => 12, 'xl' => 8, 'xxl' => 6],
				'componentProps' => '() => {
                    return {
                        labelField: "level_name",
                        valueField: "level_id",
                        api: (argv) => api("get", "/member/level/list", argv),
                    };
                }',
			],
		],
	];

	/**
	 * @var array 排除展示字段
	 */
	public $without = ['password', 'passwd', 'pay_passwd', 'pay_password'];

	public function setBirthdayAttr($value)
	{
		return strtotime($value);
	}

	public function getBirthdayAttr($value)
	{
		return date('Y-m-d', $value);
	}
}
