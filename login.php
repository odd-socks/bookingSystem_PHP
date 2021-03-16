<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="okada.css">
</head>

<body>
    <form action="login_comp.php" method="post"></form>
        <h1>ログイン名
          <input type="text" size="35" name="login"></h1><br>
        <h2>パスワード
          <input type="password" size="35" name="password"></h2><br>
        <h3><input type="submit" value="ログイン"></h3>
</body>

</html>