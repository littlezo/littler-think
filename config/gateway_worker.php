<?php

declare(strict_types=1);

use app\service\Task;

return [
	// 扩展自身需要的配置
	'protocol'              => 'websocket', // 协议 支持 tcp udp unix http websocket text
	'host'                  => '0.0.0.0', // 监听地址
	'port'                  => 19443, // 监听端口
	'socket'                => '', // 完整监听地址
	'context'               => [], // socket 上下文选项
	'register_deploy'       => true, // 是否需要部署register
	'businessWorker_deploy' => true, // 是否需要部署businessWorker
	'gateway_deploy'        => true, // 是否需要部署gateway
	'pidFile'               => '/tmp/gateway.pid',
	// Register配置
	'registerAddress'       => '0.0.0.0:1236',

	// Gateway配置
	'name'                  => 'gateway',
	'count'                 => 4,
	'lanIp'                 => '0.0.0.0',
	'startPort'             => 2000,
	'daemonize'             => false,
	'pingInterval'          => 30,
	'pingNotResponseLimit'  => 0,
	'pingData'              => '0500000000340000000001000\"PING\"END',

	// BusinsessWorker配置
	'businessWorker'        => [
		'name'         => 'TaskWorker',
		'count'        => 64,
		'eventHandler' => Task::class,
	],
];
