#!/usr/bin/php
<?php
if (4 != $argc)
    echo "Incorrect Parameters";
else
{
    $a = trim($argv[1]);
    $b = trim($argv[3]);
    $sign = trim($argv[2]);
    if (0 == $b && ("/" == $sign || "%" == $sign))
        echo "It is forbidden to divide by zero!";
    else if ("+" == $sign)
        echo $a + $b;
    else if ("-" == $sign)
        echo $a - $b;
    else if ("/" == $sign)
        echo $a / $b;
    else if ("*" == $sign)
        echo $a * $b;
    else if ("%" == $sign)
        echo $a % $b;
}
echo "\n";
?>