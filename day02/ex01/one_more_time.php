#!/usr/bin/php
<?php
if (2 != $argc)
    exit(-1);
$arr = explode(" ", $argv[1]);
if (count($arr) != 5)
{
    echo "Wrong Format\n";
    exit(-1);
}
$valid = 0;
$days = array(
    "Monday" => "Lundi",
    "Tuesday" => "Mardi",
    "Wednesday" => "Mercredi",
    "Thursday" => "Jeudi",
    "Friday" => "Vendredi",
    "Saturday" => "Samedi",
    "Sunday" => "Dimanche");
$months = array(
    "1" => "Janvier",
    "2" => "Fevrier",
    "3" => "Mars",
    "4" => "Avril",
    "5" => "Mai",
    "6" => "Juin",
    "7" => "Juillet",
    "8" => "Aout",
    "9" => "Septembre",
    "10" => "Octobre",
    "11" => "Novembre",
    "12" => "Decembre");
$day_of_week = array_search(ucfirst($arr[0]), $days);
if ($day_of_week)
    $valid++;
if ($arr[1] > 0 && $arr[1] < 32 && preg_match("/^(([1-3][0-9])|[1-9])$/", $arr[1]))
    $valid++;
$month = array_search(ucfirst($arr[2]), $months);
if ($month)
    $valid++;
if ($arr[3] > 1969 && preg_match("/^[0-9]{4}$/", $arr[3]))
    $valid++;
$time = explode(":", $arr[4]);
if (count($time) != 3)
{
    echo "Wrong Format\n";
    exit(-1);
}
if ($time[0] >= 0 && $time[0] < 24 && preg_match("/^[0-9]{2}$/", $time[0]))
    $valid++;
if ($time[1] >= 0 && $time[1] < 60 && preg_match("/^[0-9]{2}$/", $time[1]))
    $valid++;
if ($time[2] >= 0 && $time[2] < 60 && preg_match("/^[0-9]{2}$/", $time[2]))
    $valid++;
if ($valid != 7)
{
    echo "Wrong Format\n";
    exit(-1);
}
//date_default_timezone_set("Europe/Moscow");
//date_default_timezone_set("Europe/Paris");

if (!checkdate($month, $arr[1], $arr[3]))
{
    echo "Wrong Format\n";
    exit(-1);
}
$result = mktime($time[0], $time[1], $time[2], $month, $arr[1], $arr[3]);
if ($day_of_week != @date(l, $result))
{
    echo "Wrong Format\n";
    exit(-1);
}
echo "$result\n";
?>