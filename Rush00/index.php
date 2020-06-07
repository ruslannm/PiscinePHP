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
    ?>
</ul>
</body>
</html>