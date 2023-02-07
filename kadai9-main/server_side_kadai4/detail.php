<?php

session_start();
require_once('funcs.php');
loginCheck();

 $id = $_GET['id'];


require_once('funcs.php');
$pdo = db_conn();


$stmt = $pdo->prepare('SELECT * FROM gs_bm_table2 WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //INT = 数字
$status = $stmt->execute();


if ($status === false) {

    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $result = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>書籍ログ表示</title>
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
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->
<!-- Main[Start] -->
<form method="POST" action="update.php">
<div>
    <div class="container jumbotron"></div> 
    <fieldset>
                <legend>書籍記録</legend>
                <label>書籍名：<input type="text" name="bookname" value="<?= $result['bookname']?>"></label><br>
                <label>書籍URL:<input type="text" name="url" value="<?= $result['url']?>"></label><br>
                <label>書籍コメント:<textarea name="bookcomment" rows="4" cols="40"><?= $result['bookcomment']?></textarea></label><br>
                <input type="hidden" name="id" value="<?= $result['id']?>">
                <select name="type" class="type" value="<?= $result['type']?>">
                  <option>--種類選択--</option>
                  <option>科学</option>
                  <option>人文</option>
                  <option>工学</option>
                  <option>アート</option>
                  <option>その他</option>
                </slect>
                <input type="submit" value="修正">
            </fieldset>
</div>
<!-- Main[End] -->
</body>
</html>
