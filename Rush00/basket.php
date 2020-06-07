<?php
session_start();
$basket_price = 0;
foreach ($_COOKIE as $key=>$item) {
	$product = explode("_", $key);
	if ($product[0] == "id" && $item) {
		$tab = unserialize(file_get_contents('./db/products'));

		foreach ($tab as $key => $value) {
			if ($product[1] == $value['id']) {
				$total_price = $value['price'] * $item;
				$basket_price = $basket_price + $total_price;
				$basket[] = array($product[1], $value['name'], $item, $value['price'], $total_price);
			}
		}
	}
}
if ($_POST['submit'] == 'Order') {
	$path = "./db";
	$file_orders = $path . "/orders";
	$file_order_items = $path . "/order_items";
	$file_counters = $path . "/counter";
	$fd_orders = fopen($file_orders, 'c+');
	$fd_order_items = fopen($file_order_items, 'c+');
	$fd_counters = fopen($file_counters, 'c+');
	if (flock($fd_orders, LOCK_SH | LOCK_EX) && flock($fd_order_items, LOCK_SH | LOCK_EX) && flock($fd_counters, LOCK_SH | LOCK_EX)) {
		$tab_orders = unserialize(file_get_contents($file_orders));
		$tab_order_items = unserialize(file_get_contents($file_order_items));
		$tab_counters = unserialize(file_get_contents($file_counters));
		$tab_orders[] = array("id" => $tab_counters[0]["order_id"], "user" => $_SESSION["loggued_on_user"], 'time' => time(), 'price' => $basket_price);
		file_put_contents($file_orders, serialize($tab_orders));
		foreach ($basket as $value)
        {
			$tab_order_items[] = array("order_id" => $tab_counters[0]["order_id"], "product_id"=>$value[0], "count"=>$value[2],"price"=>$value[3],"total_price" =>$value[4]);
			setcookie('id_'. $value[0], 0);
        }
		file_put_contents($file_order_items, serialize($tab_order_items));
		$tab_counters[0]["order_id"] = $tab_counters[0]["order_id"] + 1;
		file_put_contents($file_counters, serialize($tab_counters));
		flock($fd_orders, LOCK_UN);
		flock($fd_order_items, LOCK_UN);
		flock($fd_counters, LOCK_UN);
	}
	fclose($fd_orders);
	fclose($fd_order_items);
	fclose($fd_counters);
	header("Location: index.php");
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
    if ($basket){
    echo '<table>  <caption>Состав корзины</caption>';
    echo '<tr> <td>Продукт</td> <td>Количество</td> <td>Цена</td> <td>Сумма</td><td>Изменить</td></tr>';
    foreach ($basket as $item)
       	echo "<tr><td><a href='product.php?id=".$item[0]."'>".$item[1].'</a></td><td>'.$item[2].'</td> <td>'.$item[3].'</td><td>'.$item[4].'</td>';
    echo "<td><a href='product.php?id=".$item[0]."'>Изменить количество/удалить</a></td></tr>";
    echo '<tr><td></td> <td></td> <td>Всего:</td> <td>'.$basket_price.'</td> <td></td></tr>';
    echo '</table>';
    if($_SESSION['loggued_on_user']) {
	    echo '<form action="" method="POST">';
	    echo 'Оформить заказ<input type="submit" name="submit" value="Order" />';
	    echo '</form>';
    }
    else
	    echo 'Для оформления заказа необходимо авторизоваться';
    }
else
	echo '<H1>Корзина пустая</H1>';
?>
</body>
</html>