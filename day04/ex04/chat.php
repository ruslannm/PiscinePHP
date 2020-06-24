<?php
date_default_timezone_set("Europe/Moscow");
$path = "../private/";
$file = $path."/chat";
if (file_exists($file))
{
	$tab = unserialize(file_get_contents($file));
	foreach ($tab as $value)
	{
		echo '['. date('H:i', $value['time']).'] ';
		echo '<b>'.$value['login'].'</b>: ';
		echo $value['msg'].'<br />';
	}
}

