<?php
ini_set('display_errors',1);
ini_set('error_reporting', E_ALL);

require_once('db_connect.php');
require_once('function.php');

// ログイン状態をチェック
check_user_logged_in();

// URLの？以降で渡されるIDをキャッチ
$id = $_GET['id'];
// もし、$idが空であったらmain.phpにリダイレクト
// 不正なアクセス対策
if (empty($id)) {
    header("Location: main.php");
    exit;
}

$pdo = db_connect();

try {
    // SQL文の準備
    $sql = "DELETE FROM books WHERE id = :id";
    // プリペアードステートメント
    $stmt = $pdo -> prepare($sql);
    // バインド
    $stmt -> bindParam(':id', $id);
    $stmt -> execute();
    header("Location: main.php");
} catch (PDOException $e) {
    echo 'Error'.$e -> getMessage();
    die();
}

?>