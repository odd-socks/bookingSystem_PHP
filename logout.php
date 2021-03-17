<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>ログアウト</title>
</head>
<body>
<?php
  unset($_SESSION['user']);
  require 'header.php';
?>
  <p>ログアウトしました。</p>
</body>
</html>