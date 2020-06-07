<?php
include("auth.php");
session_start();
if ($_POST['submit']) {
	if (auth($_POST['login'], $_POST['passwd'])) {
		$_SESSION['loggued_on_user'] = $_POST['login'];
	} else {
		$_SESSION['loggued_on_user'] = "";
	}
}
header("Location: index.php");
?>

