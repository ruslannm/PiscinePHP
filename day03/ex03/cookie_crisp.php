<?php
$arr = $_GET;
if ($arr["action"] && $arr["name"] && $arr["name"] != "")
{
    if ("set" == $arr["action"] && $arr["value"] && $arr["value"] != "")
        setcookie($arr["name"], $arr["value"]);
    elseif ("del" == $arr["action"] && !$arr["value"])
        setcookie($arr["name"], "", time() - 3600);
    elseif ("get" == $arr["action"] && !$arr["value"] && $_COOKIE[$arr["name"]] != null)
        echo $_COOKIE[$arr["name"]] . "\n";
}
?>
