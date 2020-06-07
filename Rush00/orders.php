<?php
session_start();
if($_SESSION['loggued_on_user'])
{
    $orders = unserialize(file_get_contents('./db/orders'));
	$order_items = unserialize(file_get_contents('./db/order_items'));
    $products = unserialize(file_get_contents('./db/products'));
    foreach ($orders as $key1 => $value1) {
    {
		 if($_SESSION['loggued_on_user'] == $value1['user'])
			 $tab[] = array($value1['id'], $value1['time'], $value1['price']);
			 foreach ($order_items as $key2 => $value2) {
				if ($value2['order_id'] == $value1['id']) {
				    foreach ($products as $key3 => $value3) {
						if ($value2['product_id'] == $value3['id'])
							$items[] = array($value2['order_id'],$value3['id'], $value3['name'], $value2['count'], $value2['price'], $value2['total_price']);
					}
				}
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
if ($tab) {
	echo '<h1>Ваши заказы</h1>';
	foreach ($tab as $key => $order) {
		echo "<h2>" . $order[0] . " от " . date("d.m.Y", $order[1]) . ' на сумму: <span>' . $order[2] . '</span></h2>';
		echo '<table> <caption>Состав заказа</caption>';
		echo '<tr> <td>Продукт</td> <td>Количество</td> <td>Цена</td> <td>Сумма</td></tr>';
        foreach ($items as $key4=>$value4) {
            if ($value4[0] == $order[0]) {
				echo "<tr><td><a href='product.php?id=1" . $value4[1] . "'>" . $value4[2] . '</a></td><td>' . $value4[3] . '</td>';
				echo '<td>' . $value4[4] . '</td><td>' . $value4[5] . '</td></tr>';
			}
		}
		echo '</table>';
	}
}
else
    echo '<h1>У вас еще не было заказов</h1>'
 ?>
</body>
</html>