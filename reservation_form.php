<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sakata.css">
    <title>予約内容入力画面</title>
</head>
<body>
    <?php require 'index.php'; ?>
    <h2>予約内容を入力してください</h2>
    <hr>
    <form id="reservation" action="comfirm.php" >
        <dl>
            <dt>お名前</dt>
            <dd><input type="text" id="name"></dd>
            <dt>日付</dt>
            <dd><input type="text" id="date"></dd>
            <dt>時間</dt>
            <dd><input type="text" id="time"></dd>
            <dt>人数</dt>
            <dd>
                <label><input type="radio" id="num1">1</label>
                <label><input type="radio" id="num2">2</label>
                <label><input type="radio" id="num3">3</label>
                <label><input type="radio" id="num4">4</label>
                <label><input type="radio" id="num5">5</label>
                <label><input type="radio" id="num6">6</label>
            </dd>
        </dl>
        <p id="submit_button_cover">
            <input type="submit" id="submit_button" value="予約する">
        </p>
    </form>
</body>
</html>