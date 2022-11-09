<?php
//0. SESSION開始！！
session_start();

//関数群読み込み
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規登録</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Head[Start] -->
<header>

</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<section id ="main">
<form method="POST" action="user_insert.php">
    <div class="jumbotron">
        <fieldset>
            <legend>新規登録画面</legend>
            <label>名前：<input type="text" name="name"></label><br>
            <label>LoginID：<input type="text" name="lid"></label><br>
            <label>Loginパスワード：<input type="password" name="lpw1"></label><br>
            <label>確認用パスワード：<input type="password" name="lpw2"></label><br>
            <label for="view_name">役職</label><br>
	        <select name="kanri_flg">
		        <option value="0">一般</option>
		        <option value="1">管理者</option>
	        </select><br>
            <input type="submit" value="登録" style="margin-top: 20px;">
        </fieldset>
    </div>
</form>
<ul>
<li style = "margin: 15px"><a href="select.php">戻る</a></li>
</ul>
</secstin>
<!-- Main[End] -->


    </body>
</html>
