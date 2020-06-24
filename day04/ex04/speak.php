<?php
session_start();
if($_SESSION['loggued_on_user'])
{
	if ($_POST['submit'] == 'Send message') {
		$path = "../private/";
		if (!file_exists($path))
			mkdir($path);
		$file = $path . "/chat";
		$file_ex=file_exists($file);
		$fd = fopen($file, 'c+');
		if (flock($fd, LOCK_SH | LOCK_EX)) {
			if (file_ex)
				$tab = unserialize(file_get_contents($file));
			$tab[] = array("login" => $_SESSION["loggued_on_user"], 'time' => time(), 'msg' => $_POST["msg"]);
			file_put_contents($file, serialize($tab));
			flock($fd, LOCK_UN);
		}
		fclose($fd);
	}
?>
<html>
<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
<head></head>
	<body>
	<form action='' method="POST">
		<input type="text" name="msg" value=""/>
		<input type="submit" name="submit" value="Send message" />
	</form>
	</body>
	</html>
<?php
}
?>
