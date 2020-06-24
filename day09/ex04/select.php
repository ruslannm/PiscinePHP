<?php
$filename = 'list.csv';
$csv = file_get_contents($filename);
$lines = explode(PHP_EOL, $csv);
$array = array();
foreach ($lines as $line) {
	$array[] = str_getcsv($line,';');
}
echo json_encode($array);
?>