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
<?php
    	$tab = unserialize(file_get_contents('./db/categorys'));
    	foreach ($tab as $key=>$value) {
            if ($value["id"] == $_GET['id'])
                echo '<h>'.$value['name'].'</h>';
        }
    	$tab = unserialize(file_get_contents('./db/products'));
    	$prod = unserialize(file_get_contents('./db/cat_prod'));
        echo '<table>';
        echo '<tr> <td>Продукт</td> <td>Цена</td> </tr>';
        foreach ($prod as $key=>$value) {
			if ($value["category_id"] == $_GET['id']) {
				foreach ($tab as $key => $item) {
					if ($value["product_id"] == $item['id'])
						echo "<tr><td><a href='product.php?id=" . $item['id'] . "'>" . $item['name'] . '</a></td><td>' . $item['price'] . '</td> </tr>';
				}
			}
		}
echo '</table>';


/*


foreach ($prod as $key=>$value) {
    	    if ($value["category_id"] == $_GET['id']){
            	foreach ($tab as $key=>$item) {
            	    if ($value["product_id"] == $item['id']){
            	       echo "<li><a href='product.php?id=".$item["id"]."'>-".$item['name'].'</a> <span>'. $item['price'].'</span></li>';
            	    }
            	}
    	    }
    	}
*/
?>
</body>
</html>