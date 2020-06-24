#!/usr/bin/php
<?php
if ($argc > 1)
{
    $arr = null;
    $arr = preg_split("/ +/", trim($argv[1]));
    $c = count($arr);
    $i = 0;
    while (++$i < $c)
        echo $arr[$i]." ";
    echo $arr[0]."\n";
}
?>