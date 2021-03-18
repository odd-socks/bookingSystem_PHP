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
  <?php require_once('header.php'); ?>  <!--ヘッダーの呼び出し-->
  <div class="wrapper">
    <h1 class="calendar-title">ご予約・空き状況確認</h1>
  </div>
  
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
        $date = 1;  //カレンダーに日付を表示する時に使う
        $year       = date('Y');  //今年の西暦
        $month      = date('n');  //今月の月
        
        $timestanp  = strtotime($year . '-' . $month . '-1');  //今月1日のタイムスタンプをY-m-d表記から求める
        $start_date = date('w', $timestanp);                   //今月1日の曜日(0~6)
        
        $target_date  = $year . '-' . ++$month . '-1';                //来月1日のY-m-d表記
        $end_date     = date("j", strtotime("$target_date -1 day"));  //今月の最終日
        
        $month = date('n');  //今月の月（空席確認の詳細表示で使用するため今月の月に戻しておく）
        
        //timeテーブルから日付ごとに空席数を集計して取得
        require 'db_connect.php';                    //DB接続設定ファイルの読み込み
        $sql = "select sum(seat_number) as seats_num from time group by date";
        $stm = $pdo->prepare($sql);
        $stm->execute();                             //SQL実行
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);  //結果を$resultに連想配列で格納
        
        // カレンダーの表示
        for ($i=0; $i < 35; $i++) {
          echo '<td class="calendar-td">';
          //1日から順に日付を入れる
          if ($start_date <= $i && $date <= $end_date) {
            $today = $year. '-'. $month. '-'. $date;  //その日の日付のY-m-d表記
            
            // 曜日ごとの色分け
            if ($i % 7 === 0) {               //日曜日なら赤文字
              echo '<div class="date sun">';
            } elseif ($i % 7 === 6) {         //土曜日なら青文字
              echo '<div class="date stu">';
            } else {                          //平日なら黒文字
              echo '<div class="date">';
            }
            echo $date;
            echo '</div>';
            
            //今日以降の空席情報を表示
            if (date('j') <= $date && $date <= $end_date) {
              echo '<button class="response hover-red" onclick="showDetail(' . $date . ')">';
              $seats_num = $result[$date - 1]['seats_num'];  //その日の空席数
              if ($seats_num >= 12) {       //空席数が12以上なら◎
                echo '◎';
              } elseif ($seats_num >= 6) {  //空席数が6以上なら◯
                echo '◯';
              } elseif ($seats_num > 0) {   //空席数が1以上なら△
                echo '△';
              } else {                      //空席数が0なら×
                echo '×';
              }
              echo '</button>';
            } else {
              echo '<button class="response hover-red">';
              echo '-';
              echo '</button>';
            }
            
            //その日の空席状況を表示
            echo '<div id="detail'. $date . '" class="detail none">';  //初期値はdisplay-noneで非表示
            
              //timeテーブルからその日の日付のデータを取り出すSQL
              $sql2 = "select * from time where date = :date";
              $stm2 = $pdo->prepare($sql2);
              $stm2->bindValue(':date',$today, PDO::PARAM_INT);  //$dateにその日の日付をバインド
              $stm2->execute();
              $result2 = $stm2->fetchAll(PDO::FETCH_ASSOC);
              // print_r($result2);
    ?>
              <table>
                <!-- <caption>空席数</caption> -->
                <tr>
                  <th></th>
                  <th>16:00</th>
                  <th>18:00</th>
                  <th>20:00</th>
                </tr>
                <tr>
                  <th>テーブル</th>
            <?php //座敷の空席数を表示
                  for ($j=0; $j < 6; $j++) {
                    //空席が０の場合は選択できないようにする
                    if ($j % 2 === 0) {
                      if ($result2[$j]['seat_number'] > 0) {
            ?>
                        <td>
                          <a href="set_reservation_session.php?date=<?= $result2[$j]['date'] ?>&time=<?= $result2[$j]['time'] ?>&seat_type=<?= $result2[$j]['seat_type'] ?>&time_id=<?= $result2[$j]['id'] ?>" class="seat-num">
                            <?= $result2[$j]['seat_number'] ?>
                          </a>
                        </td>
                <?php } else { ?>
                        <td><?= $result2[$j]['seat_number'] ?></td>
                <?php }
                    }
                  }
                ?>
                </tr>
                <tr>
                  <th>座敷</th>
            <?php //テーブルの空席数を表示
                  for ($j=0; $j < 6; $j++) {
                    //空席が0の時間は選択できないようにする
                    if ($j % 2 === 1) {
                      if ($result2[$j]['seat_number'] > 0) {
            ?>
                        <td>
                          <a href="set_reservation_session.php?date=<?= $result2[$j]['date'] ?>&time=<?= $result2[$j]['time'] ?>&seat_type=<?= $result2[$j]['seat_type'] ?>&time_id=<?= $result2[$j]['id'] ?>" class="seat-num">
                            <?= $result2[$j]['seat_number'] ?>
                          </a>
                        </td>
                <?php } else { ?>
                        <td><?= $result2[$j]['seat_number'] ?></td>
                <?php }
                    }
                  }
                ?>
                </tr>
              </table>
            </div>
      <?php $date++;
          }
          echo '</td>';
          
          //7日おきに改行
          if (($i + 1) % 7 === 0) {
            echo '</tr><tr>';
          }
        }
      ?>
    </tr>
  </table>
  
  
  <?php require 'footer.html' ?>  <!--フッターの呼び出し-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>


