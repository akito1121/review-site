<?php
//0. SESSION開始！！
session_start();

//１．関数群の読み込み
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();

//GETデータ取得
$id = $_GET["id"]; //?id~**を受け取る

//DB接続
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gan_user_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if($status==false) {
    sql_error($stmt);
}else{
    $row = $stmt->fetch();
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>登録内容更新</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body id="main">

<!-- Head[Start] -->
<header>
<h2>使用者データ更新画面</h2>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<section id ="main">
<form method="POST" action="user_update.php">
    <div class="jumbotron">
        <fieldset>
          <legend>新規登録画面</legend>
          <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
          <label>LoginID：<input type="text" name="lid" value="<?=$row["lid"]?>"></label><br>
          <label for="view_name">役職</label><br>
	        <select name="kanri_flg">
		        <option value="0" <?= $row["kanri_flg"] == '0' ?'selected': ""?>>一般</option>
		        <option value="1" <?= $row["kanri_flg"] == '1' ?'selected': ""?>>管理者</option>
	        </select><br>
          <label for="view_name">使用状況</label><br>
	        <select name="life_flg">
            <option value="0" <?= $row["life_flg"] == '0' ?'selected': ""?>>使用中</option>
		        <option value="1" <?= $row["life_flg"] == '1' ?'selected': ""?>>未使用</option>
	        </select><br>
          <!-- idを隠して送信(hidden) -->
          <input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" value="更新" style="margin-top: 20px;">
        </fieldset>
    </div>
</form>
<ul>
<li style = "margin: 15px"><a href="user_select.php">戻る</a></li>
</ul>
</secstin>
<!-- Main[End] -->


</body>
</html>
