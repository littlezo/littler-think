<?php

return [
	'bind' => [],
	'listen' => [
		'OnNoticeReadAfter' => ['little\notice\event\OnNoticeReadAfter'],
		'OnNoticeSetIncByField' => ['little\notice\event\OnNoticeSetIncByField'],
		'OnNoticeSetDecByField' => ['little\notice\event\OnNoticeSetDecByField'],
		'OnNoticeQueryById' => ['little\notice\event\OnNoticeQueryById'],
		'OnNoticeQueryByField' => ['little\notice\event\OnNoticeQueryByField'],
		'OnNoticeQueryByFind' => ['little\notice\event\OnNoticeQueryByFind'],
		'OnNoticeQueryByList' => ['little\notice\event\OnNoticeQueryByList'],
		'OnNoticeDeleteById' => ['little\notice\event\OnNoticeDeleteById'],
		'OnNoticeDeleteByWhere' => ['little\notice\event\OnNoticeDeleteByWhere'],
		'OnNoticeUpdateById' => ['little\notice\event\OnNoticeUpdateById'],
		'OnNoticeUpdateByWhere' => ['little\notice\event\OnNoticeUpdateByWhere'],
		'OnNoticeSave' => ['little\notice\event\OnNoticeSave'],
	],
	'subscribe' => [],
];