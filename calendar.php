<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />  <!--リセットCSS-->
  <link rel="stylesheet" href="css/matsumaru.css">
  <link rel="icon" type="image/png" href="images/favicon.png">
  <title>焼肉屋さんですよ｜予約・空席確認</title>
  <script src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
<?php require_once('header.php'); ?>
<p>コース制限時間・ヘッダー・フッター追加</p>
  <h1 class="calendar-title">ご予約・空き状況確認</h1>
  
  <table class="calendar">
    <caption class="cap">2021年３月</caption>
    <tr>
      <th class="calendar-th sun bg-red">日</th>
      <th class="calendar-th weekday">月</th>
      <th class="calendar-th weekday">火</th>
      <th class="calendar-th weekday">水</th>
      <th class="calendar-th weekday">木</th>
      <th class="calendar-th weekday">金</th>
      <th class="calendar-th stu bg-blue">土</th>
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
        
        $month      = date('n');  //今月の月
        
        require 'db_connect.php';                    //DB接続
        $sql = "select sum(seats_number) as seats_num from time group by date";  //日付ごとに空席数を集計して取得
        $stm = $pdo->prepare($sql);
        $stm->execute();                             //SQL実行
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);  //結果を$resultに連想配列で格納
        
        for ($i=0; $i < 35; $i++) {  // カレンダーの表示
          echo '<td class="calendar-td">';
          if ($start_date <= $i && $date <= $end_date) {  //1日から順に日付を入れる
            if ($i % 7 === 0) {               //日曜日なら赤文字
              echo '<div class="date sun">';
            } elseif ($i % 7 === 6) {         //土曜日なら青文字
              echo '<div class="date stu">';
            } else {                          //平日なら黒文字
              echo '<div class="date">';
            }
            echo $date;
            echo '</div>';
            
            if (date('j') <= $date && $date <= $end_date) {  //今日以降の空席情報を表示
              echo '<button class="response" onclick="showDetail(' . $date . ')">';
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
              echo '</button>';
            } else {
              echo '<button class="response">';
              echo '-';
              echo '</button>';
            }
            
            
            echo '<div id="detail'. $date . '" class="detail none">';  //その日の空席状況
            $sql2 = "select * from time where date = :date";  // purchase テーブルの customer_id が session_id のレコードを取り出すSQL文
            $stm2 = $pdo->prepare($sql2);
            $stm2->bindValue(':date',$year. '-'. $month. '-' .  $date,PDO::PARAM_INT);  //その日の日付Y-m-d表記でDB検索
            $stm2->execute();
            $result2 = $stm2->fetchAll(PDO::FETCH_ASSOC);
            // print_r($result2);
            ?>
              <table>
                <tr>
                  <th></th>
                  <th>16:00</th>
                  <th>18:00</th>
                  <th>20:00</th>
                </tr>
                <tr>
                  <th>テーブル</th>
                  <td><?= $result2[0]['seats_number'] ?></td>
                  <td><?= $result2[2]['seats_number'] ?></td>
                  <td><?= $result2[4]['seats_number'] ?></td>
                </tr>
                <tr>
                  <th>座敷</th>
                  <td><?= $result2[1]['seats_number'] ?></td>
                  <td><?= $result2[3]['seats_number'] ?></td>
                  <td><?= $result2[5]['seats_number'] ?></td>
                </tr>
              </table>
            </div>




          <?php
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


