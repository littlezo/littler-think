<?php

declare(strict_types=1);

/*
 * #logic 做事不讲究逻辑，再努力也只是重复犯错
 * ## 何为相思：不删不聊不打扰，可否具体点：曾爱过。何为遗憾：你来我往皆过客，可否具体点：再无你。
 * ## 只要思想不滑稽，方法总比苦难多！
 * @version 1.0.0
 * @author @小小只^v^ <littlezov@qq.com>  littlezov@qq.com
 * @contact  littlezov@qq.com
 * @link     https://github.com/littlezo
 * @document https://github.com/littlezo/wiki
 * @license  https://github.com/littlezo/MozillaPublicLicense/blob/main/LICENSE
 *
 */
namespace app\controller;

use think\annotation\Inject;
use think\App;
use think\exception\ValidateException;
use think\Request;
use think\Validate;

abstract class AbstractController
{
	/**
	 * App应用.
	 *
	 * @Inject
	 *
	 * @var App
	 */
	protected $app;

	/**
	 * 是否批量验证
	 *
	 * @var bool
	 */
	protected $batchValidate = false;

	/**
	 * 控制器中间件.
	 *
	 * @var array
	 */
	protected $middleware = [];

	/**
	 * Request实例.
	 *
	 * @Inject
	 *
	 * @var Request
	 */
	protected $request;

	/**
	 * Validate实例.
	 *
	 * @Inject
	 *
	 * @var Validate
	 */
	protected $validate;

	public function __construct()
	{
		$this->initialize();
	}

	/**
	 * 初始化.
	 */
	protected function initialize()
	{
	}

	/**
	 * 验证数据.
	 *
	 * @param array $data 数据
	 * @param array|string $validate 验证器名或者验证规则数组
	 * @param array $message 提示信息
	 * @param bool $batch 是否批量验证
	 *
	 * @throws ValidateException
	 *
	 * @return array|string|true
	 */
	protected function validate(array $data, $validate, array $message = [], bool $batch = false)
	{
		if (is_array($validate)) {
			$this->validate->rule($validate);
		} else {
			if (strpos($validate, '.')) {
				// 支持场景
				[$validate, $scene] = explode('.', $validate);
			}
			$class = strpos($validate, '\\') !== false ? $validate : $this->app->parseClass('validate', $validate);
			$this->validate = new $class();
			if (! empty($scene)) {
				$this->validate->scene($scene);
			}
		}

		$this->validate->message($message);

		// 是否批量验证
		if ($batch || $this->batchValidate) {
			$this->validate->batch(true);
		}

		return $this->validate->failException(true)->check($data);
	}
}
