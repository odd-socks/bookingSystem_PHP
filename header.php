<?php if(!isset($_SESSION)){ session_start(); }; ?>  <!--sessionスタート済みでなければsession_start()-->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />  <!--リセットCSS-->
  <link rel="stylesheet" href="css/header.css">
  <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body>
  <header>
    <nav>
      <ul class="main-nav">
        <li class="header-item">
          <a href="index.php">
            <span class="header-item-child">トップ</span>
          </a>
        </li>
        <li class="header-item">
          <a href="menu.php">
            <span class="header-item-child">メニュー</span>
          </a>
        </li>
        <li class="header-item">
          <a href="confirm.php">
            <span class="header-item-child">お知らせ</span>
          </a>
        </li>
        <li class="header-item logo">
          <a href="index.php">
            <img class="logo" src="images/logo.png" alt="">
          </a>
        </li>
        <li class="header-item">
          <a href="calendar.php">
          <span class="header-item-child">ご予約</span>
        </a>
      </li>
      <li class="header-item">
  <?php if (!isset($_SESSION['user'])){  //未ログインなら'ログイン'と表示 ?>
          <a href="login.php">
            <span class="header-item-child">ログイン</span>
          </a>
  <?php } else {                 //ログイン済みなら'ログアウト'と表示 ?>
          <a href="logout.php">
            <span class="header-item-child">ログアウト</span>
          </a>
  <?php } ?>
      </li>
        <li class="header-item">
          <a href="#">
            <span class="header-item-child">
              <?php
                if (isset($_SESSION['user'])){  //未ログインなら名前を表示
                  echo $_SESSION['user']['name']; 
                } else {
                  echo 'ゲスト';          //ログイン済みなら'ゲスト'と表示
                } 
              ?>
              </span>
              <span class="name-unit">様</span>
          </a>
        </li>
      </ul>
    </nav>
  </header>
</body>
</html>