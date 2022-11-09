<?php
//1.  DB接続します
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gan_model_table WHERE model = 'M4 PATRIOT'");
$status = $stmt->execute();

//３．データ表示
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($stmt);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $sb1a += $res["sb1"];
    $sb2a += $res["sb2"];
    $sb3a += $res["sb3"];
    $sb4a += $res["sb4"];
    $sb5a += $res["sb5"];
    $i +=1;
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>
<body>
<header>
  <h1>AIRSOFTGAN REVIEW</h1>
</header>
<section id = "main">
  <img src="./img/main.jpg" alt="">
  <h2>東京マルイ 電動ガン M4パトリオットHC</h2>
  <div class = "con">
    <p>『秒間25発の高速連射!!』ファクトリーメイドのハイサイクルカスタムという謳い文句を</p>
    <p>引っ下げて東京マルイからハイサイクル電動ガンが発売されたのは2009年12月のこと。</p>
    <p>G3 SAS HC、MP5A4 HCを皮切りに順調にシリーズを増やし、今回第9弾となる、</p>
    <p>M4パトリオットHCが発売となった。</p>
    <p>本モデルは2015年9月の全日本模型ホビーショーにて発表、2015年11月のM4A1 MWSや</p>
    <p>2016年1月のAA-12が発売されたことで、M870ウッドタイプ、HK416C、エアリボルバーの</p>
    <p>パイソンに続く怒涛の新商品ラッシュ、いわば「マルイ、春の新商品祭り」となった。</p>
  </div>
  <?php


    echo "<div id = star_a>";
    echo "【レビュー平均評価】"."<br>";
    echo "命中精度　　　";
    star_a($sb1a,$i);
    echo "有効射程距離　";
    star_a($sb2a,$i);
    echo "操作性　　　　";
    star_a($sb3a,$i);
    echo "速射性　　　　";
    star_a($sb4a,$i);
    echo "価格　　　　　";
    star_a($sb5a,$i);
    echo "</div>";

  ?>
<ul>
<li style = "margin: 15px"><a href="main.php">戻る</a></li>
</ul>
  <article>

  <?php

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gan_model_table WHERE model = 'M4 PATRIOT'");
$status = $stmt->execute();

//３．データ表示
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  sql_error($stmt);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
        // 配列の中身を指定して出力
        echo "<div id = star>";

        echo "<div class = lb>";
        echo "【レビュー評価】";
        echo "<br>"."命中精度　　　";
        star($res["sb1"]);
        echo "<br>"."有効射程距離　";
        star($res["sb2"]);
        echo "<br>"."操作性　　　　";
        star($res["sb3"]);
        echo "<br>"."速射性　　　　";
        star($res["sb4"]);
        echo "<br>"."価格　　　　　";
        star($res["sb5"]);
        echo "</div>";

        echo "<div class = rb>";
        echo "<h3>".$res["name"]."</h3>";
        echo "<time>".date('Y年m月d日 H:i', strtotime($res["indate"]))."</time>";
        echo "<p>".$res["review"]."</p>";
        echo "</div>";
        
        echo "</div>";

  }

}



  ?>

</section>

</body>
</html>