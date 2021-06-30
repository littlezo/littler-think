<?php

return [
	'bind' => [],
	'listen' => [
		'OnAreaReadAfter' => ['little\area\event\OnAreaReadAfter'],
		'OnAreaSetIncByField' => ['little\area\event\OnAreaSetIncByField'],
		'OnAreaSetDecByField' => ['little\area\event\OnAreaSetDecByField'],
		'OnAreaQueryById' => ['little\area\event\OnAreaQueryById'],
		'OnAreaQueryByField' => ['little\area\event\OnAreaQueryByField'],
		'OnAreaQueryByFind' => ['little\area\event\OnAreaQueryByFind'],
		'OnAreaQueryByList' => ['little\area\event\OnAreaQueryByList'],
		'OnAreaDeleteById' => ['little\area\event\OnAreaDeleteById'],
		'OnAreaDeleteByWhere' => ['little\area\event\OnAreaDeleteByWhere'],
		'OnAreaUpdateById' => ['little\area\event\OnAreaUpdateById'],
		'OnAreaUpdateByWhere' => ['little\area\event\OnAreaUpdateByWhere'],
		'OnAreaSave' => ['little\area\event\OnAreaSave'],
	],
	'subscribe' => [],
];