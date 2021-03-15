<?php
  session_start(); 
  unset($_SESSION['user']);  //customerのセッションの破棄
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>ログアウト</title>
</head>
<body>
  <?php
    require 'header.php';

    echo 'ログアウトしました。';

    require 'footer.php';
  ?>
</body>
</html>