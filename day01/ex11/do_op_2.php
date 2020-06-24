#!/usr/bin/php
<?php
if ($argc != 2)
    echo "Incorrect Parameters\n";
else
{
    $sign = "0";
    if (strpos($argv[1], "+") !== false) {
        $tab = explode("+", $argv[1]);
        $sign = "+";
    }
    if (strpos($argv[1], "-") !== false) {
        if ("0" != $sign)
        {
            echo "Syntax Error\n";
            exit();
        }
        $tab = explode("-", $argv[1]);
        $sign = "-";
    }
    if (strpos($argv[1], "*") !== false) {
        if ("0" != $sign)
        {
            echo "Syntax Error\n";
            exit();
        }
        $tab = explode("*", $argv[1]);
        $sign = "*";
    }
    if (strpos($argv[1], "/") !== false) {
        if ("0" != $sign)
        {
            echo "Syntax Error\n";
            exit();
        }
        $tab = explode("/", $argv[1]);
        $sign = "/";
    }
    if (strpos($argv[1], "%") !== false) {
        if ("0" != $sign)
        {
            echo "Syntax Error\n";
            exit();
        }
        $tab = explode("%", $argv[1]);
        $sign = "%";
    }
    if ("0" == $sign)
    {
        echo "Syntax Error\n";
        exit();
    }
    if (count($tab) != 2)
    {
        echo "Syntax Error\n";
        exit();
    }
    else
    {
        $a = trim($tab[0]);
        $b = trim($tab[1]);
        if (ctype_digit($a) && ctype_digit($b))
        {
            if (0 == $b && ("/" == $sign || "%" == $sign))
                echo "It is forbidden to divide by zero!";
            else if ("+" == $sign)
                echo ($a + $b);
            else if ("-" == $sign)
                echo ($a - $b);
            else if ("*" == $sign)
                echo ($a * $b);
            else if ("/" == $sign)
                echo ($a / $b);
            else if ("%" == $sign)
                echo ($a % $b);
            echo "\n";
        }
        else
            echo "Syntax Error\n";
    }
}
?>
