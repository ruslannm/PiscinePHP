<?php
$filename = 'list.csv';
$csv = file_get_contents($filename);
$lines = explode(PHP_EOL, $csv);
$array = array();
foreach ($lines as $line) {
	$array[] = str_getcsv($line,';');
}
$fp = fopen($filename, 'w+');
foreach ($array as $row) {
	if ($row[0] != $_GET['id']) {
		fputcsv($fp, $row, ';');
	}
}
fclose($fp);
?>
