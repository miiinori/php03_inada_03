<?php

//これを書けばエラー内容が表示される。
ini_set('display_errors',"On");

require_once('funcs.php');

//1. POSTデータ取得
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flg = $_POST['kanri_flg'];


//2. DB接続
$pdo = db_conn();

// ３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(name, lid, lpw, kanri_flg)
                        VALUES(:name, :lid, :lpw, :kanri_flg)");                        
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();


//４．データ登録処理後
if ($status === false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    sql_error($stmt);

  } else {
    redirect('index.php');
}

?>
