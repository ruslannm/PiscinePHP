<?php
include("auth.php");
session_start();
if ($_POST['submit']) {
	if (auth($_POST['login'], $_POST['passwd'])) {
		$_SESSION['loggued_on_user'] = $_POST['login'];
?>
        <iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
		<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
        <form action="logout.php"">
            <input type="submit" name="submit" value="logout" />
        </form>
<?php
	} else {
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
	}
}
?>

