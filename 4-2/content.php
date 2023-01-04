<?php
ini_set( 'display_errors', 1 );
ini_set('error_reporting', E_ALL);

require_once("getData.php");

function data_table() {
    try {
        $data = new getData();
        $stmt = $data -> getPostData();
        echo  '<tr bgcolor="#87ceed">
               <th>記事ID</th><th>タイトル</th><th>カテゴリ</th><th>本文</th><th>投稿日</th>
               </tr>';
        while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            echo '<tr bgcolor="#e0ffff">';
            echo  '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['title'].'</td>';
            if ($row['category_no'] == 1) {
                echo '<td>食事</td>';
            } elseif($row['category_no'] == 2){
                echo '<td>旅行</td>';
            } else {
                echo '<td>その他</td>';
            }
            echo '<td>'.$row['comment'].'</td>';
            echo '<td>'.$row['created'].'</td>';
            echo '</tr>';
            echo '<br>';
        }
    } catch (PDOException $e) {
        echo 'Error:' . $e -> getMessage();
        die();
    }
}

function getUser() {
    try {
        $data = new getData();
        $user_name = $data -> getUserData();
            echo $user_name['last_name'].$user_name['first_name'];
    } catch (PDOException $e) {
        echo 'Error:' . $e -> getMessage();
        die();
    }
}

function getLog() {
    try {
        $data = new getData();
        $log = $data -> getUserData();
        echo $log['last_login'];
    } catch (PDOException $e) {
        echo 'Error:' . $e -> getMessage();
        die();
    }
}

?>