<?php
    session_start();
    if ($_POST['submit'] == 'Buy') {
		setcookie('id_'. $_GET['id'], $_POST["count"]);
		header("Location: basket.php");
	}
    elseif ($_POST['remove'] == 'Remove') {
	    setcookie('id_'. $_GET['id'], 0);
	    header("Location: basket.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop 42</title>
</head>
<body>
<?php
include_once ("top.php");
?>
<?php
        $tab = unserialize(file_get_contents('./db/products'));
    	foreach ($tab as $key=>$value) {
            if ($value["id"] == $_GET['id'])
                echo '<h1>'.$value['name'].' цена '.$value['price'].' руб.</h1>';
        }
        ?>
<form action='' method="POST">
    Купить<input type="text" name="count" value="1" /> шт.
    <input type="submit" name="submit" value="Buy" /><br />
</form>
<?php
if ($_COOKIE['id_'. $_GET['id']]){
	echo '<form action = "" method = "POST" >';
	echo 'В корзине '.$_COOKIE['id_'. $_GET['id']].'шт. Удалить из корзины? <input type = "submit" name = "remove" value = "Remove" />';
echo '</form >';
}
    	echo '<h2>Категории продукта</h2><br /><ul>';
    	$tab = unserialize(file_get_contents('./db/categorys'));
    	$prod = unserialize(file_get_contents('./db/cat_prod'));
    	foreach ($prod as $key=>$value) {
    	    if ($value["product_id"] == $_GET['id']){
            	foreach ($tab as $key=>$item) {
            	    if ($value["category_id"] == $item['id']){
            	       echo "<li><a href='category.php?id=".$item["id"]."'>-".$item['name'].'</a> </li>';
            	    }
            	}
    	    }
    	}
        echo '</ul>';
?>
</body>
</html>