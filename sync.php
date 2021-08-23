#!/usr/bin/env php
<?php

namespace sync;

// 命令行入口文件
// 加载基础文件
require __DIR__ . '/vendor/autoload.php';

// 应用初始化
// (new \think\App())->console->run();
// namespace sync;

use app\event\ParseBinLog;
use xingwenge\canal_php\CanalClient;
use xingwenge\canal_php\CanalConnectorFactory;

require __DIR__ . '/vendor/autoload.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL);

try {
	$client = CanalConnectorFactory::createClient(CanalClient::TYPE_SOCKET_CLUE);
	# $client = CanalConnectorFactory::createClient(CanalClient::TYPE_SWOOLE);

	$client->connect('127.0.0.1', 11111);
	$client->checkValid();
	$client->subscribe('1001', 'hphk', 'app_hphk1688_com.*\\..*');
	# $client->subscribe("1001", "example", "db_name.tb_name"); # 设置过滤

	while (true) {
		$message = $client->get(100);
		if ($entries = $message->getEntries()) {
			foreach ($entries as $entry) {
				// var_dump($entry);

				ParseBinLog::parse($entry);
			}
		}
		sleep(1);
	}

	$client->disConnect();
} catch (\Exception $e) {
	echo $e->getMessage(), PHP_EOL;
}
