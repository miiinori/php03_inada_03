<?php

//1. POSTデータ取得
require_once('funcs.php');

$name = $_POST['name'];
$url = $_POST['url'];
$comment = $_POST['comment'];
$id = $_POST['id'];


//2.DB接続
$pdo = db_conn();

//3.SQL作成
$stmt = $pdo->prepare('UPDATE
                        gs_bm_table
                        SET
                        name = :name,
                        url = :url,
                        comment = :comment,
                        datetime = sysdate()
                        WHERE
                        id = :id;
                        ');


//数値の場合 PDO::PARMA_INT
//文字の場合 PDO::PARMA_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('bm_list_view.php');
}


?>