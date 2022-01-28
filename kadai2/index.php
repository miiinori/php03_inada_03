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
    <form method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>book log</legend>
                <label>書籍名：<input type="name" name="name"></label><br>
                <label>URL：<input type="url" name="url"></label><br>
                <label>コメント：<textArea name="comment" rows="4" cols="40"></textArea></label><br>
                <input type="submit" value="保存">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
