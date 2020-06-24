#!/usr/bin/php
<?php
$handle = STDIN;
while(!feof($handle))
{
    echo "Enter a number: ";
    $line = fgets($handle);
    if ($line) {
        $line = trim($line);
        if (is_numeric($line))
        {
            if (0 == $line % 2)
                echo "The number $line is even\n";
            else
                echo "The number $line is odd\n";
        } else
            echo "'$line' is not a number\n";
    }
}
echo "\n";
?>
