<?php
//1. POSTデータ取得
$name = $_POST["name"];
$author = $_POST["author"];
$cmt = $_POST["cmt"];
$day = $_POST["day"];
$price = $_POST["price"];

//2. DB接続
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成(SQLインジェクションを無効化)
$sql = "INSERT INTO gs_bm_table(name,author,cmt,day,price,indate)VALUES(:name,:author,:cmt,:day,:price,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':author', $author, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cmt', $cmt, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':day', $day, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':price', $price, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  sqlError($stmt);
}else{
//５．index.phpへリダイレクト
  header("Location: bm_index.php");
  exit;
}
?>
