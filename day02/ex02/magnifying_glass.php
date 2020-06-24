#!/usr/bin/php
<?php
function ft_replace($matches)
{
    $new = $matches[1].strtoupper($matches[2]).$matches[3];
    return ($new);
}
if ($argc == 2 && file_exists($argv[1])) {

    $str = file_get_contents($argv[1]);
    $str = preg_replace_callback("/(<a )(.*?)(>)(.*)(<\/a>)/i",
        function($matches) {
            $matches[0] = @preg_replace_callback("/( title=\")(.*?)(\")/i",
                'ft_replace', $matches[0]);
            $matches[0] = @preg_replace_callback("/(>)(.*?)(<)/i",
                'ft_replace', $matches[0]);
            return ($matches[0]);
        },
        $str);
    echo $str;
}
?>