<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
    <title>AIRSOFTGAN REVIEW</title>
</head>
<body>
<section id = "main">
<h2>レビュー投稿フォーム</h2>
<form action="write.php" method="post">
	<label for="view_name">モデル</label><br>
	<select name="model">
		<option value="">選択</option>
		<option value="M4 PATRIOT">M4 PATRIOT（東京マルイ）</option>
		<option value="HK416D">HK416D（東京マルイ）</option>
		<option value="MP7A1">MP7A1（東京マルイ）</option>
		<option value="KRISS VECTOR">KRISS VECTOR（KRYTAC）</option>
		<option value="ARP9">ARP 9（G&G）</option>
	</select><br>
	<div>
		<label for="view_name">表示名（ニックネーム）</label><br>
		<input id="view_name" type="text" name="name" value="">
	</div>
	<label for="view_name">命中精度</label><br>
	<select name="sb1">
		<option value="">選択</option>
		<option value="1">★</option>
		<option value="2">★★</option>
		<option value="3">★★★</option>
		<option value="4">★★★★</option>
		<option value="5">★★★★★</option>
	</select><br>
	<label for="view_name">有効射程距離</label><br>
	<select name="sb2">
		<option value="">選択</option>
		<option value="1">★</option>
		<option value="2">★★</option>
		<option value="3">★★★</option>
		<option value="4">★★★★</option>
		<option value="5">★★★★★</option>
	</select><br>
	<label for="view_name">操作性</label><br>
	<select name="sb3">
		<option value="">選択</option>
		<option value="1">★</option>
		<option value="2">★★</option>
		<option value="3">★★★</option>
		<option value="4">★★★★</option>
		<option value="5">★★★★★</option>
	</select><br>
	<label for="view_name">速射性</label><br>
	<select name="sb4">
		<option value="">選択</option>
		<option value="1">★</option>
		<option value="2">★★</option>
		<option value="3">★★★</option>
		<option value="4">★★★★</option>
		<option value="5">★★★★★</option>
	</select><br>
	<label for="view_name">価格</label><br>
	<select name="sb5">
		<option value="">選択</option>
		<option value="1">★</option>
		<option value="2">★★</option>
		<option value="3">★★★</option>
		<option value="4">★★★★</option>
		<option value="5">★★★★★</option>
	</select><br>
	<div>
		<label for="message">レビューコメント</label><br>
		<textarea id="message" type="text" name="review"></textarea>
	</div>
	<input type="submit" value="投稿">
</form>
<ul>
<li style = "margin: 15px"><a href="main.php">戻る</a></li>
</ul>
</section>
</body>
</html>