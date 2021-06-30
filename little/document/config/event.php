<?php

return [
	'bind' => [],
	'listen' => [
		'OnDocumentReadAfter' => ['little\document\event\OnDocumentReadAfter'],
		'OnDocumentSetIncByField' => ['little\document\event\OnDocumentSetIncByField'],
		'OnDocumentSetDecByField' => ['little\document\event\OnDocumentSetDecByField'],
		'OnDocumentQueryById' => ['little\document\event\OnDocumentQueryById'],
		'OnDocumentQueryByField' => ['little\document\event\OnDocumentQueryByField'],
		'OnDocumentQueryByFind' => ['little\document\event\OnDocumentQueryByFind'],
		'OnDocumentQueryByList' => ['little\document\event\OnDocumentQueryByList'],
		'OnDocumentDeleteById' => ['little\document\event\OnDocumentDeleteById'],
		'OnDocumentDeleteByWhere' => ['little\document\event\OnDocumentDeleteByWhere'],
		'OnDocumentUpdateById' => ['little\document\event\OnDocumentUpdateById'],
		'OnDocumentUpdateByWhere' => ['little\document\event\OnDocumentUpdateByWhere'],
		'OnDocumentSave' => ['little\document\event\OnDocumentSave'],
	],
	'subscribe' => [],
];