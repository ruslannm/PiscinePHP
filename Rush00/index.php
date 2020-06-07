<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>42shop</title>
</head>
<body>
<div>
    <p>Shop 42</p>
</div>
<form action="login.php" method="POST">
    Username: <input type="text" name="login" value=""/> <br/>
    Password: <input type="password" name="passwd" value="" /> <br/>
    <input type="submit" name="submit" value="OK" />
</form>
<a href="create.html">Create account</a> <br/>
<a href="modif.html">Modif account</a>
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