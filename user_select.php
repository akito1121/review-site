<?php
//0. SESSION開始！！
session_start();

//１．関数群の読み込み
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();

//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gan_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  sql_error($stmt);
}else{
  while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
    $view .= '<a href="user_detail.php?id='.$r["id"].'">';
    $view .= $r["id"]."|".$r["name"]."|".$r["lid"];
    $view .= '</a>';
    $view .= "　";
    $view .= '<a class="btn btn-danger" href="user_delete.php?id='.$r["id"].'">';
    $view .= '[<i class="glyphicon glyphicon-remove"></i>削除]';
    $view .= '</a>';
    $view .= '</p>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>【登録者情報管理】</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- Head[Start] -->
<header>
<h2>使用者データ更新画面</h2>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<section id = "main">
<div>
    <div class="cj2"><?=$view?></div>
</div>
<!-- Main[End] -->

<ul>
  <li style = "margin: 15px"><a href="select.php">戻る</a></li>
</ul>
</section>
</body>
</html>