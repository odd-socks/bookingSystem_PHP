<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/sakata.css"> -->
    <title>予約内容確認画面</title>
</head>
<body>
<?php 
    require_once 'header.php';  //ヘッダーの呼び出し
    $_SESSION['people'] = $_POST['people'];  //前ページで入力された人数は新たにセッションpeopleに保存
?>
    <form action="POST" action="complete.php" > 
        <table>
            <tr>
                <td>お名前</td>
                <td><?= $_SESSION['user']['name'] ?></td>
            </tr>
            <tr>
                <td>日付</td>
                <td><?= $_SESSION['reservation']['date'] ?></td>
            </tr>
            <tr>
                <td>時間</td>
                <td><?= $_SESSION['reservation']['hhmm_time'] ?></td>
            </tr>
            <tr>
                <td>人数</td>
                <td><?= $_SESSION['people'] ?></td>
            </tr>
        </table>
            <input type="button" value="訂正" onclick="location.href='reservation_form.php'">
            <input type="button" value="確定" onclick="location.href='complete.php'">
    </form>
</body>
</html>