<?php
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}

echo "<br>";

$count = 1;
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $count . " ";
        $count++;
    }
    echo "<br>";
}

echo "<br>";

$char = 65; 
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo chr($char) . " ";
        $char++;
    }
    echo "<br>";
}
?>
