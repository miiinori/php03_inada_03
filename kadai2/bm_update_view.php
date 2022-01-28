<?php


//1.IDを取得する
$id = $_GET['id'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_bm_table WHERE id = :id');
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
    <title>データ登録</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="bm_list_view.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="bm_update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>book log</legend>
                <label>書籍名：<input type="name" name="name" value=<?= $view['name'] ?>></label><br>
                <label>URL：<input type="url" name="url" value=<?= $view['url'] ?>></label><br>
                <label>コメント：<textArea name="comment" rows="4" cols="40"><?= $view['comment'] ?></textArea></label><br>
                <input type="hidden" name="id" value=<?= $view['id'] ?>><br>
                <input type="submit" value="保存">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
