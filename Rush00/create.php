<?php
header("Location: index.html");
if ("OK" == $_POST["submit"] && $_POST["login"] && $_POST["passwd"])
{
    $path = "./private";
    if (!file_exists($path))
        mkdir($path);
    $file = $path."/passwd";
    $tab = array();
    if (file_exists($file))
    {
        $tab = unserialize(file_get_contents($file));
        foreach ($tab as $key=>$user)
        {
            if ($user["login"] == $_POST["login"])
            {
                echo "ERROR\n";
                exit();
            }
        }

    }
    $tab[] = array("login" => $_POST["login"], "passwd" => hash("whirlpool" ,$_POST["passwd"]), 'type' => 'user');
    file_put_contents($file, serialize($tab));
    echo "OK\n";
}
else
    echo "ERROR\n";
?>