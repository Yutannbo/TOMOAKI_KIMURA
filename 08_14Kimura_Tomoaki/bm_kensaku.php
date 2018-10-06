<?php
//1. GETデータ取得
$author = $_POST["author"];

//2.  DB接続
include "funcs.php";
$pdo = db_con();

//3．データ表示SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table where author like '%$author%'");
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sqlError($stmt);
}elseif($author==""){
    echo "著者名をご入力ください";
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= $result["name"] . "," . $result["author"] . "," . $result["cmt"] . "," . $result["day"] . "," . $result["price"] . "<br>";
  }

}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>読書一覧表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="bm_index.php">本棚一覧</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
    <a href="bm_index.php" class="btn-pagetop">戻る</a>
</div>
<!-- Main[End] -->

</body>
</html>
