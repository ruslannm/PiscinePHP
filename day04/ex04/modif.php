<?php
header("Location: index.html");
$path = "../private/";
$file = $path."/passwd";
if ("OK" == $_POST["submit"] && $_POST["login"] && $_POST["oldpw"] && $_POST["newpw"] && file_exists($file)) {
	$tab = unserialize(file_get_contents($file));
	foreach ($tab as $key => $user) {
		if ($user["login"] == $_POST["login"] && $user["passwd"] == hash("whirlpool", $_POST["oldpw"])) {
			$tab[$key]["passwd"] = hash("whirlpool", $_POST["newpw"]);
			file_put_contents($file, serialize($tab));
			echo "OK\n";
			exit();
		}
	}
}
echo "ERROR\n";
?>