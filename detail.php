<?php
//0. SESSION開始！！
session_start();

//１．PHP
//select.phpの[PHPコードだけ！]をマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。

include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

$id = $_GET["id"];  //URLの後ろについてるdataを取得する方法

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();

//２．データ登録SQL作成
$stmt   = $pdo->prepare("SELECT * FROM gan_model_table WHERE id =:id"); //SQLをセット
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //SQLを実行→エラーの場合falseを$statusに代入

//３．データ表示
$view=""; //HTML文字列作り、入れる変数
if($status==false) {
  //SQLエラーの場合
  sql_error($stmt);
}else{
  //SQL成功の場合
  $row = $stmt->fetch();  //$row["name"],$row["indeate"].....
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Head[Start] -->
<header>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<section id = "main">
<h2>レビュー投稿内容変更フォーム</h2>
<form action="update.php" method="post">
	<label for="view_name">モデル</label><br>
	<select name="model">
		<option value="M4 PATRIOT" 	<?= $row["model"] == 'M4 PATRIOT' 	?'selected': ""?>>M4 PATRIOT（東京マルイ）</option>
		<option value="HK416D" 		<?= $row["model"] == 'HK416D' 		?'selected': ""?>>HK416D（東京マルイ）</option>
		<option value="MP7A1" 		<?= $row["model"] == 'MP7A1' 		?'selected': ""?>>MP7A1（東京マルイ）</option>
		<option value="KRISS VECTOR"<?= $row["model"] == 'KRISS VECTOR' ?'selected': ""?>>KRISS VECTOR（KRYTAC）</option>
		<option value="ARP9" 		<?= $row["model"] == 'ARP9' 		?'selected': ""?>>ARP 9（G&G）</option>
	</select><br>
	<div>
		<label for="view_name">表示名（ニックネーム）</label><br>
		<input id="view_name" type="text" name="name" value="<?=$row["name"]?>">
	</div>
	<label for="view_name">命中精度</label><br>
	<select name="sb1">
		<option value="1" <?= $row["sb1"] == '1' ?'selected': ""?>>★</option>
		<option value="2" <?= $row["sb1"] == '2' ?'selected': ""?>>★★</option>
		<option value="3" <?= $row["sb1"] == '3' ?'selected': ""?>>★★★</option>
		<option value="4" <?= $row["sb1"] == '4' ?'selected': ""?>>★★★★</option>
		<option value="5" <?= $row["sb1"] == '5' ?'selected': ""?>>★★★★★</option>
	</select><br>
	<label for="view_name">有効射程距離</label><br>
	<select name="sb2">
		<option value="1" <?= $row["sb2"] == '1' ?'selected': ""?>>★</option>
		<option value="2" <?= $row["sb2"] == '2' ?'selected': ""?>>★★</option>
		<option value="3" <?= $row["sb2"] == '3' ?'selected': ""?>>★★★</option>
		<option value="4" <?= $row["sb2"] == '4' ?'selected': ""?>>★★★★</option>
		<option value="5" <?= $row["sb2"] == '5' ?'selected': ""?>>★★★★★</option>
	</select><br>
	<label for="view_name">操作性</label><br>
	<select name="sb3">
		<option value="1" <?= $row["sb3"] == '1' ?'selected': ""?>>★</option>
		<option value="2" <?= $row["sb3"] == '2' ?'selected': ""?>>★★</option>
		<option value="3" <?= $row["sb3"] == '3' ?'selected': ""?>>★★★</option>
		<option value="4" <?= $row["sb3"] == '4' ?'selected': ""?>>★★★★</option>
		<option value="5" <?= $row["sb3"] == '5' ?'selected': ""?>>★★★★★</option>
	</select><br>
	<label for="view_name">速射性</label><br>
	<select name="sb4">
		<option value="1" <?= $row["sb4"] == '1' ?'selected': ""?>>★</option>
		<option value="2" <?= $row["sb4"] == '2' ?'selected': ""?>>★★</option>
		<option value="3" <?= $row["sb4"] == '3' ?'selected': ""?>>★★★</option>
		<option value="4" <?= $row["sb4"] == '4' ?'selected': ""?>>★★★★</option>
		<option value="5" <?= $row["sb4"] == '5' ?'selected': ""?>>★★★★★</option>
	</select><br>
	<label for="view_name">価格</label><br>
	<select name="sb5">
		<option value="1" <?= $row["sb5"] == '1' ?'selected': ""?>>★</option>
		<option value="2" <?= $row["sb5"] == '2' ?'selected': ""?>>★★</option>
		<option value="3" <?= $row["sb5"] == '3' ?'selected': ""?>>★★★</option>
		<option value="4" <?= $row["sb5"] == '4' ?'selected': ""?>>★★★★</option>
		<option value="5" <?= $row["sb5"] == '5' ?'selected': ""?>>★★★★★</option>
	</select><br>
	<div>
		<label for="message">レビューコメント</label><br>
		<textarea id="message" type="text" name="review"><?=$row["review"]?></textarea>
	</div>
  <!-- idを隠して送信(hidden) -->
  <input type="hidden" name="id" value="<?=$id?>">
	<input type="submit" value="更新">
</form>

<ul>
<li style = "margin: 15px"><a href="select.php">戻る</a></li>
</ul>
</section>
<!-- Main[End] -->
</body>
</html>




