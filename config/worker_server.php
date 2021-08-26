<?php

declare(strict_types=1);

use app\service\Settlement;
use little\member\model\User;
use think\facade\Log;
use think\worker\Application;
use Workerman\Connection\AsyncTcpConnection;
use Workerman\Crontab\Crontab;

return [
	// 扩展自身需要的配置
	'protocol'       => 'text', // 协议 支持 tcp udp unix http websocket text
	'host'           => '0.0.0.0', // 监听地址
	'port'           => 9910, // 监听端口
	'socket'         => '', // 完整监听地址
	'context'        => [], // socket 上下文选项
	'worker_class'   => '', // 自定义Workerman服务类名 支持数组定义多个服务

	// 支持workerman的所有配置参数
	'name'           => 'task',
	'count'          => 100,
	'daemonize'      => false,
	'pidFile'        => '/tmp/server.pid',

	// 支持事件回调
	// onWorkerStart
	'onWorkerStart'  => function ($worker) {
		// var_export($worker);
		$app = new Application();
		$app->initialize();
		new Crontab('1 * * * * *', function () use ($worker) {
			$memberModel = new User();
			$list = $memberModel->order('id', 'desc')->column('id');
			$count = count($list);
			$block = array_chunk($list, (int) ceil((int) $count / (int) $worker->count));
			foreach ($block as $index => $item) {
				if ($worker->id === $index) {
					foreach ($item as $member_id) {
						$task_connection = new AsyncTcpConnection('Text://127.0.0.1:9910');
						// 任务及参数数据
						$task_data = $member_id;
						// 发送数据
						$task_connection->send($task_data);
						// 异步获得结果
						$task_connection->onMessage = function ($task_connection, $task_result) {
							// 结果
							Log::channel('task')->write($task_result, 'task');
							// 获得结果后记得关闭异步连接
							$task_connection->close();
						};
						// 执行异步连接
						$task_connection->connect();
					}
				}
			}
		});
	},
	// onWorkerReload
	'onWorkerReload' => function ($worker) {
	},
	// onConnect
	'onConnect'      => function ($connection) {
	},
	// onMessage
	'onMessage'      => function ($connection, $data) {
		// var_dump($data);
		// $sett = new app\service\Settlement();
		$res = Settlement::upgrade($data);
		$connection->send($res);
	// var_dump($res);
		// var_dump($data);
	},
	// onClose
	'onClose'        => function ($connection) {
	},
	// onError
	'onError'        => function ($connection, $code, $msg) {
		echo "error [ $code ] $msg\n";
	},
];
