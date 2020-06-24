#!/usr/bin/php
<?php
if ($argc > 1)
{
    $arr = null;
    $i = 0;
    while (++$i < $argc)
    {
        $str = preg_split("/ +/", trim($argv[$i]));
        foreach ($str as $item)
            $arr[] = $item;
    }
    sort($arr);
    foreach ($arr as $item)
        echo $item."\n";
}
?>
