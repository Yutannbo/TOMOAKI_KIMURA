<?php
session_start();

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
  <title>My Bookshelf Update</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <?php if($_SESSION["kanri_flg"] == "1" ){ ?>
    <div class="navbar-header"><a class="navbar-brand" href="bm_select.php">本棚の本を更新</a></div>
    <?php } ?>
    <?php if($_SESSION["kanri_flg"] == "0" ){ ?>
    <div class="navbar-header"><a class="navbar-brand" href="bm_select_open.php">本棚</a></div>
    <?php } ?>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_update.php">
  <div class="jumbotron">
   <fieldset>
    <!-- 管理者フラグ＝１の場合、データ登録を表示させる -->
    <?php if($_SESSION["kanri_flg"] == "1" ){ ?>
      <legend>本棚更新</legend>
    <?php } ?>
    <?php if($_SESSION["kanri_flg"] == "0"){ ?>
      <legend>本棚</legend>
    <?php } ?>
    <label>書籍名：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>著者名：<input type="text" name="author" value="<?=$row["author"]?>"></label><br>
     <label>書籍コメント:<textArea name="cmt" rows="4" cols="40"><?=$row["cmt"]?></textArea></label><br>
     <label>発売日：<input type="text" name="day" value="<?=$row["day"]?>"></label><br>
     <label>価格：<input type="text" name="price" value="<?=$row["price"]?>"></label><br>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
     <?php if($_SESSION["kanri_flg"] == 1 ){ ?>
     <input type="submit" value="更新">
     <?php } ?>
     <input type="button"onclick="history.back()"value="戻る">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>