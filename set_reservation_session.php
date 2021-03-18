<?php 
  session_start();

  //ログイン状況で処理を分岐
  if (isset($_SESSION['user'])) {  //ログイン済みの場合
    //hh:mm:ss表記の時間からhh:mm表記の時間データも作っておく
    //  =>  時間を 20:00:00 から 20:00 表記にする方法
    //  =>  文字列の取り出し
    //  =>  $変数名 = mb_substr(対象文字列, 取り出し開始位置,  取り出す文字数 );
    $time = mb_substr($_GET['time'], 0,  5);

    //カレンダーからGet通信で送られてきた情報をセッションにセット
    $_SESSION['reservation'] = [
      'date'       => $_GET['date']     ,
      'time'       => $_GET['time']     ,
      'time_id'    => $_GET['time_id']  ,
      'seat_type'  => $_GET['seat_type'],
      'hhmm_time'  => $time             ,
    ];
  } else {  //未ログイン場合
    //ログインフォームにリダイレクト
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
    header("Location:" . $url);
    exit();  
  }


  // reservation_form.phpにリダイレクト
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/reservation_form.php';
  header("Location:" . $url);
  exit();
?>
