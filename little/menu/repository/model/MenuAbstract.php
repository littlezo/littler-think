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

namespace little\menu\repository\model;

use littler\BaseModel as Model;
use littler\annotation\Inject;
use littler\traits\db\BaseOptionsTrait;
use littler\traits\db\RewriteTrait;

/**
 * @property id $int 菜单ID
 * @property app_module $string 应用模块
 * @property addon $string 所属插件
 * @property title $string 菜单标题
 * @property name $string 菜单关键字
 * @property parent $string 上级菜单
 * @property level $int 深度等级
 * @property url $string 链接地址
 * @property is_show $int 是否展示
 * @property sort $int 排序（同级有效）
 * @property desc $string 描述
 * @property is_icon $int 是否是矢量菜单图
 * @property picture $string 图片(矢量图)
 * @property picture_select $string 图片(矢量图)(选中)
 * @property is_control $int 是否控制权限
 */
abstract class MenuAbstract extends Model
{
	use BaseOptionsTrait;
	use RewriteTrait;

	/**
	 * @var string $name 表名
	 */
	protected $name = 'menu';

	/**
	 * @var string $pk 主键
	 */
	protected $pk = 'id';

	/**
	 * @var array $schema 字段信息
	 */
	protected $schema = [
		'id' => 'int',
		'app_module' => 'string',
		'addon' => 'string',
		'title' => 'string',
		'name' => 'string',
		'parent' => 'string',
		'level' => 'int',
		'url' => 'string',
		'is_show' => 'int',
		'sort' => 'int',
		'desc' => 'string',
		'is_icon' => 'int',
		'picture' => 'string',
		'picture_select' => 'string',
		'is_control' => 'int',
	];

	/**
	 * @var array $type 字段类型自动转换
	 */
	protected $type = [
		'id' => 'int unsigned',
		'app_module' => 'varchar',
		'addon' => 'varchar',
		'title' => 'varchar',
		'name' => 'varchar',
		'parent' => 'varchar',
		'level' => 'int',
		'url' => 'varchar',
		'is_show' => 'tinyint',
		'sort' => 'int',
		'desc' => 'varchar',
		'is_icon' => 'tinyint',
		'picture' => 'varchar',
		'picture_select' => 'varchar',
		'is_control' => 'tinyint',
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
	protected $field = [
		'id',
		'app_module',
		'addon',
		'title',
		'name',
		'parent',
		'level',
		'url',
		'is_show',
		'sort',
		'desc',
		'is_icon',
		'picture',
		'picture_select',
		'is_control',
	];
}
