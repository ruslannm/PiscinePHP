<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>42Shop</title>
</head>
<body>
<?php
    	$tab = unserialize(file_get_contents('./db/categorys'));
    	foreach ($tab as $key=>$value) {
            if ($value["id"] == $_GET['id'])
                echo '<h>'.$value['name'].'</h>';
        }
    	echo '<ul>';
    	$tab = unserialize(file_get_contents('./db/products'));
    	$prod = unserialize(file_get_contents('./db/cat_prod'));
    	foreach ($prod as $key=>$value) {
    	    if ($value["category_id"] == $_GET['id']){
            	foreach ($tab as $key=>$item) {
            	    if ($value["product_id"] == $item['id']){
            	       echo "<li><a href='product.php?id=".$item["id"]."'>-".$item['name'].'</a> <span>'. $item['price'].'</span></li>';
            	    }
            	}
    	    }
    	}
        echo '</ul>';
?>
</body>
</html>