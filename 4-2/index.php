<?php
ini_set( 'display_errors', 1 );
ini_set('error_reporting', E_ALL);
require_once("content.php");

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="head">
        <div class="img1"><img src="logo.png" alt="logo" width="120px" height="100px"></div>
        <div class="main">
            <div class="name">
                ようこそ <?php getUser(); ?> さん
            </div>
            <div class="date">最終ログイン日:<?php getLog(); ?></div>
        </div>
    </div>
    <!-- 記事一覧 -->
    <div class="table">
        <table border="1">
                <?php data_table(); ?>
        </table>
    </div>
    
    <div class="footer">Y&I group.inc</div>

</body>
</html>