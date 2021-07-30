<?php

/**
 * Jwt 配置.
 */

declare(strict_types=1);
return [
	'jwt' => [
		'stores' => [
			'admin' => [
				'sso' => ['enable' => false],
				'token' => [
					'signer_key' => 'j9jrwT$GYYW&wDihmHZP&zjycU4OU6tIF5whlP%uvrAJMiCiiGn~8G#nHJiZUMso',
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
				'user' => ['bind' => true, 'class' => 'little\user\model\Account'],
			],
		],
	],
];
