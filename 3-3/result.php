<?php
$my_name = $_POST['my_name'];
$number = $_POST['number'];
$x = mt_rand(1,6);
function luckyNumber($number,$x) {
    $lucky = $number * $x;
    echo $lucky;
}
date_default_timezone_set('Asia/Tokyo');

?>

<p><?php echo date('Y年m月d日 H時i分s秒'); ?></p>
<p>名前は<?php echo $my_name; ?>です。</p>
<p>番号は<?php luckyNumber($number,$x); ?>です。</p>
<p>結果は<?php
        $lucky = $number * $x;
        if ($lucky<=10) {
            echo "凶";
        }elseif ($lucky<=15) {
            echo "小吉";
        }elseif ($lucky<=20) {
            echo "中吉";
        }elseif ($lucky<=25) {
            echo "吉";
        }elseif ($lucky<=37) {
            echo "大吉";
        } elseif ($lucky>=37) {
            echo "残念";
        }
    ?>
です。</p>