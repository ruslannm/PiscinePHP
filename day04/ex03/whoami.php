<?php
session_start();
if($_SESSION['loggued_on_user'])
{
	$str = $_SESSION['loggued_on_user'];
	$str_len = strlen($str);
	$i = 0;
	while ($i < $str_len && $str[$i] != '/')
		echo $str[$i++];
	echo "\n";
}
else
	echo "ERROR\n";
?>
