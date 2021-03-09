<!-- <?php session_start(); ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>予約内容入力画面</title>
</head>
<body>
    <h2>予約内容を入力してください</h2>
    <hr>
    <!-- <?php require ''; ?> -->
    <form action="confirm.html" method="post">
    <table>
        <tr>
            <th><label for="name">名前</label></th>
            <!-- <td><?=$SESSION['customer']['name'] ?></td> -->
        </tr>
        <tr>    
            <th><label for="num">人数</label></th>
            <td>
                <input type="radio" name="num" value="1">1
                <input type="radio" name="num" value="2">2
                <input type="radio" name="num" value="3">3
                <input type="radio" name="num" value="4">4
                <input type="radio" name="num" value="5">5
                <input type="radio" name="num" value="6">6
            </td>
        </tr>
        <tr><th><td><input type="submit" value="OK"></td></th></tr>
    </table>
    </form>
</body>
</html>