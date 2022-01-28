<?php

//1.IDを取得する
$id = $_GET['id'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//4．データ表示
$view = "";
if ($status == false) {
    sql_error($stmt);

} else {
    $view = $stmt->fetch();
    }

// var_dump($view);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">登録データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ユーザー登録</legend>
                <label>名前：<input type="name" name="name" value=<?= $view['name'] ?>></label><br>
                <label>ID：<input type="lid" name="lid" value=<?= $view['lid'] ?>></label><br>
                <label>PW：<input type="lpw" name="lpw" value=<?= $view['lpw'] ?>></label><br>
                <label>管理者：<input type="checkbox" name="kanri_flg[]" value="1"><?= $view['kanri'] ?></label><br><br>
               
               
                <input type="hidden" name="id" value=<?= $view['id'] ?>><br>
                <input type="submit" value="保存">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>