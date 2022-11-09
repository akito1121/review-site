<?php
//1.  DB接続します
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gan_model_table WHERE model = 'KRISS VECTOR'");
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
  <img src="./img/vector.jpg" alt="">
  <h2>KRYTAC 電動ガン KRISS VECTOR</h2>
  <div class = "con">
    <p>強烈なリコイルの.45口径弾をコントロールするため反動を下に逃すKRISS Super V System(KSVS)を搭載した独特なスタイルのSMG、KRISS VECTOR。</p>
    <p>KRISS VECTORは次世代の.45口径弾用SMGとしてスイスのTDI社（現KRISS USA社）とピカティニー造兵廠の共同開発で2006年に開発されました。</p>
    <p>.45口径弾は高いストッピングパワーを誇る反面、特にSMGでフルオートはリコイルが強く、制御しずらいのが難点でありました。そこでボルトを下方に下げ、リコイルを下向きに変換し、銃身の跳ね上がりを抑制するKRISS Super V System(KSVS)という新機構を開発し、完成しました。</p>
    <p>またトリガーが銃身よりやや高い位置にあるため、リコイルが上ではなく、後方にいき、フルオート時のコントロールが容易になっているそうです。</p>
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
$stmt = $pdo->prepare("SELECT * FROM gan_model_table WHERE model = 'KRISS VECTOR'");
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