<?php
$filename = 'list.csv';
file_put_contents($filename, $_GET['id'] . ';' . $_GET['value'] . PHP_EOL, FILE_APPEND);
?>