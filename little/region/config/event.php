<?php

return [
	'bind' => [],
	'listen' => [
		'OnRegionAreaReadAfter' => ['little\region\event\OnRegionAreaReadAfter'],
		'OnRegionAreaSetIncByField' => ['little\region\event\OnRegionAreaSetIncByField'],
		'OnRegionAreaSetDecByField' => ['little\region\event\OnRegionAreaSetDecByField'],
		'OnRegionAreaQueryById' => ['little\region\event\OnRegionAreaQueryById'],
		'OnRegionAreaQueryByField' => ['little\region\event\OnRegionAreaQueryByField'],
		'OnRegionAreaQueryByFind' => ['little\region\event\OnRegionAreaQueryByFind'],
		'OnRegionAreaQueryByList' => ['little\region\event\OnRegionAreaQueryByList'],
		'OnRegionAreaDeleteById' => ['little\region\event\OnRegionAreaDeleteById'],
		'OnRegionAreaDeleteByWhere' => ['little\region\event\OnRegionAreaDeleteByWhere'],
		'OnRegionAreaUpdateById' => ['little\region\event\OnRegionAreaUpdateById'],
		'OnRegionAreaUpdateByWhere' => ['little\region\event\OnRegionAreaUpdateByWhere'],
		'OnRegionAreaSave' => ['little\region\event\OnRegionAreaSave'],
	],
	'subscribe' => [],
];