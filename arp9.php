<?php
//1.  DB接続します
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gan_model_table WHERE model = 'ARP9'");
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
  <img src="./img/arp9.jpg" alt="">
  <h2>G&G 電動ガン ARP 9</h2>
  <div class = "con">
    <p>AR 9mmは、市街地ではM16の5.56mm弾では威力がありすぎるということから、コルト社が1982年にローエンフォースメント用に拳銃弾の9X19mm弾用のM16として開発したCOLT 9mm SMGがベースになっています。</p>
    <p>MP5やUZIなどSMGを使えばよいと思うかもしれませんが、M16と操作が同じということにメリットがあるのです。またMP5やUZIより軽量というのもあると思います。</p>
    <p>現在ではCOLTの他、アメリカの各メーカーから民間用にパーツを含めて多種多様なカスタムモデルが開発され、毎年ラスベガスで開催されるショットショーでも多く見かけるようになりました。</p>
    <p>一般ユーザーも９mm弾が安いこともある上、標的も拳銃用のプレートでよいことから手軽にシューティングが楽しめるということで人気があります。
しかも反動も少なく、カービンサイズでストックもあるので、非常に撃ちやすいです。私もグアムで撃ったことがありますが、まるでガスブローバックのような感覚で撃てました。50m以内なら面白いくらいによく当たります。</p>
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
$stmt = $pdo->prepare("SELECT * FROM gan_model_table WHERE model = 'ARP9'");
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