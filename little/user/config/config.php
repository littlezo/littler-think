<?php

/**
 * Jwt 配置
 */

declare(strict_types=1);
return [
	'jwt' => [
		'stores' => [
			'admin' => [
				'sso' => ['enable' => true],
				'token' => [
					'signer_key' => 'km2ESh%^Tpd2c7Tx3zpyBHJ7HnPeSXe&#K9yGAZAlDMw^V#vNSd43m9s5M^FrkLl',
					'public_key' => 'file://path/public.key',
					'private_key' => 'file://path/private.key',
					'not_before' => 0,
					'expires_at' => '86400',
					'refresh_ttL' => 172800,
					'signer' => 'HS512',
					'type' => 'Header|Param',
					'expires_code' => 904010,
					'refresh_code' => 904011,
					'iss' => 'client.littler',
					'aud' => 'server.littler',
					'automatic_renewal' => true,
				],
				'user' => ['bind' => true, 'class' => 'little\user\model\UserAccount'],
			],
		],
	],
];