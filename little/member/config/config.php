<?php

/**
 * Jwt 配置
 */

declare(strict_types=1);
return [
	'jwt' => [
		'stores' => [
			'member' => [
				'sso' => ['enable' => true],
				'token' => [
					'signer_key' => 'W4PXUPlGyhwWGn54gw1D%hI&2FAMVrc1p#vZpx6WDgV2KLn#vJD$p~OYkBdM&M7x',
					'public_key' => 'file://path/public.key',
					'private_key' => 'file://path/private.key',
					'not_before' => 0,
					'expires_at' => 86400,
					'refresh_ttL' => 172800,
					'signer' => 'HS512',
					'type' => 'Header',
					'expires_code' => 904010,
					'refresh_code' => 904011,
					'iss' => 'client.littler',
					'aud' => 'server.littler',
					'automatic_renewal' => true,
				],
				'user' => ['bind' => true, 'class' => 'little\member\model\User'],
			],
		],
	],
];