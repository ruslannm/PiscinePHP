#!/usr/bin/php
<?php
if ($argc > 1)
{
    $i = 0;
    while (++$i < $argc)
        echo $argv[$i]."\n";
}
?>