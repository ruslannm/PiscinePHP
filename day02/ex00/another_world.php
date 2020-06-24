#!/usr/bin/php
<?php
    if ($argc > 1)
    {
        $str = preg_replace('/\t+/', ' ', $argv[1]);
        $str = preg_replace('/(^ +| +$)/', '', $str);
        $str = preg_replace('/ {2,}/', ' ', $str);
        if ($str)
            echo $str."\n";
    }
?>