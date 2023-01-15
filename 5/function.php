<?php 
/**
 * ログイン状態を確認
 * $_SESSION["user_name"]が空だった場合、
 * ログインページにリダイレクトする
 * @return void
 */
function check_user_logged_in() {
    // セッション開始
    session_start();
    // セッションにuser_nameの値が無ければlogin.phpにリダイレクトする
    if (empty($_SESSION["user_name"])) {
        header("Location: login.php");
        exit;
    }
}
?>