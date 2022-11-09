<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIRSOFTGAN REVIEW</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
  <h1>AIRSOFTGAN REVIEW</h1>
</header>
<section id = "main">

  <ul>
    <li class = "in"><a href="post.php">レビューを書き込む</a></li>
  </ul>

    <h3>【※各画像クリックでレビューサイトへ移動】</h3>

  <img id = "m4" src="./img/main.jpg" alt="">
  <h2>東京マルイ 電動ガン M4パトリオットHC</h2>
  
  <img id = "416" src="./img/416.jpg" alt="">
  <h2>東京マルイ 次世代電動ガン HK416D</h2>
  
  <img id = "mp7" src="./img/mp7.jpg" alt="">
  <h2>東京マルイ 電動サブマシンガン MP7A1</h2>
  
  <img id = "vector" src="./img/vector.jpg" alt="">
  <h2>KRYTAC 電動ガン KRISS VECTOR</h2>
  
  <img id = "arp9" src="./img/arp9.jpg" alt="">
  <h2>G&G 次世代電動ガン ARP 9</h2>
  </section>

<footer>

<ul>
    <li class = "in"><a href="login.php">管理者ページへ</a></li>
</ul>

</footer>

<script type="module"> 
$("#m4").on("click",function(){
//クリック後の処理
    window.location.href = "m4.php";
});

$("#416").on("click",function(){
//クリック後の処理
    window.location.href = "416.php";
});

$("#mp7").on("click",function(){
//クリック後の処理
    window.location.href = "mp7a1.php";
});

$("#vector").on("click",function(){
//クリック後の処理
    window.location.href = "vector.php";
});

$("#arp9").on("click",function(){
//クリック後の処理
    window.location.href = "arp9.php";
});
</script>
<script src="js/jquery-3.6.0.min.js"></script>
</body>
</html>