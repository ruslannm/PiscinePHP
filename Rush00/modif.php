<?php
session_start();
header("Location: index.php");
$path = "./db";
$file = $path."/users";
if ("OK" == $_POST["submit"] && $_POST["oldpw"] && $_POST["newpw"]) {
	$tab = unserialize(file_get_contents($file));
	foreach ($tab as $key => $user) {
		if ($user["login"] == $_SESSION["loggued_on_user"] && $user["passwd"] == hash("whirlpool", $_POST["oldpw"])) {
			$tab[$key]["passwd"] = hash("whirlpool", $_POST["newpw"]);
			file_put_contents($file, serialize($tab));
			echo "OK\n";
			exit();
		}
	}
}
echo "ERROR\n";
?>