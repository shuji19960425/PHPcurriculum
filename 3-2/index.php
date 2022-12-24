<?php
define("TAX",1.1);

$products = ["鉛筆" => 100,"消しゴム" => 150,"物差し" => 500];

function Total($products) {
    $num = $products * TAX;
    echo $num;
}

foreach ($products as $key => $value) {
    echo $key."の税込価格は";
    Total($value);
    echo "円です";
    echo '<br>';
}
?>