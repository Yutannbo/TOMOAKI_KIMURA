<?php
session_start();

//1. GETデータ取得
$id = $_GET["id"];

//2. DB接続
include "funcs.php";
$pdo = db_con();

//3．リスト表示SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id = :id");
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
  <title>ユーザ情報更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <?php if($_SESSION["kanri_flg"] == "1" ){ ?>
    <div class="navbar-header"><a class="navbar-brand" href="bm_user_select.php">ユーザ情報を更新</a></div>
    <?php } ?>

    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_user_update.php">
  <div class="jumbotron">
   <fieldset>
    <!-- 管理者フラグ＝１の場合、データ登録を表示させる -->
    <?php if($_SESSION["kanri_flg"] == "1" ){ ?>
      <legend>本棚更新</legend>
    <?php } ?>

    <label>ユーザ名：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>ユーザID：<input type="text" name="lid" value="<?=$row["lid"]?>"></label><br>
     <label>管理フラグ：<input type="text" name="kanri_flg" value="<?=$row["kanri_flg"]?>"></label><br>
     <label>ライフフラグ：<input type="text" name="life_flg" value="<?=$row["life_flg"]?>"></label><br>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
     <input type="submit" value="更新">
     <input type="button"onclick="history.back()"value="戻る">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>