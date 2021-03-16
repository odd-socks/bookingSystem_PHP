  <?php 
    session_start();

    //カレンダーからGet通信で送られてきた情報をセッションにセット
    $_SESSION['reservation'] = [
			'date'       => $_GET['date']     ,
			'time'       => $_GET['time']     ,
			'seat_type'  => $_GET['seat_type'],
		];


    // 時間を 20:00:00 から 20:00 表記に直す方法
    // ・文字列の取り出し
    //    ・ $変数名 = mb_substr(対象文字列, 取り出し開始位置,  取り出す文字数 );
    //       =>  echo mb_substr($_GET['time'], 0,  5);
    

    // reservation_form.phpにリダイレクト
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/reservation_form.php';
    header("Location:" . $url);
    exit();
  ?>
