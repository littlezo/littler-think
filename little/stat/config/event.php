<?php

return [
	'bind' => [],
	'listen' => [
		'OnStatReadAfter' => ['little\stat\event\OnStatReadAfter'],
		'OnStatSetIncByField' => ['little\stat\event\OnStatSetIncByField'],
		'OnStatSetDecByField' => ['little\stat\event\OnStatSetDecByField'],
		'OnStatQueryById' => ['little\stat\event\OnStatQueryById'],
		'OnStatQueryByField' => ['little\stat\event\OnStatQueryByField'],
		'OnStatQueryByFind' => ['little\stat\event\OnStatQueryByFind'],
		'OnStatQueryByList' => ['little\stat\event\OnStatQueryByList'],
		'OnStatDeleteById' => ['little\stat\event\OnStatDeleteById'],
		'OnStatDeleteByWhere' => ['little\stat\event\OnStatDeleteByWhere'],
		'OnStatUpdateById' => ['little\stat\event\OnStatUpdateById'],
		'OnStatUpdateByWhere' => ['little\stat\event\OnStatUpdateByWhere'],
		'OnStatSave' => ['little\stat\event\OnStatSave'],
	],
	'subscribe' => [],
];