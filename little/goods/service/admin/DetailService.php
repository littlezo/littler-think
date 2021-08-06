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

namespace little\goods\service\admin;

use Exception;
use little\goods\model\Detail;
use little\goods\model\Sku;
use littler\annotation\Inject;
use littler\Request;

/**
 * 实现二维数组的笛卡尔积组合
 * $arr 要进行笛卡尔积的二维数组
 * $str 最终实现的笛卡尔积组合,可不写.
 * @return array
 */
function cartesian($arr, $str = [])
{
	//去除第一个元素
	// dd($arr);
	$first = array_shift($arr);
	//判断是否是第一次进行拼接
	if (count($str) > 1) {
		foreach ($str as $k => $val) {
			// dd($val);
			foreach ($first as $key => $value) {
				//最终实现的格式 1,3,76
				//可根据具体需求进行变更
				// $str2[] = [$val, $value];
				$str2[] = $val . ',' . $value;
			}
		}
	} else {
		foreach ($first as $key => $value) {
			// dd($value);
			//最终实现的格式 1,3,76
			//可根据具体需求进行变更
			$str2[] = $value;
		}
	}
	//递归进行拼接
	if (count($arr) > 0) {
		$str2 = cartesian($arr, $str2);
	}
	//返回最终笛卡尔积
	return $str2;
}

function cartesian_diff($array1, $array2)
{
	$ret = [];
	foreach ($array1 as $k => $v) {
		$ret[$k]= array_diff($v, $array2);
	}
	dd($ret);
	return $ret;
}

class DetailService
{
	/**
	 * @Inject
	 * @var Detail
	 */
	private $model;

	/**
	 * @Inject
	 * @var Sku
	 */
	private $sku_model;

	/**
	 * @Inject
	 * @var Request
	 *              desc  Request对象 request->user 可以取当前用户信息
	 */
	private $request;

	/**
	 * #title 布局获取.
	 * @param int $type form||table 页面布局类型
	 * @return Detail
	 */
	public function layout(string $type): ?array
	{
		if (in_array($type, ['table', 'form'], true)) {
			switch ($type) {
				case 'table':
				$schema = $this->model->table_schema;
				$schema['formConfig'] = $this->model->search_schema;
				break;
			case 'form':
				$schema = $this->model->form_schema;
				break;
			default:
				$schema =null;
				break;
			}
			if ($schema) {
				return $schema;
			}
		}
		throw new Exception('类型错误', 9500901);
	}

	/**
	 * #title 分页.
	 * @return Detail
	 */
	public function paginate(): ?object
	{
		return $this->model->getList();
	}

	/**
	 * #title 列表.
	 * @return Detail
	 */
	public function list(): ?object
	{
		return $this->model->getList(false);
	}

	/**
	 * #title 详情.
	 * @param int $id 数据主键
	 * @return Detail
	 */
	public function info(int $id): ?object
	{
		return $this->model->findBy($id);
	}

	/**
	 * #title 保存.
	 * @param array $args 待写入数据
	 * @return int||bool
	 */
	public function save(array $args)
	{
		return $this->model->storeBy($args);
	}

	/**
	 * #title 更新.
	 * @param int $id ID
	 * @param array $args 待更新的数据
	 * @return int|bool
	 */
	public function update(int $id, array $args, )
	{
		$attr = $args['goods_spec'];
		$sku = $args['sku'];
		$spec = [];
		//sku
		foreach ($attr as $key => $value) {
			$spec[$value['spec_id']]=array_column($value['value'], 'spec_value_name');
		}

		$spec_value= cartesian($spec);
		$sku_list =$this->sku_model->withTrashed()->where('goods_id', $id)->select()->toArray();
		// 插入商品ID
		foreach ($sku as &$sku_value) {
			$sku_value['goods_id']=$id;
		}
		if (empty($sku_list)) {
			$this->sku_model->insertAllBy($sku);
		} else {
			foreach ($sku_list as $sku_info) {
				$spec_sku_value=	array_column($sku_info['spec_value'], 'spec_value_name');
				if ($spec_index =(array_keys($spec_value, implode(',', $spec_sku_value), true))) {
					if ($sku_info['delete_time']===0) {
						$this->sku_model->updateBy($sku_info['sku_id'], $sku[$spec_index[0]]);
					} else {
						$this->sku_model->recover($sku_info['sku_id']);
						$this->sku_model->updateBy($sku_info['sku_id'], $sku[$spec_index[0]]);
					}
					unset($sku[$spec_index[0]]);
				} else {
					$this->sku_model->deleteBy($sku_info['sku_id']);
				}
			}
		}
		if (! empty($sku)) {
			$this->sku_model->insertAllBy($sku);
		}
		$args['sku_id']=$this->sku_model->where('goods_id', $id)->value('sku_id') ?: 0;
		return $this->model->updateBy($id, $args);
	}

	/**
	 * #title 删除.
	 * @param int $id ID
	 * @return bool
	 */
	public function delete(int $id): ?bool
	{
		return $this->model->deleteBy($id);
	}
}
