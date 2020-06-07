<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>42Shop</title>
</head>
<body>
<?php
    	$tab = unserialize(file_get_contents('./db/products'));
    	foreach ($tab as $key=>$value) {
            if ($value["id"] == $_GET['id'])
                echo '<h>'.$value['name'].' цена '.$value['price'].' руб.</h>';
        }
    	echo '<ul>';
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