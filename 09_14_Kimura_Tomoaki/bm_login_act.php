<?php
//最初にSESSIONを開始！！
session_start();

//0.外部ファイル読み込み
include("funcs.php");

$lpw=$_POST["lpw"];
$lid=$_POST["lid"];

//1.  DB接続します
$pdo = db_con();

//2. データ登録SQL作成
$sql = "SELECT * FROM gs_user_table WHERE lid = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $lid);
$res = $stmt->execute();

//3. SQL実行時にエラーがある場合
if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

//4. 抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//5. 該当レコードがあればSESSIONに値を代入
//管理者の場合は更新画面


if( password_verify($lpw, $val["lpw"]) && $val["kanri_flg"] == 1){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  header("Location: bm_select.php");
  //一般の場合は詳細画面
}else if( password_verify($lpw, $val["lpw"]) && $val["kanri_flg"] == 0) {
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  header("Location: bm_select_open.php");
}else{
  //logout処理を経由して前画面へ
  header("Location: bm_login.php");
}

exit();
?>

