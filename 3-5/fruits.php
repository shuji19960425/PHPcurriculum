<?php
$fruits = ["りんご" => 100,"みかん" => 150,"もも" => 500];
$quantity = [3,1,6];
$i = 0;

function totalFruits($fruits,$quantity) {
    $num = $fruits * $quantity;
    echo $num;
}

foreach ($fruits as $key => $value) {
    $many = $quantity[$i];
    echo $key."は".$many."個で";
    totalFruits($value,$many);
    echo "円です。";
    $i++;
    echo '<br>';
}
?>