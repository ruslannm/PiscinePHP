#!/usr/bin/php
<?php
if (2 == $argc)
{
    $str = trim($argv[1]);
    $str = preg_replace("/ +/", " ", $str);
    if ($str)
        echo $str."\n";
}
?>
