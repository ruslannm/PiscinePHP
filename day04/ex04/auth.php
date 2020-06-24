<?php
function auth($login, $passwd)
{
	$path = "../private/";
	$file = $path."/passwd";
	if ($login && $passwd && file_exists($file)) {
		$tab = unserialize(file_get_contents($file));
		foreach ($tab as $key => $user)
		{
			if ($user["login"] == $login && $user["passwd"] == hash("whirlpool", $passwd))
				return true;
		}
	}
	return false;
}
?>