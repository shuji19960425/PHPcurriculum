<link rel="stylesheet" href="style.css">

<?php
$my_name = $_POST['my_name'];
$number = $_POST['number'];
$language = $_POST['lang'];
$command = $_POST['command'];
?>
<body class="top">
    <p><?php echo $my_name; ?>さんの結果は･･･？</p>
    <p>①の答え</p>
    <?php if ($number == 80) {
        echo "正解！";
    } else {
        echo "残念・・・";
    } ?>
    <!-- 80正解 -->
    <p>②の答え</p>
    <!-- HTML -->
    <?php if ($language == "HTML") {
        echo "正解！";
    } else {
        echo "残念・・・";
    } ?>
    <p>③の答え</p>
    <!-- select -->
    <?php if ($command == "select") {
        echo "正解！";
    } else {
        echo "残念・・・";
    } ?>
</body>