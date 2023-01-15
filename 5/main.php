<?php
ini_set('display_errors',1);
ini_set('error_reporting', E_ALL);

require_once('db_connect.php');
require_once('function.php');

// ログイン状態をチェック
check_user_logged_in();
// PDOインスタンスを取得
$pdo = db_connect();

try {
    // SQL文の準備
    $sql = "SELECT * FROM books ORDER BY date ASC";
    // プリペアードステートメント
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
} catch (PDOException $e) {
    echo 'Error'.$e -> getMessage();
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>在庫一覧画面</title>
</head>
<body>
    <h1>在庫一覧画面</h1>
    <div class="h1">
    <div><a href="bookregister.php" class="new">新規登録</a></div>
    <div><a href="logout.php" class="out">ログアウト</a></div>
    </div>
    <table border=1 cellspacing=0>
        <tr bgcolor=#f5f5f5>
            <th>タイトル</th>
            <th>発売日</th>
            <th>在庫数</th>
            <th></th>
        </tr>
        <?php while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><a href="delete_book.php?id=<?php echo $row['id']; ?>"  class="delete">削除</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>