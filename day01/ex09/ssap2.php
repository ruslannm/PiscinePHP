#!/usr/bin/php
<?php
function ft_cmp($a, $b)
{
    $len_a = strlen($a);
    $len_b = strlen($b);
    $i = 0;
    $line = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
    while (($i < $len_a) || ($i < $len_b))
    {
        $a_index = stripos($line, $a[$i]);
        $b_index = stripos($line, $b[$i]);
        if ($a_index > $b_index)
            return (1);
        else if ($a_index < $b_index)
            return (-1);
        else
            $i++;
    }
}
if ($argc > 1)
{
    $arr = array();
    $i = 0;
    while (++$i < $argc)
    {
        $str = preg_split("/ +/", trim($argv[$i]));
        foreach ($str as $item)
            $arr[] = $item;
    }
    usort($arr, "ft_cmp");
    foreach ($arr as $item)
        echo $item."\n";
}
?>
