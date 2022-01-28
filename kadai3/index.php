<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザー登録画面</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ユーザー登録</legend>
                <label>名前：<input type="name" name="name"></label><br>
                <label>ID：<input type="lid" name="lid"></label><br>
                <label>PW：<input type="lpw" name="lpw"></label><br><br>
                <label>管理者：<input type="checkbox" name="kanri_flg[]" value="1"></label><br><br>
                <input type="submit" value="保存">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
