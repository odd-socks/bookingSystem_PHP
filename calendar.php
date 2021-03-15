<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />  <!--リセットCSS-->
  <link rel="stylesheet" href="css/matsumaru.css">
  <link rel="icon" type="image/png" href="images/favicon.png">
  <title>焼肉屋さんですよ</title>
  <script src="jquery-3.2.1.min.js"></script>
</head>
<body>
<?php require_once('header.php'); ?>

  <h1 class="calendar-title">ご予約・空き状況確認</h1>
  
  <table>
    <caption class="cap">2021年３月</caption>
    <tr>
      <th class="sun bg-red">日</th>
      <th class="weekday">月</th>
      <th class="weekday">火</th>
      <th class="weekday">水</th>
      <th class="weekday">木</th>
      <th class="weekday">金</th>
      <th class="stu bg-blue">土</th>
    </tr>
    <tr>
      <?php 
        $date = 1;
        $year       = date('Y');  //今年の西暦
        $month      = date('n');  //今月の月
        
        $timestanp  = strtotime($year . '-' . $month . '-1');  //今月1日のタイムスタンプをY-m-d表記から求める
        $start_date = date('w', $timestanp);                   //今月1日の曜日(0~6)
        
        $target_date  = $year . '-' . ++$month . '-1';              //来月1日のY-m-d表記
        $end_date   = date("j", strtotime("$target_date -1 day"));  //今月の最終日
        
        
        require 'db_connect.php';                    //DB接続
        $sql = "select sum(seats_number) as seats_num from time group by date";  //日付ごとに空席数を集計して取得
        $stm = $pdo->prepare($sql);
        $stm->execute();                             //SQL実行
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);  //結果を$resultに連想配列で格納
        
        for ($i=0; $i < 35; $i++) {  // カレンダーの表示
          echo '<td>';
          if ($start_date <= $i && $date <= $end_date) {  //１から日付を入れる
            if ($i % 7 === 0) {        //日曜日なら赤文字
              echo '<div class="date sun">';
              echo $date;
              echo '</div>';
            } elseif ($i % 7 === 6) {  //土曜日なら青文字
              echo '<div class="date stu">';
              echo $date;
              echo '</div>';
            } else {                   //平日なら黒文字
              echo '<div class="date">';
              echo $date;
              echo '</div>';
            }
            
            if (date('j') <= $date && $date <= $end_date) {  //今日以降DBのデータを表示
              echo '<div class="response">';
              $seats_num = $result[$date - 1]['seats_num'];  //その日の空席数
              if ($seats_num >= 12) {       //空席数が12以上なら◎
                echo '◎';
              } elseif ($seats_num >= 6) {  //空席数が6以上なら◯
                echo '◯';
              } elseif ($seats_num > 0) {   //空席数が1以上なら△
                echo '△';
              } else {                      //空席数が12以上なら×
                echo '×';
              }
              echo '</div>';
            } else {
              echo '<button class="response">';
              echo '-';
              echo '</button>';
            }
            $date++;
          }
          echo '</td>';
          
          if (($i + 1) % 7 === 0) {  //7日おきに改行
            echo '</tr><tr>';
          }
        }
        
        
        
        ?>
    </tr>
  </table>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <?php require 'footer.html' ?>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>


