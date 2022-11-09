<?php
//0. SESSION開始！！
session_start();

//１．関数群の読み込み
include("funcs.php");  //funcs.phpを読み込む（関数群）

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();

//モデル絞込み関係
$kisyu = $_POST[kisyu];
$kisyu2 = $_POST[kisyu];
if($kisyu2 == "M4 PATRIOT','HK416D','MP7A1','KRISS VECTOR','ARP9"){
  $kisyu2 = "全種";
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<!-- Head[Start] -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>管理画面表示</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
<!-- Head[End] -->
</head>
<body>
<header>
<h1>【レビュー管理画面】</h1>
</header>
<!-- Main[Start] -->
<section id = "main">
<?=$_SESSION["name"]?>さん、こんにちは
<div style = "margin: 20px"> 
  <?php if($_SESSION["kanri_flg"]=="1"):?>
      <a class="navbar-brand" href="user.php">【新規登録】</a>
      <a class="navbar-brand" href="user_select.php">【登録者情報管理】</a>   
  <?php endif;?>
  <a class="navbar-brand" href="logout.php">【ログアウト】</a> 
</div>

<form method="post" style = "margin: 20px">
  <h2 style = "margin: 10px">モデル絞込み</h2>
	<select name="kisyu">
		<option value="M4 PATRIOT','HK416D','MP7A1','KRISS VECTOR','ARP9">全種</option>
		<option value="M4 PATRIOT">M4 PATRIOT（東京マルイ）</option>
		<option value="HK416D">HK416D（東京マルイ）</option>
		<option value="MP7A1">MP7A1（東京マルイ）</option>
		<option value="KRISS VECTOR">KRISS VECTOR（KRYTAC）</option>
		<option value="ARP9">ARP 9（G&G）</option>
	</select><br>

	<input type="submit" name="btn_submit" value="表示" style = "margin: 10px">
</form>

<h2>表示モデル　<?= $kisyu2 ?></h2>
<table border="1" cellpadding="5" cellspacing="0" width="1300" >
    <tr>
      <th>ID</th>      
      <th>登録時刻</th>
      <th>モデル名</th>
      <th>表示名</th>
      <th>命中精度</th>
      <th>有射距離</th>
      <th>操作性</th>
      <th>速射性</th>
      <th>価格</th>
      <th>コメント</th>
      <?php if($_SESSION["kanri_flg"]=="1"):?>
        <th>削除</th>
      <?php endif;?>
    </tr>
    <?php

    //２．データ登録SQL作成
    $pdo = db_conn();      //DB接続関数
    $stmt   = $pdo->prepare("SELECT * FROM gan_model_table WHERE model IN('$kisyu')"); //SQLをセット
    //$stmt   = $pdo->prepare("SELECT * FROM gan_model_table"); //SQLをセット
    $status = $stmt->execute(); //SQLを実行→エラーの場合falseを$statusに代入

    //３．データ表示
    if($status==false) {
      //SQLエラーの場合
      sql_error($stmt);
    }else{
      
      //SQL成功の場合
      while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){ //データ取得数分繰り返す
        //以下でリンクの文字列を作成, $r["id"]でidをdetail.phpに渡しています
        echo '<tr><td width="30" >'.'<a href="detail.php?id='.$r["id"].'">'.$r["id"].'</a>'.'</td>';

        echo '<td width="180" >'.$r["indate"].'</td>';
        echo '<td width="180" >'.$r["model"].'</td>';
        echo '<td width="80" >'.$r["name"].'</td>';
        echo '<td width="70" >'.$r["sb1"].'</td>';
        echo '<td width="70" >'.$r["sb2"].'</td>';
        echo '<td width="70" >'.$r["sb3"].'</td>';
        echo '<td width="70" >'.$r["sb4"].'</td>';
        echo '<td width="70" >'.$r["sb5"].'</td>';
        echo '<td width="410" >'.$r["review"].'</td>';
        if($_SESSION["kanri_flg"]=="1"){
          echo '<td width="70" >'.'<a href="delete.php?id='.$r["id"].'">'.×.'</td>';
        }
        echo '</tr>';
      }
    }
    ?>
</table>
</section>
<!-- Main[End] -->
</body>
</html>
