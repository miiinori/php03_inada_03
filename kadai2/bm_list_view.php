<?php

require_once('funcs.php');
//funcs.phpを呼び出すコード。



// 1.  DB接続します
// try {
//   //Password:MAMP='root',XAMPP=''
//   $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost','root','root');
// } catch (PDOException $e) {
//   exit('DBConnectError'.$e->getMessage());
// }
$pdo = db_conn();


//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    // $error = $stmt->errorInfo();
    // exit("ErrorQuery:" . $error[2]);
    sql_error($stmt);

} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        $view .= '<a href="bm_update_view.php?id=' . $result['id'] . '">';
        $view .= h($result['datetime']) . '／' . h($result['name']) . '／' . h($result['comment']) . '／' . h($result['url']);
        $view .= '</a>';
        // $view .= '</p>';
        $view .= '<a href="delete.php?id=' . $result['id'] . '">';
        $view .= '<button type="button" class="btn btn-danger">削除</button>';
        $view .= '</a>';
        $view .= '<p>';



    }
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>
