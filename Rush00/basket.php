<?php
session_start();
$basket_price = 0;
foreach ($_COOKIE as $key=>$item) {
	$product = explode("_", $key);
	if ($product[0] == "id") {
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
<table>
    <caption>Состав корзины</caption>
    <tr> <td>Продукт</td> <td>Количество</td> <td>Цена</td> <td>Сумма</td></tr>
    <?php
    foreach ($basket as $item)
       	echo "<tr><td><a href='product.php?id=".$item[0]."'>".$item[1].'</a></td><td>'.$item[2].'</td> <td>'.$item[3].'</td><td>'.$item[4].'</td></tr>';
    echo '<tr><td></td> <td></td> <td>Всего:</td> <td>'.$basket_price.'</td> </tr>';
    echo '</table>';
if($_SESSION['loggued_on_user']) {
	echo '<form action="" method="POST">';
	echo 'Оформить заказ<input type="submit" name="submit" value="Order" />';
	echo '</form>';
}
else
	echo 'Для оформления заказа необходимо авторизоваться';
?>
</body>
</html>