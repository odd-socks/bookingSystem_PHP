<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="okada.css">
</head>

<body>
    <form action="login_comp.php" method="post">
        <h1>ログイン名</h1>
          <input type="text" size="35" name="login"><br>
        <h1>パスワード
          <input type="password" size="35" name="password"></h1><br>
          <input type="submit" value="ログイン">
    </form>
</body>

</html>