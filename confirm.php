<?php
if (!isset($_POST["num"]))||($_POST["num"]==="") {
    $error[] = "人数が選択されていません。";
}

// エラーがあったとき
if (count($errors)>0){
    echo '<ol class="error">';
    foreach ($errors as $value) {
        echo "<li>", $value , "</li>";
    }
    echo "</ol>";
    echo "<hr>";
    echo "<a href="reservation_form.html">戻る</a>;
    exit();
}

$user = '';
$password = '';
$dbName = 'testdb';
$host = '';
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!-- <?php session_start(); ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>確認画面</title>
</head>
<body>
    <!-- <?php require 'index.php'; ?> -->
    <table>
        <tr>
            <th>名前:</th>
            <!-- <td><?=$SESSION['customer']['name'] ?></td> -->
        </tr>
        <tr>
            <th>日付:</th>
            <!-- <td><?=$SESSION['customer']['date'] ?></td> -->
        </tr>
        <tr>
            <th>時間:</th>
            <!-- <td><?=$SESSION['customer']['time'] ?></td> -->
        </tr>
        <tr>
            <th>人数:</th>

        </tr>
        <form action="complete.html" method="post">
            <th><tr><td><input type="submit" value="完了"></td></tr></th>
        </form>
    </table>
    
</body>
</html>