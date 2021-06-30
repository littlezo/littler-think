<?php

return [
	'bind' => [],
	'listen' => [
		'OnMenuReadAfter' => ['little\menu\event\OnMenuReadAfter'],
		'OnMenuSetIncByField' => ['little\menu\event\OnMenuSetIncByField'],
		'OnMenuSetDecByField' => ['little\menu\event\OnMenuSetDecByField'],
		'OnMenuQueryById' => ['little\menu\event\OnMenuQueryById'],
		'OnMenuQueryByField' => ['little\menu\event\OnMenuQueryByField'],
		'OnMenuQueryByFind' => ['little\menu\event\OnMenuQueryByFind'],
		'OnMenuQueryByList' => ['little\menu\event\OnMenuQueryByList'],
		'OnMenuDeleteById' => ['little\menu\event\OnMenuDeleteById'],
		'OnMenuDeleteByWhere' => ['little\menu\event\OnMenuDeleteByWhere'],
		'OnMenuUpdateById' => ['little\menu\event\OnMenuUpdateById'],
		'OnMenuUpdateByWhere' => ['little\menu\event\OnMenuUpdateByWhere'],
		'OnMenuSave' => ['little\menu\event\OnMenuSave'],
	],
	'subscribe' => [],
];