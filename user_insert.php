<?php
//0. SESSION開始！！
session_start();

//１．関数群の読み込み
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();

//変数の初期化
$success = null;
$error = null;

//1. POSTデータ取得
$name      = $_POST["name"];
$lid       = $_POST["lid"];
$lpw1      = $_POST["lpw1"];
$lpw2      = $_POST["lpw2"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg  = "0";

//2. DB接続します
$pdo = db_conn();

//パスワード照合
if( $lpw1 === $lpw2 ){
    $success = "登録が完了しました。".$br;

    //パスワードハッシュ作成
    $lpw = password_hash($lpw1,PASSWORD_DEFAULT);
    //３．データ登録SQL作成
    $stmt = $pdo->prepare("INSERT INTO gan_user_table(name,lid,lpw,kanri_flg,life_flg)VALUES(:name,:lid,:lpw,:kanri_flg,:life_flg)");
    $stmt->bindValue(':name'     , $name,      PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':lid'      , $lid,       PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':lpw'      , $lpw,       PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':life_flg' , $life_flg,  PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute(); //実行

    //４．データ登録処理後
    if($status==false){
        sql_error($stmt);
    }

}else{
    $error = "パスワードが一致しません。".$br;
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
    <?php if( !empty($success) ):?>
        <p class='success'><?=$success?></p>
        <p><a href="user_select.php">戻る</a></p>
    <?php endif ?>

    <?php if( !empty($error) ):?>
        <p class='error'><?=$error?></p>
        <p><a href="user.php">戻る</a></p>
    <?php endif ?>
</body>
</html>