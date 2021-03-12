<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/show.css">
  <title>Document</title>
</head>
<body>

	<?php
	//MySQLデータベースに接続する
	require 'db_connect.php';
	//SQL文を作る（プレースホルダを使った式）
	$sql = "select * from course where id = :id";
	//プリペアードステートメントを作る
	$stm = $pdo->prepare($sql);
	//プリペアードステートメントに値をバインドする
	$stm->bindValue(':id',$_REQUEST['id'],PDO::PARAM_STR);
	//SQL文を実行する
	$stm->execute();
	//結果の取得（連想配列で受け取る）
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);


  foreach ($result as $row ) {
  ?>
  <div class="explanatory-text">
    <img class="course-image" src="images/<?= $row['image_name'] ?>"> 
    <h2> <?= $row['name'       ] ?>  </h2>
	<p>  <?= $row['price'      ] ?>円</p>
    <p>  <?= $row['description'] ?>  </p>
	<div class="detail">
    <p>  <?= $row['detail'     ] ?>  </p>
	</div>

	<a href="menu.php">戻る</a>
	
	
  </div>
  <?php } ?>


  
  
  
  
<br><br><br>
デザインの参考にしたいページ<a href="https://www.dennys.jp/menu/hamburg/grated-hamburger&fried-shrimp/">https://www.dennys.jp/menu/hamburg/grated-hamburger&fried-shrimp/</a>
</body>
</html>