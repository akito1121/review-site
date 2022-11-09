<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn()（切替え）
function db_conn(){
    try {
        //localhost
        return new PDO('mysql:dbname=gan_db;charset=utf8;host=localhost','root','root');

        //sakura
        //return new PDO('mysql:dbname=silverturtle21_unit1;charset=utf8;host=mysql57.silverturtle21.sakura.ne.jp','silverturtle21','gstk1121');

    } catch (PDOException $e) {
        exit('DB Connection Error:'.$e->getMessage());
    }
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}

//SessionCheck(スケルトン)
function sschk(){
    if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
      exit("Login Error");
   }else{
      session_regenerate_id(true);
      $_SESSION["chk_ssid"] = session_id();
   }
  }
  
//★表示関数(変換)
function star($hoshi){
    switch($hoshi){
      case 1:
        echo "★　　　　";
        break;
      case 2:
        echo "★★　　　";
        break;
      case 3:
        echo "★★★　　";
        break;
      case 4:
        echo "★★★★　";
        break;
      case 5:
        echo "★★★★★";
        break;
    }
  }
  
  //★表示関数(平均)
  function star_a($total,$nt){
    $average = $total / $nt;
    $format_average = sprintf('%.2f', $average);
    switch($average){
      case $average < 1.5:
        echo "★　　　　".$format_average."<br>";
        break;
      case $average >= 1.5 && $average <2.5:
        echo "★★　　　".$format_average."<br>";
        break;
      case $average >= 2.5 && $average <3.5:
        echo "★★★　　".$format_average."<br>";
        break;
      case $average >= 3.5 && $average <4.5:
        echo "★★★★　".$format_average."<br>";
        break;
      case $average >= 4.5:
        echo "★★★★★".$format_average."<br>";
        break;
    }
  }

  