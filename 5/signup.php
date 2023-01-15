<?php
ini_set('display_errors',1);
ini_set('error_reporting', E_ALL);


require_once('db_connect.php');

if (isset($_POST["signup"])) {
    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        $pdo = db_connect();

        // 値を格納
        $username = $_POST["name"];
        $password = $_POST["password"];

        try {
            // SQL文
            $sql = "INSERT INTO users(name, password) VALUE(?, ?)";
            // パスワードのハッシュ化
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            // プリペアードステートメント
            $stmt = $pdo -> prepare($sql);
            // バインド
            $stmt -> bindValue(':password', $password_hash);
            $stmt -> execute(array($username, $password_hash));
            // 登録完了メッセージ
            echo "新規登録が完了しました。";
        } catch (PDOException $e) {
            echo "登録失敗".$e -> getMessage();
            die();
        }
    } else {
        echo "名前かパスワードが未入力です。";
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
    <title>新規ユーザー登録</title>
</head>
<body>
    <div class="h1">
    <h1>ユーザー登録画面</h1>
    <div class="a-top"><a href="login.php" class="top">ログイン画面</a></div>
    </div>
    <form action="" method="POST">
        <input type="text" name="name" id="name" style="width:300px;height:30px;" placeholder="ユーザー名">
        <br><br>
        <input type="password" name="password" id="password" style="width:300px;height:30px;" placeholder="パスワード">
        <br><br>
        <input type="submit" name="signup" id="signup" value="新規登録" class="botton">
    </form>
</body>
</html>