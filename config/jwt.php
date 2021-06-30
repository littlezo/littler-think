<?php

/**
 * Jwt 配置.
 */

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
return [
	'default' => 'default',
	'stores' => [
		'default' => [
			'sso' => ['enable' => false],
			'token' => [
				'signer_key' => '&InAosuDkTj0tP2UQpJ4v8^8oJtwScGNtWvJFhYnfiRw$~A4oBwzy9p3kJWw0udJ',
				'public_key' => 'file://path/public.key',
				'private_key' => 'file://path/private.key',
				'not_before' => 0,
				'expires_at' => 3600,
				'refresh_ttL' => 7200,
				'signer' => 'HS256',
				'type' => 'Header|Param',
				'relogin_code' => 50001,
				'refresh_code' => 50002,
				'iss' => 'client.littler',
				'aud' => 'server.littler',
				'automatic_renewal' => false,
				'signerKey' => '&%JO$#Dus$TrOgEXRMcQB$3nF1Nvs%1Mr9BOS7XE$K%jBxlP7jzwxKVRLvZ5mogf',
			],
			'user' => ['bind' => false, 'class' => null],
		],
		'admin' => [
			'sso' => ['enable' => false],
			'token' => [
				'signer_key' => 'littler',
				'not_before' => 0,
				'expires_at' => 3600,
				'refresh_ttL' => 7200,
				'signer' => 'HS256',
				'type' => 'Header',
				'relogin_code' => 50001,
				'refresh_code' => 50002,
				'iss' => 'client.littler',
				'aud' => 'server.littler',
				'automatic_renewal' => false,
			],
			'user' => ['bind' => false, 'class' => null],
		],
	],
	'manager' => ['prefix' => 'jwt', 'blacklist' => 'blacklist', 'whitelist' => 'whitelist'],
];
