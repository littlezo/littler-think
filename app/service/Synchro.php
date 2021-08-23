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

namespace app\service;

use little\member\model\User;
use little\order\model\Detail;
use littler\annotation\Inject;

class Synchro
{
	/**
	 * 订单.
	 * @Inject()
	 * @var Detail
	 */
	protected $order;

	/**
	 * 会员.
	 * @Inject()
	 * @var User
	 */
	protected $member;

	public function syncUser()
	{
		$last_id = $this->member->order('id', 'desc')->value('id');
		// dd($this->member->field);
		$original = User::connect('source')->order('id', 'asc')->field($this->member->field)->select()->toArray();
		// $save_list = [];
		// return $original;
		foreach ($original as $item) {
			// dd($item);

			$save_list[] = (new User())->save($item);
		}
		// return $this->member->allowField([
		// 		'id', 'parent', 'username', 'nickname', 'spl_id', 'level_id', 'mobile', 'email', 'status', 'create_time', 'delete_time',
		// 	])->saveAll($original);
		return $save_list;
	}

	public function syncOrder()
	{
		return;
	}
}
