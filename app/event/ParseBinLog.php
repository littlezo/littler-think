<?php

declare(strict_types=1);

namespace app\event;

use Com\Alibaba\Otter\Canal\Protocol\Column;
use Com\Alibaba\Otter\Canal\Protocol\Entry;
use Com\Alibaba\Otter\Canal\Protocol\EntryType;
use Com\Alibaba\Otter\Canal\Protocol\EventType;
use Com\Alibaba\Otter\Canal\Protocol\RowChange;
use Com\Alibaba\Otter\Canal\Protocol\RowData;
use littler\facade\Http;

class ParseBinLog
{
	/**
	 * @param Entry $entry
	 * @throws \Exception
	 */
	public static function parse($entry)
	{
		switch ($entry->getEntryType()) {
			case EntryType::TRANSACTIONBEGIN:
			case EntryType::TRANSACTIONEND:
				return;
				break;
		}

		$rowChange = new RowChange();
		$rowChange->mergeFromString($entry->getStoreValue());
		$evenType = $rowChange->getEventType();
		$header = $entry->getHeader();
		$table = $header->getTableName();
		// echo sprintf('================> binlog[%s : %d],name[%s,%s], eventType: %s', $header->getLogfileName(), $header->getLogfileOffset(), $header->getSchemaName(), $header->getTableName(), $header->getEventType()), PHP_EOL;

		if (in_array($header->getTableName(), ['lz_order_detail', 'lz_member_user'], true)) {
			/** @var RowData $rowData */
			foreach ($rowChange->getRowDatas() as $rowData) {
				switch ($evenType) {
				case EventType::DELETE:
					// self::ptColumn($rowData->getBeforeColumns());
					break;
				case EventType::INSERT:
					// self::ptColumn($rowData->getAfterColumns());
					break;
				default:
					// echo '-------> sql', PHP_EOL;
					// // echo $rowChange->getSql(), PHP_EOL;
					// echo '-------> before', PHP_EOL;
					// // self::ptColumn($rowData->getBeforeColumns());
					// echo '-------> after', PHP_EOL;
					// echo '------------------------------------------------------------------------', PHP_EOL;
					// self::ptColumn($rowData->getAfterColumns());
					self::monitor($rowData->getAfterColumns(), $table);
					break;
			}
			}
		}
	}

	private static function monitor($argv, $table)
	{
		$change_data = [];
		$change_field = [];
		foreach ($argv as $column) {
			$change_data[$column->getName()]= $column->getValue();
			if ($column->getUpdated()) {
				$change_field[]= $column->getName();
			}
		}
		if ($table=='lz_member_user') {
			if (in_array('level_id', $change_field, true)) {
				// $this->upgrade((int) $change_data['id']);
				$response = Http::get("http://localhost:9580/auto/upgrade/{$change_data['parent']}");
				if ($response) {
					// var_dump($response->json());
				}
				// var_dump('Upgrade self');
				var_dump('Upgrade self');
			}
			if (in_array('spl_id', $change_field, true)) {
				$response = Http::get("http://localhost:9580/auto/upgrade/{$change_data['parent']}");
				if ($response) {
					// var_dump($response->json());
				}
				// $this->upgrade((int) $change_data['parent']);
				var_dump('Upgrade parent');
			}
		}
		// var_dump($table, $change_field);
	}

	private static function ptColumn($columns)
	{
		// dump($columns);
		/** @var Column $column */
		foreach ($columns as $column) {
			// var_export($column);
			// echo sprintf('%s : %s  update= %s', $column->getName(), $column->getValue(), var_export($column->getUpdated(), true)), PHP_EOL;
		}
	}
}
