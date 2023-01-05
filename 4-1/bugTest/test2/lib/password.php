<?php
ini_set( 'display_errors', 1 );
ini_set('error_reporting', E_ALL);

define('DB_DATABASE','YIGroupBlog');
define('DB_HOST', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
define('PDO_DSN', 'mysql:host=localhost;charset=utf8;dbname='.DB_DATABASE);

function connect() {
    try {
        $pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
        //echo '接続成功';
    } catch (PDOException $e) {
        echo '接続失敗'. $e -> getMessage();
        die();
    }
}


?>