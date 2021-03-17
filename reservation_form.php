<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sakata.css">
    <title>予約内容入力画面</title>
</head>
<body>
    <?php require_once ('header.php'); ?>
    <h2>予約内容を入力してください</h2>
    <hr>
    <form method="POST" id="reservation" action="confirm.php" >
        <dl>
            <dt>お名前</dt>
            <dd><?= $_SESSION['user']['name'] ?></dd>
            <dt>日付</dt>
            <dd><?= $_SESSION['reservation']['date'] ?></dd>
            <dt>時間</dt>
            <dd><?= $_SESSION['reservation']['hhmm_time'] ?></dd>
            <dt>人数</dt>
            <dd>
                <label><input type="radio" name="people" value="1" id="num1"         > 1</label>
                <label><input type="radio" name="people" value="2" id="num2"         > 2</label>
                <label><input type="radio" name="people" value="3" id="num3"         > 3</label>
                <label><input type="radio" name="people" value="4" id="num4" checked > 4</label>
                <label><input type="radio" name="people" value="5" id="num5"         > 5</label>
                <label><input type="radio" name="people" value="6" id="num6"         > 6</label>
            </dd>
        </dl>
            <input type="submit" id="submit_button" value="確認">

    </form>
</body>
</html>