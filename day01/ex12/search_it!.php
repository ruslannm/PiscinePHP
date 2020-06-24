#!/usr/bin/php
<?php
if ($argc < 3)
    exit (0);
$k = $argv[1];
$result = null;
$i = 0;
while (++$i <$argc)
{
    $arr = explode(":", $argv[$i]);
    if (!strcmp($k, $arr[0]) && count($arr) == 2)
        $result = $arr[1];
}
if ($result)
    echo $result."\n";
?>