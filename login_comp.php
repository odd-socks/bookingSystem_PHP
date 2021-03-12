<?php session_start(); ?>
<?php require('db_connect.php'); ?>

<?php
	//userセッション変数を破棄
	unset($_SESSION['user']);
	//MySQLデータベースに接続する
	//SQL文を作る（プレースホルダを使った式）
	$sql = "select * from user where login_name = :login_name and password = :password";
	//プリペアードステートメントを作る
	$stm = $pdo->prepare($sql);
	//プリペアードステートメントに値をバインドする
	$stm->bindValue(':login_name',$_POST['login'],PDO::PARAM_STR);
	$stm->bindValue(':password',$_POST['password'],PDO::PARAM_STR);
	//SQL文を実行する
	$stm->execute();
	//結果の取得（連想配列で受け取る）
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);
	//userセッションの設定
	foreach ($result as $row) {
		$_SESSION['user'] = [
			'id' => $row['id'], 'name' => $row['name'],
			'password' => $row['password']
		];
	}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ログイン画面</title>
	<link rel="stylesheet" href="okada.css">
</head>
<body>
	<?php
	if (isset($_SESSION['user'])) {
		echo 'いらっしゃいませ、', $_SESSION['user']['name'], 'さん。';
	} else {
		echo 'ログイン名またはパスワードが違います。';
	}
	?>
</body>

</html>