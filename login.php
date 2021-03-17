<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="css/okada.css">
</head>

<body>
 <?php require 'header.php' ?>
    <form action="login_comp.php" method="post">
    <table>
      <tr>
        <td>
          <h1>ログイン名</h1>
        </td>
        <td>
          <input type="text"  name="login"><br>
        </td>
      </tr>
      <tr>
        <td>
          <h2>パスワード</h2>
        </td>
        <td>
          <input type="password"  name="password"><br>
        </td>
      </tr>
    </table>
          <h3><input type="submit" value="ログイン"></h3>
    </form>
</body>

</html>
