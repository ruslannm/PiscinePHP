<div align="left">
	<a href="index.php">Shop 42</a>
</div>
<div align="right">
	<a href="basket.php">Корзина</a><br/>
	<?php

	if($_SESSION['loggued_on_user']) {
		echo '<a href="modif.html">Modif account</a><br/>';
		echo '<a href="orders.php">Архив заказов</a><br/>';
		if($_SESSION['loggued_on_user'] == 'root')
			echo '<a href="admin.php">Администрирование</a><br/>';
		echo '<form action="logout.php">';
		echo '<input type="submit" name="submit" value="logout" />';
		echo '</form>';
	}
	else {
		echo '<form action="login.php" method="POST">';
		echo 'Username: <input type="text" name="login" value=""/> <br/>';
		echo 'Password: <input type="password" name="passwd" value="" /> <br/>';
		echo '<input type="submit" name="submit" value="OK" />';
		echo '</form>';
		echo '<a href="create.html">Create account</a> <br/>';
	}
	?>
</div>
