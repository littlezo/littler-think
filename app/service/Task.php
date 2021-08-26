<?php

declare(strict_types=1);
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace app\service;

use Exception;
use GatewayWorker\Lib\Gateway;
use littler\websocket\Packet;
use think\worker\Application;
use Workerman\Lib\Timer;
use Workerman\Worker;

/**
 * Worker 命令行服务类.
 */
class Task
{
	/**
	 * onWorkerStart 事件回调
	 * 当businessWorker进程启动时触发。每个进程生命周期内都只会触发一次
	 *
	 * @return void
	 */
	public static function onWorkerStart(Worker $businessWorker)
	{
		$app = new Application();
		$app->initialize();
		Timer::add(10, function () use ($businessWorker) {
			// echo "timer\n";
			var_dump($businessWorker);
			var_export("timer\n");
		});
	}

	/**
	 * onConnect 事件回调
	 * 当客户端连接上gateway进程时(TCP三次握手完毕时)触发.
	 *
	 * @param int $client_id
	 * @return void
	 */
	public static function onConnect($client_id)
	{
		// request()
		// self::ack(Packet::pack(Packet::MESSAGE, 0, 0, '', $client_id));
		echo "client[$client_id] connect\n";
		// Gateway::sendToCurrentClient($client_id);
	}

	/**
	 * onWebSocketConnect 事件回调
	 * 当客户端连接上gateway完成websocket握手时触发.
	 *
	 * @param int $client_id 断开连接的客户端client_id
	 * @param mixed $data
	 * @return void
	 */
	public static function onWebSocketConnect($client_id, $data)
	{
		echo "client[$client_id] SocketConnect\n";
		// self::ack(Packet::pack(Packet::MESSAGE, 0, 0, '', $data));
		// Gateway::sendToAll(json_encode($data));
	}

	/**
	 * onMessage 事件回调
	 * 当客户端发来数据(Gateway进程收到数据)后触发.
	 *
	 * @param int $client_id
	 * @param mixed $data
	 * @return void
	 */
	public static function onMessage($client_id, $data)
	{
		var_dump($data);
		try {
			(new Settlement())->upgrade((int) $data);
			self::ack($data);
		} catch (\Throwable $e) {
			Gateway::sendToClient($client_id, ([
					'code' => $e->getCode(),
					'error' => $e->getMessage(),
					// 'trace' => $e->getTrace(),
				]));
		}
	}

	/**
	 * onClose 事件回调 当用户断开连接时触发的方法.
	 *
	 * @param int $client_id 断开连接的客户端client_id
	 * @return void
	 */
	public static function onClose($client_id)
	{
		echo "client[$client_id] close\n";
	}

	/**
	 * onWorkerStop 事件回调
	 * 当businessWorker进程退出时触发。每个进程生命周期内都只会触发一次。
	 *
	 * @return void
	 */
	public static function onWorkerStop(Worker $businessWorker)
	{
		echo "WorkerStop\n";
	}

	protected static function ack($data, $raw = false)
	{
		// if (! $data instanceof Packet) {
		// 	throw new Exception('消息类型不规范');
		// }
		Gateway::sendToCurrentClient(trim_all(json_encode($data, JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES)), $raw);
	}
}
