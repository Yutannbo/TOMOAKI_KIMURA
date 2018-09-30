<?php
//1. GETデータ取得
$id = $_GET["id"];

//2. DB接続
include "funcs.php";
$pdo = db_con();

//3．リスト表示SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id = :id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//４．リスト表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    $row = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_select.php">本棚情報更新</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>更新：本棚登録</legend>
    <label>書籍名：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>著者名：<input type="text" name="author" value="<?=$row["author"]?>"></label><br>
     <label>書籍コメント:<textArea name="cmt" rows="4" cols="40"><?=$row["cmt"]?></textArea></label><br>
     <label>発売日：<input type="text" name="day" value="<?=$row["day"]?>"></label><br>
     <label>価格：<input type="text" name="price" value="<?=$row["price"]?>"></label><br>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
     <input type="submit" value="更新">
     <input type="button"onclick="history.back()"value="戻る">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>