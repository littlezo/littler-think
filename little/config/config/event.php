<?php

return [
	'bind' => [],
	'listen' => [
		'OnConfigReadAfter' => ['little\config\event\OnConfigReadAfter'],
		'OnConfigSetIncByField' => ['little\config\event\OnConfigSetIncByField'],
		'OnConfigSetDecByField' => ['little\config\event\OnConfigSetDecByField'],
		'OnConfigQueryById' => ['little\config\event\OnConfigQueryById'],
		'OnConfigQueryByField' => ['little\config\event\OnConfigQueryByField'],
		'OnConfigQueryByFind' => ['little\config\event\OnConfigQueryByFind'],
		'OnConfigQueryByList' => ['little\config\event\OnConfigQueryByList'],
		'OnConfigDeleteById' => ['little\config\event\OnConfigDeleteById'],
		'OnConfigDeleteByWhere' => ['little\config\event\OnConfigDeleteByWhere'],
		'OnConfigUpdateById' => ['little\config\event\OnConfigUpdateById'],
		'OnConfigUpdateByWhere' => ['little\config\event\OnConfigUpdateByWhere'],
		'OnConfigSave' => ['little\config\event\OnConfigSave'],
	],
	'subscribe' => [],
];