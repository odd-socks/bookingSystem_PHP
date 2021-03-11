<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title肉</title>
</head>
<body>
  <h1>焼肉屋です。</h1>
  <header>
    <nav>
      <ul>
        <li>トップ</li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </nav>
  </header>


<?php
	require 'db_connect.php';
	//SQL文を作る（プレースホルダを使った式）
	$sql = "select * from user ";
	//プリペアードステートメントを作る
	$stm = $pdo->prepare($sql);
	//SQL文を実行する
	$stm->execute();
	//結果の取得（連想配列で受け取る）
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);
  echo '<ul>';
  foreach ($result as $row) {
    echo " <li>{$row['name']}</li>";
  }
  // print_r($result);
echo '</ul>'
?>




</body>
</html>