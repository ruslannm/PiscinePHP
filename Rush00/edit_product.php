<?php
session_start();
include_once ("admin.php");
echo $_SESSION['loggued_on_user'];
if($_SESSION['loggued_on_user'] == 'root') {

    $file = "./db/products";
    $tab = unserialize(file_get_contents($file));
    $tab_counters = unserialize(file_get_contents('./db/counter'));

    $tab[] = array('id' => $tab_counters[0]["product_id"], 'name' => $_POST['name'], 'price' => $_POST['price'], 'deleted' => 0);

    $tab_counters[0]["product_id"] = $tab_counters[0]["product_id"] + 1;

    file_put_contents('./db/counter', $tab_counters);
    file_put_contents($file, serialize($tab));
}
?>

<form action='' method="POST">
    Добавить товар: <br/>
    Имя  <input type="text" name="name" value="" /><br/>
    Цена <input type="text" name="price" value="" /><br/>
    <input type="submit" name="submit" value="add" />
</form>

<?php
if($_POST['submit'] == "add") {
    echo '<p> Добавлена новый товар <p/>';
    echo '<br/>';
    echo "Имя = ".$_POST['name'];
    echo '<br/>';
    echo "Цена = ".$_POST['price'];
    echo '<br/>';
    echo $tab_counters[0]["product_id"];
}
?>