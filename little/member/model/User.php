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
use littler\annotation\model\relation\HasOne;
use littler\user\AuthorizeInterface;
use littler\user\Traits\User as UserTrait;

/*
 * 会员列表 模型.
 */
/**
 * @HasOne("level", model=Level::class, foreignKey="level_id", localKey="member_level")
 */
class User extends UserAbstract implements AuthorizeInterface
{
	use UserTrait;
}
