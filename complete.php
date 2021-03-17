<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>予約完了画面</title>
</head>
<body>
<?php
    require_once ('db_connect.php');  //DB接続設定ファイルを呼び出す
    //予約テーブルにデータを追加
    $sql = "INSERT INTO `reservation` (`id`, `user_id`, `time_id`, `people`) VALUES (NULL, :id_of_user, :time_id, :people);";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':id_of_user' , $_SESSION['user']['id']             , PDO::PARAM_INT);
    $stm->bindValue(':time_id'    , $_SESSION['reservation']['time_id'] , PDO::PARAM_STR);
    $stm->bindValue(':people'     , $_SESSION['people']                 , PDO::PARAM_STR);
    $stm->execute();
    
    //予約の入った座席数を一つ減らす
    $sql2 = "update time set seat_number = seat_number - 1 where id = :time_idd";
    $stm2 = $pdo->prepare($sql2);
    $stm2->bindValue(':time_idd' , $_SESSION['reservation']['time_id'], PDO::PARAM_INT);
    $stm2->execute();

    // 予約に使っていたセッションを破棄
    unset($_SESSION['reservation']);
    unset($_SESSION['people']);
?>
    <p>予約完了</p>
    <a href="index.php">トップへ戻る</a>
</body>
</html>