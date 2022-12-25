<?php
$number = $_POST['number'];

$str = strlen($number);
/*
文字列計算
5文字あるとすると、
5文字の中から1文字を選ぶ
6文字目を選んではならない
countを使う？
*/

$rand = mt_rand(0,$str);
/*
ランダムの数を取得
残りは文字列から数字を抜き出す
*/

$result = substr($number,$rand,1);
//抜き出す数字を確定

date_default_timezone_set('Asia/Tokyo');
?>

<P><?php echo date("Y/m/d"); ?>の運勢は</p>
<p>選ばれた数字は<?php echo $result; ?></p>
<?php 
if ($result == 0) {
    echo "凶";
}elseif ($result <= 3) {
    echo "小吉";
}elseif ($result <= 6) {
    echo "中吉";
}elseif ($result <= 8) {
    echo "吉";
}elseif ($result == 9) {
    echo "大吉";
}
?>

