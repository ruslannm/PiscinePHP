<?php
function ft_split($str)
{
    $arr = null;
    if ($str != null) {
        $arr = preg_split("/ +/", trim($str));
        sort($arr);
    }
    return $arr;
}
?>
