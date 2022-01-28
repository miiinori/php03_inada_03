<?php
//これを書けばエラー内容が表示される。
ini_set('display_errors',"On");

//1. POSTデータ取得
require_once('funcs.php');

$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flg = (array)$_POST['kanri_flg'];
$id = $_POST['id'];

//2.DB接続
$pdo = db_conn();

//3.SQL作成
$stmt = $pdo->prepare('UPDATE
                        gs_user_table
                        SET
                        name = :name,
                        lid = :lid,
                        lpw = :lpw,
                        kanri_flg = :kanri_flg
                        WHERE
                        id = :id;
                        ');


//数値の場合 PDO::PARMA_INT
//文字の場合 PDO::PARMA_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}


?>