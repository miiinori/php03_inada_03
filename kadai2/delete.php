<?php
require_once('funcs.php');
$id = $_GET['id'];


//2.DB接続
$pdo = db_conn();

//3.SQL作成
$stmt = $pdo->prepare('DELETE FROM gs_bm_table WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('bm_list_view.php');
}


?>