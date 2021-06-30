<?php

return [
	'bind' => [],
	'listen' => [
		'OnGroupReadAfter' => ['little\group\event\OnGroupReadAfter'],
		'OnGroupSetIncByField' => ['little\group\event\OnGroupSetIncByField'],
		'OnGroupSetDecByField' => ['little\group\event\OnGroupSetDecByField'],
		'OnGroupQueryById' => ['little\group\event\OnGroupQueryById'],
		'OnGroupQueryByField' => ['little\group\event\OnGroupQueryByField'],
		'OnGroupQueryByFind' => ['little\group\event\OnGroupQueryByFind'],
		'OnGroupQueryByList' => ['little\group\event\OnGroupQueryByList'],
		'OnGroupDeleteById' => ['little\group\event\OnGroupDeleteById'],
		'OnGroupDeleteByWhere' => ['little\group\event\OnGroupDeleteByWhere'],
		'OnGroupUpdateById' => ['little\group\event\OnGroupUpdateById'],
		'OnGroupUpdateByWhere' => ['little\group\event\OnGroupUpdateByWhere'],
		'OnGroupSave' => ['little\group\event\OnGroupSave'],
	],
	'subscribe' => [],
];