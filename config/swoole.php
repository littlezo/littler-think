<?php

declare(strict_types=1);

use littler\websocket\Handler;
use think\facade\Env;

return [
	'http'       => [
		'enable'     => true,
		'host'       => '0.0.0.0',
		'port'       => 9501,
		'worker_num' => swoole_cpu_num(),
	],
	'websocket'  => [
		'enable'        => true,
		'handler'       => Handler::class,
		'ping_interval' => 25000,
		'ping_timeout'  => 60000,
		'room'          => [
			'type'  => 'table',
			'table' => [
				'room_rows'   => 4096,
				'room_size'   => 2048,
				'client_rows' => 8192,
				'client_size' => 2048,
			],
			'redis' => [
				'host'          => Env::get('REDIS_HOST', '127.0.0.1'),
				'port'          => 6379,
				'max_active'    => 3,
				'max_wait_time' => 5,
			],
		],
		'listen'        => [],
		'subscribe'     => [],
	],
	'rpc'        => [
		'server' => [
			'enable'     => false,
			'host'       => '0.0.0.0',
			'port'       => 9000,
			'worker_num' => swoole_cpu_num(),
			'services'   => [],
		],
		'client' => [],
	],
	//队列
	'queue'      => [
		'enable'  => false,
		'workers' => [],
	],
	'hot_update' => [
		'enable'  => env('APP_DEBUG', false),
		'name'    => ['*.php'],
		'include' => [root_path()],
		'exclude' => [
			root_path() . '/vendor',
			root_path() . '/runtime',
			root_path() . '/page_ui',
			root_path() . '/public',
			root_path() . '/data',
		],
	],
	//连接池
	'pool'       => [
		'db'    => [
			'enable'        => true,
			'max_active'    => 3,
			'max_wait_time' => 5,
		],
		'cache' => [
			'enable'        => true,
			'max_active'    => 3,
			'max_wait_time' => 5,
		],
		//自定义连接池
	],
	'tables'     => [],
	//每个worker里需要预加载以共用的实例
	'concretes'  => [],
	//重置器
	'resetters'  => [],
	//每次请求前需要清空的实例
	'instances'  => [],
	//每次请求前需要重新执行的服务
	'services'   => [],
];
