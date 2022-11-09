<?php
//0. SESSION開始！！
session_start();

//1. POSTデータ取得
$model = $_POST["model"];
$name = $_POST["name"];
$sb1 = $_POST["sb1"];
$sb2 = $_POST["sb2"];
$sb3 = $_POST["sb3"];
$sb4 = $_POST["sb4"];
$sb5 = $_POST["sb5"];
$review = $_POST["review"];
$id     = $_POST["id"];   //idを取得

//2. DB接続します
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();

//３．データ登録SQL作成
$sql = "UPDATE gan_model_table SET model=:model, name=:name, sb1=:sb1, sb2=:sb2, sb3=:sb3, sb4=:sb4, sb5=:sb5, review=:review WHERE id =:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':model',  $model,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':sb1',    $sb1,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':sb2',    $sb2,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':sb3',    $sb3,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':sb4',    $sb4,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':sb5',    $sb5,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':review', $review, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("select.php");
}

?>
