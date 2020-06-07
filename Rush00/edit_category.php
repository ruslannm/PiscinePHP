<?php
session_start();
include_once ("admin.php");
if($_SESSION['loggued_on_user'] == 'root') {
	$path = "./db";
    $file = $path . "/categorys";
	$file_counters = $path . "/counter";

	$fd = fopen($file, 'c+');
	$fd_counters = fopen($file_counters, 'c+');
	if (flock($fd, LOCK_SH | LOCK_EX) && flock($fd_counters, LOCK_SH | LOCK_EX)) {
	    $tab = unserialize(file_get_contents($file));
		$tab_counters = unserialize(file_get_contents($file_counters));
		$tab[] = array('id' => $tab_counters[0]["category_id"], 'name' => $_POST['name'], 'deleted' => 0);
		$tab_counters[0]["category_id"] = $tab_counters[0]["category_id"] + 1;
		file_put_contents($file_counters, serialize($tab_counters));
		file_put_contents($file, serialize($tab));
		flock($fd, LOCK_UN);
		flock($fd_counters, LOCK_UN);
	}
	fclose($fd);
	fclose($fd_counters);
}

?>

<form action='' method="POST">
    Добавить категорию товаров: <br/>
    Имя <input type="text" name="name" value="" /><br/>
    <input type="submit" name="submit" value="add" />
</form>

<?php
if($_POST['submit'] == "add") {
    echo '<p> Добавлена новая категория <p/>';
    echo '<br/>';
    echo "Имя = ".$_POST['name'];
    echo '<br/>';
}
?>