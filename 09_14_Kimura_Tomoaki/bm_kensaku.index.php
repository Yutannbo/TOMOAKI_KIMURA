<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>本棚検索</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
        <?php if($_SESSION["kanri_flg"] == "1" ){ ?>
          <div class="navbar-header"><a class="navbar-brand" href="bm_select.php">本棚</a></div>
        <?php } ?>
        <?php if($_SESSION["kanri_flg"] == "0" ){ ?>
          <div class="navbar-header"><a class="navbar-brand" href="bm_select_open.php">本棚</a></div>
        <?php } ?>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_kensaku.php">
  <div class="jumbotron">
   <fieldset>
    <legend>本の名前を入力してください。</legend>
     <label>本の名前：<input name="name" type="text" style="width:300px"></label><br>
     <input type="submit" value="検索">
     <a href="bm_index.php" class="btn-pagetop">戻る</a>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
