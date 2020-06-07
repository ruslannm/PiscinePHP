<?php
    $path = "./db";
    if (file_exists($path))
	{
		echo "ERROR. The shop exists\n";
		exit();
	}
	else
        mkdir($path);
	$user = 'root';
	$passwd = '1234';
	$tab[] = array("login" => $user, "passwd" => hash("whirlpool", $passwd), 'type' => 'root');
	$file = $path."/users";
	file_put_contents($file, serialize($tab));
	$tab = null;
	for($i = 0; $i < 10; $i++)
		$tab[] = array('id' => $i, 'name' => 'Товар'.$i, 'price' => 10, 'deleted'=>0);
	$file = $path."/products";
	file_put_contents($file, serialize($tab));
	$tab = null;
	for($i = 0; $i < 5; $i++)
		$tab[] = array('id' => $i, 'name' => 'Категория'.$i, 'deleted'=>0);
	$file = $path."/categorys";
	file_put_contents($file, serialize($tab));
	$tab = null;
	for($i = 0; $i < 5; $i++)
		for ($j = 0; $j < 10; $j++) {
			if ($i % 2 && $j % 2)
				$tab[] = array('category_id' => $i, 'product_id' => $j);
			elseif ($i % 2 == 0 && $j % 2 == 0)
				$tab[] = array('category_id' => $i, 'product_id' => $j);
		}
	$file = $path."/cat_prod";
	file_put_contents($file, serialize($tab));
	$tab = null;
	$tab[] = array('id' => 1, 'user' => 'root', 'time'=>time(), 'price' => 10);
	$file = $path."/orders";
	file_put_contents($file, serialize($tab));
	$tab = null;
	$tab[] = array('order_id' => 1, 'product_id' => 1, 'count' => 1 ,'price' => 10, 'total_price' => 10);
	$file = $path."/order_items";
	file_put_contents($file, serialize($tab));
	$tab = null;
	$tab[] = array('order_id' => 2, 'category_id' =>5, 'product_id' => 10);
	$file = $path."/counter";
	file_put_contents($file, serialize($tab));
	header("Location: index.html");
?>