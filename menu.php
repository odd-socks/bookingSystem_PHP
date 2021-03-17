<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />  <!--リセットCSS-->
  <link rel="stylesheet" href="css/menu.css">
  <?php require_once('header.php'); ?>
  <title>コース一覧</title>
</head>
<body>
<center>
<h1>メニュー</h1>
</center>
<?php
  require 'db_connect.php';
  //SQL文を作る（プレースホルダを使った式）
  $sql = "select * from course ";
  //プリペアードステートメントを作る
  $stm = $pdo->prepare($sql);
  //SQL文を実行する
  $stm->execute();
  //結果の取得（連想配列で受け取る）
  $result = $stm->fetchAll(PDO::FETCH_ASSOC);


  foreach ($result as $row) {
?>

    <div class="container flex-dir-col cont1">
        <div class="course-name">
          <a href="show.php?id=<?= $row['id'] ?>">
            <h2> <?= $row['name'] ?> </h2>
          </a>
        </div>


        <div class="container cont2">
          <div class="item1">
            <a href="show.php?id=<?= $row['id'] ?>">
              <img class="course-image" src="images/<?= $row['image_name'] ?>"> </img>
            </a>
          </div>

          <div class="item2 flex-dir-col">
            <p class="border-bottom"> <?= $row['description'] ?> </p>

            
            <p class="border-bottom">コース品数: <?= $row['number'] ?>品/利用人数:1名～</p>
            <p class="border-bottom">時間:90分</p>
            
            
            <div class="price-space">
              <span class="price-number"><?= $row['price'] ?></span>
              <span class="price-unit">円</span>
              <span class="price-tax">（税込）／１名につき</span>
            </div>
          </div>

          <div class="item3">
            <a href="calendar.php"><button class="button">予約・空席確認</button></a>
          </div>
        </div>
    </div>
    

<?php } ?>
<?php require_once('footer.html'); ?>

</body>
</html>