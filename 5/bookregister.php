<?php
ini_set('display_errors',1);
ini_set('error_reporting', E_ALL);

require_once('db_connect.php');
require_once('function.php');

// ログイン状態をチェック
check_user_logged_in();

// 登録ボタンが押された場合
if (isset($_POST["register"])) {
    // タイトルtitleと発売日dateのチェック
    if (empty($_POST["title"])) {
        echo 'タイトルが未入力です。';
    } elseif (empty($_POST["date"])) {
        echo '発売日が未入力です。';
    }

    if (!empty($_POST["title"]) && !empty($_POST["date"])) {
        // タイトルと発売日、在庫数を格納
        $title = $_POST["title"];
        $date = $_POST["date"];
        $stock = $_POST["stock"];

        // $stockを数値型に変更
        $stock_number = (int) $stock;

        // PDOのインスタンスを取得
        $pdo = db_connect();
        try {
            // SQL文の準備
            $sql = "INSERT INTO books(title, date, stock) VALUE(:title, :date, :stock)";
            // プリペアードステートメント
            $stmt = $pdo -> prepare($sql);
            // タイトルと発売日、在庫数をバインド
            $stmt -> bindParam(':title', $title);
            $stmt -> bindParam(':date', $date);
            $stmt -> bindParam(':stock', $stock_number);
            // 実行
            $stmt -> execute();
            // main.phpにリダイレクト
            header("Location: main.php");
        } catch (PDOException $e) {
            echo 'Error'. $e -> getMessage();
            die();
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>本の登録</title>
</head>
<body>
    <h1>本　登録画面</h1>
    <form action="" method="POST">
        <input type="text" name="title" id="title" style="width:300px;height:30px;" placeholder="タイトル">
        <br><br>
        <input type="text" name="date" id="date" style="width:300px;height:30px;" placeholder="発売日">
        <br><br>
        在庫数 <br>
        <select name="stock" id="stock" style="width:200px;height:30px;">
            <option value="" hidden>選択してください</option>
            <?php for($i=1; $i<101; $i++) {
                echo ('<option value = "'.$i.'">'.$i.'</option>');
            } ?>
        </select>
        <br><br>
        <input type="submit" name="register" id="register" value="登録" class="botton">
    </form>
</body>
</html>