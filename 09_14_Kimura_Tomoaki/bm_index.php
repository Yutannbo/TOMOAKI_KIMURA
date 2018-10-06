<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>本棚ＤＢ</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <?php if($_SESSION["kanri_flg"] == "1" ){ ?>
    <div class="navbar-header"><a class="navbar-brand" href="bm_select.php">本棚更新</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="bm_user_select.php">ユーザー管理</a></div>
    <?php } ?>
    <?php if($_SESSION["kanri_flg"] == "0" ){ ?>
    <div class="navbar-header"><a class="navbar-brand" href="bm_select_open.php">本棚</a></div>
    <?php } ?>
    <div class="navbar-header"><a class="navbar-brand" href="bm_kensaku.index.php">検索</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>本棚登録</legend>
     <label>書籍名：<input type="text" name="name"></label><br>
     <label>著者名：<input type="text" name="author"></label><br>
     <label>書籍コメント:<textArea name="cmt" rows="4" cols="40"></textArea></label><br>
     <label>発売日：<input type="text" name="day"></label><br>
     <label>価格：<input type="text" name="price"></label><br>
     <input type="submit" value="登録">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
