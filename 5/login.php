<?php
ini_set('display_errors',1);
ini_set('error_reporting', E_ALL);

require_once('db_connect.php');

// セッション開始
session_start();

// $_POSTが空ではない場合
// ログインボタンが押された場合のみ下記の処理を実行する

if (!empty($_POST)) {
    // ログイン名が入力されていない場合の処理
    if (empty($_POST["name"])) {
        echo "名前が未入力です。";
    }
    if (empty($_POST["pass"])) {
        echo "パスワードが未入力です。";
    }

    // 両方入力されている場合
    if (!empty($_POST["name"]) && !empty($_POST["pass"])) {
        // ログイン名とパスワードのエスケープ処理
        $name = htmlspecialchars($_POST["name"], ENT_QUOTES);
        $pass = htmlspecialchars($_POST["pass"], ENT_QUOTES);
        // ログイン処理開始
        $pdo = db_connect();
        try {
            // データベースアクセスの処理
            $sql = "SELECT * FROM users WHERE name = :name";
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindParam(':name', $name);
            $stmt -> execute();
        } catch (PDOException $e) {
            echo 'Error'.$e -> getMessage();
            die();
        }

        // 結果が1行取得できたら
        if ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            // ハッシュ化されたパスワードを判定する定数型関数のpassword_verify
            // 入力された値と引っ張ってきた値が同じかを判定する
            if (password_verify($pass, $row['password'])) {
                // セッションを保存
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["user_name"] = $row['name'];
                // main.phpにリダイレクト
                header("Location: main.php");
                exit;
            } else {
                // パスワードが間違っているとき
                echo "パスワードが間違っています。";
            }
        } else {
            // ログイン名がないとき
            echo "ユーザー名かパスワードが間違っています。";
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
    <title>ログイン画面</title>
</head>
<body>
    <div class="h1">
    <h1>ログイン画面</h1>
    <div class="a-top"><a href="signup.php" class="top">新規ユーザー登録</a></div>
    </div>
    <form action="" method="POST">
        <input type="text" name="name" style="width:300px;height:30px;" placeholder="ユーザー名">
        <br><br>
        <input type="text" name="pass" style="width:300px;height:30px;" placeholder="パスワード">
        <br><br>
        <input type="submit" value="ログイン" class="botton">
    </form>
</body>
</html>