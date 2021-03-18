<?php if(!isset($_SESSION)){ session_start(); }; ?>  <!--sessionスタート済みでなければsession_start()-->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />  <!--リセットCSS-->
  <link rel="stylesheet" href="css/matsumaru.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="icon" type="image/png" href="images/favicon.png">
  <title>焼肉屋さんですよ</title>
</head>
<body>
  <header class="flow">
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
          <a href="information.php">
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


  <div class="main-visual">
    <img class="main-img" src="images/sample.jpg" alt="">
    <ul class="flex">
      <li class="item1">
        <a href="#article">
          食べ放題新コース<br>
          <img src="https://beer.uenodebal.com/images/common/ico_arrow01.png" alt="">
        </a>
      </li>
      <li class="item2">
        <a href="#topi">
          トピックス<br>
          <img src="https://beer.uenodebal.com/images/common/ico_arrow01.png" alt="">
        </a>
      </li>
    </ul>
  </div>


  <main id="article" class="wrapper">
    <div class="article1">
      <div class="img-container">
        <img class="art-img" src="images/article-image2.jpg" alt="">
      </div>
      <div class="text-cont">
        <p>美味しそうなお肉。美味しそうなお肉。美味しそうなお肉。</p>
        <p>新しくはじまった贅沢コースです。</p>
      </div>
    </div>
    <div class="article2">
      <div class="img-cont">
        <img class="art-img" src="images/article-image1.jpg" alt="">
      </div>
      <div class="text-container">
        <p>国産黒黒毛和牛のカルビです。</p>
        <p>美味しそうなお肉。美味しそうなお肉。美味しそうなお肉。</p>
      </div>
    </div>
  </main>

  <div id="topi" class="bg-color">
    <div class="wrapper topics">
      <h2>トピックス</h2>
      <div class="topi-cont">
        <div class="topi-item">
          <a href="menu.php"><img src="images/topics2.jpg" alt=""></a>
        </div>
        <div class="topi-item">
          <a href="menu.php"><img src="images/topics1.jpg" alt=""></a>
        </div>
        <div class="topi-item">
          <a href="calendar.php"><img src="images/topics3.jpg" alt=""></a>
        </div>
      </div>
    </div>
  </div>

  <?php require 'footer.html';?>


  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>


