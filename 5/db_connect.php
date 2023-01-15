<?php
define('DATABASE', 'book_data');
define('USERNAME', 'root');
define('PASSWORD', 'root');
define('PDO_DSN', 'mysql:host=localhost;charset=utf8;dbname='.DATABASE);

function db_connect() {
    try {
        // PDOインスタンス作成
        $pdo = new PDO (PDO_DSN, USERNAME, PASSWORD);
        // エラー処理方法の設定
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Error:'. $e -> getMessage();
        die();
    }
}
    
?>