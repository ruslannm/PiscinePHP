<?php
session_start();
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
<H1>Категории товаров</H1>
<ul>
    <?php
    	$tab = unserialize(file_get_contents('./db/categorys'));
    	foreach ($tab as $key=>$value) {
            echo "<li><a href='category.php?id=".$value["id"]."'>-".$value['name'].'</a></li>';
    	}
    	echo '</ul>';
	$tab = unserialize(file_get_contents('./db/products'));
	$prod = unserialize(file_get_contents('./db/order_items'));
    echo '<H1>Популярные товары</H1>';
	echo '<table>';
    echo '<tr> <td>Продукт</td> <td>Цена</td> </tr>';
	foreach ($prod as $key=>$value) {
			foreach ($tab as $key => $item) {
				if ($value["product_id"] == $item['id']) {
					echo "<tr><td><a href='product.php?id=" . $item['id'] . "'>" . $item['name'] . '</a></td><td>' . $item['price'] . '</td> </tr>';
				}
			}
	}
	echo '</table>';
	?>
</ul>
</body>
</html>