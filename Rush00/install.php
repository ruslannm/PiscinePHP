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
		$tab[] = array('id' => $i, 'name' => 'Товар'.$i, 'price' => 10);
	$file = $path."/products";
	file_put_contents($file, serialize($tab));
	$tab = null;
	for($i = 0; $i < 5; $i++)
		$tab[] = array('id' => $i, 'name' => 'Категория'.$i);
	$file = $path."/categorys";
	file_put_contents($file, serialize($tab));
	$tab = null;
	for($i = 0; $i < 5; $i++)
		for ($j = 0; $j < 10; $j++)
			$tab[] = array('category_id' => $i, 'product_id' => $j);
	$file = $path."/cat_prod";
	file_put_contents($file, serialize($tab));

	//	header("Location: index.html");
?>