<?php
ini_set( 'display_errors', 1 );
ini_set('error_reporting', E_ALL);

require_once 'lib/password.php';
//connect();
// セッション開始
//session_start();
// DBサーバのURL
$db['host'] = "localhost";
// ユーザー名
$db['user'] = "root";
// ユーザー名のパスワード
$db['pass'] = "root";
// データベース名
$db['dbname'] = "YIGroupBlog";
//"loginManagement";
/*try {
    $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);
    $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    echo 'OK';
} catch (PDOException $e) {
    echo 'BUT'.$e->getMessage();
}*/


?>