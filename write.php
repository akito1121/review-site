<?php
// タイムゾーン設定
//date_default_timezone_set('Asia/Tokyo');


//変数の初期化
$success = null;
$error = array();


//文字作成
$model = $_POST["model"];
$name = $_POST["name"];
$sb1 = $_POST["sb1"];
$sb2 = $_POST["sb2"];
$sb3 = $_POST["sb3"];
$sb4 = $_POST["sb4"];
$sb5 = $_POST["sb5"];
$review = $_POST["review"];


//2. DB接続します      //固定
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数


//未入力判別
$a = "";
$br ="<br>";
if(empty($model)){
    $error[] = "モデルを選択してください。".$br;
}
if(empty($name)){
    $error[] = "表示名（ニックネーム）を入力してください。".$br;
}
if(empty($sb1)){
    $error[] = "命中精度を選択してください。".$br;
}
if(empty($sb2)){
    $error[] = "有効射程距離を選択してください。".$br;
}
if(empty($sb3)){
    $error[] = "操作性を選択してください。".$br;
}
if(empty($sb4)){
    $error[] = "速射性を選択してください。".$br;
}
if(empty($sb5)){
    $error[] = "価格を選択してください。".$br;
}
if(empty($error)){
    $success = "下記の内容で書き込みしました。".$br;

    //３．データ登録SQL作成（テンプレート）
    $sql = "INSERT INTO gan_model_table(model,name,sb1,sb2,sb3,sb4,sb5,review,indate)VALUES(:model, :name, :sb1, :sb2, :sb3, :sb4, :sb5, :review, sysdate())";  //可変
    $stmt = $pdo->prepare($sql);
    //bindValueはセキュリティ
    $stmt->bindValue(':model', $model, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':sb1', $sb1, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':sb2', $sb2, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':sb3', $sb3, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':sb4', $sb4, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':sb5', $sb5, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':review', $review, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute();//SQL実行

    //４．データ登録処理後
    if($status==false){
        //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
        sql_error($stmt);
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>AIRSOFTGAN REVIEW</title>
</head>
<body>
    <?php 
        if( !empty($success) ){
            echo "<p class='success'>".$success."</p>";
        }

        if( !empty($error) ){
            echo "<ul class='error'>";
            foreach( $error as $value ){
            echo "<li>".$value."</li>";
            }
            echo "</ul>";
        }

        echo "モデル名：".h($model)."<br>";
        echo "表示名（ニックネーム）：".h($name)."<br>";
        echo "命中精度：".h($sb1)."<br>";
        echo "有効射程距離：".h($sb2)."<br>";
        echo "操作性：".h($sb3)."<br>";
        echo "速射性：".h($sb4)."<br>";
        echo "価格：".h($sb5)."<br>";
        echo "レビューコメント：".h($review);

        if( !empty($success) ){
            echo  '<p>'.'<a href="main.php">'.'戻る'.'</a>'.'</p>';
        }
        if( !empty($error) ){
            echo  '<p>'.'<a href="post.php">'.'戻る'.'</a>'.'</p>';
        }

    ?>

</body>
</html>