<?php
ini_set( 'display_errors', 1 );
ini_set('error_reporting', E_ALL);

//require_once('lib/password.php');

function lastinsertid() {
    try {
        $sql = "SELECT * FROM users WHERE id";
        $pdo = connect();
        $stmt = $pdo-> prepare($sql);
        $stmt  -> execute();
        while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            return $row['id'];
        }
    } catch(PDOException $e) {
        echo '接続失敗'. $e  -> getMessage();
        die();
    }
}

?>