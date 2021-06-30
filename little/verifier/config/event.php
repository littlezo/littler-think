<?php

return [
	'bind' => [],
	'listen' => [
		'OnVerifierReadAfter' => ['little\verifier\event\OnVerifierReadAfter'],
		'OnVerifierSetIncByField' => ['little\verifier\event\OnVerifierSetIncByField'],
		'OnVerifierSetDecByField' => ['little\verifier\event\OnVerifierSetDecByField'],
		'OnVerifierQueryById' => ['little\verifier\event\OnVerifierQueryById'],
		'OnVerifierQueryByField' => ['little\verifier\event\OnVerifierQueryByField'],
		'OnVerifierQueryByFind' => ['little\verifier\event\OnVerifierQueryByFind'],
		'OnVerifierQueryByList' => ['little\verifier\event\OnVerifierQueryByList'],
		'OnVerifierDeleteById' => ['little\verifier\event\OnVerifierDeleteById'],
		'OnVerifierDeleteByWhere' => ['little\verifier\event\OnVerifierDeleteByWhere'],
		'OnVerifierUpdateById' => ['little\verifier\event\OnVerifierUpdateById'],
		'OnVerifierUpdateByWhere' => ['little\verifier\event\OnVerifierUpdateByWhere'],
		'OnVerifierSave' => ['little\verifier\event\OnVerifierSave'],
		'OnVerifierCodeReadAfter' => ['little\verifier\event\OnVerifierCodeReadAfter'],
		'OnVerifierCodeSetIncByField' => ['little\verifier\event\OnVerifierCodeSetIncByField'],
		'OnVerifierCodeSetDecByField' => ['little\verifier\event\OnVerifierCodeSetDecByField'],
		'OnVerifierCodeQueryById' => ['little\verifier\event\OnVerifierCodeQueryById'],
		'OnVerifierCodeQueryByField' => ['little\verifier\event\OnVerifierCodeQueryByField'],
		'OnVerifierCodeQueryByFind' => ['little\verifier\event\OnVerifierCodeQueryByFind'],
		'OnVerifierCodeQueryByList' => ['little\verifier\event\OnVerifierCodeQueryByList'],
		'OnVerifierCodeDeleteById' => ['little\verifier\event\OnVerifierCodeDeleteById'],
		'OnVerifierCodeDeleteByWhere' => ['little\verifier\event\OnVerifierCodeDeleteByWhere'],
		'OnVerifierCodeUpdateById' => ['little\verifier\event\OnVerifierCodeUpdateById'],
		'OnVerifierCodeUpdateByWhere' => ['little\verifier\event\OnVerifierCodeUpdateByWhere'],
		'OnVerifierCodeSave' => ['little\verifier\event\OnVerifierCodeSave'],
	],
	'subscribe' => [],
];