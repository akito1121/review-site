<?php
//1.  DB接続します
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gan_model_table WHERE model = 'HK416D'");
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
  <img src="./img/416.jpg" alt="">
  <h2>東京マルイ 次世代電動ガン HK416D</h2>
  <div class = "con">
    <p>実銃のHK416はドイツH&K社が2005年に開発した5.56mm×45弾を使用するアサルトライフル。米コルト社が開発し、現在も米軍で使用されているアサルトライフル"M4カービン"をベースにH&K社が独自の改良を施したM4クローンだ。クローンとは本家のコルトM4カービンに対して別会社が改良やOEM、コピー製造されたものを意味する。</p>
    <p>HK416のもっとも大きな改良点としては、M4カービンのガス作動方式であるリュングマン方式から、ショートストロークピストン方式へと変更されたこと。</p>
    <p>発射ガスをフロントサイトベースからバレル上のガスチューブで導き、ボルトキャリアに直接吹き付けボルトキャリアを後退させるリュングマン方式に対し、H&K G36シリーズの様にフロントブロック部に設けられたガスピストンでガス圧を受け止め、その力をロッドに伝達しボルトキャリアを押し下げるガスピストン方式はレシーバー内部をクリーンに保つことができ、作動性も向上する。</p>
    <p>HK416は米陸軍や特殊部隊でも一部限定的に採用されており、日本でも海自のSBUをはじめ、自衛隊の一部部隊が試験的に導入しているという。</p>
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
$stmt = $pdo->prepare("SELECT * FROM gan_model_table WHERE model = 'HK416D'");
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