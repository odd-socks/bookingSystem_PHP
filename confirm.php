<?php
$gobackURL = "reservation_form.php";

// 文字エンコードの検証
// if (!cken($_POST)) {
//     header("Location:{$gobackURL}");
//     exit();
// }

$errors = [];

if (!isset($_POST["num"])||(!in_array($_POST["num"], ["1", "2", "3", "4", "5", "6"]))) {
    $errors[] = "人数が選択されていません。";
}

// エラーがあったとき
if (count($errors)>0){
    echo '<ol class="error">';
    foreach ($errors as $value) {
        echo "<li>", $value , "</li>";
    }
    echo "</ol>";
    echo "<hr>";
    echo "<a href=", $gobackURL, ">戻る</a>";
    exit();
}
// データベースユーザ
$user = '';
$password = '';
// 利用するデータベース
$dbName = 'testdb';
// MySQLサーバ
$host = '';
// MySQLのDSN文字列
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>確認画面</title>
</head>
<body>
<div>
    <?php
        require 'db_connect.php';
        $sql = "INSERT INTO course VALUES (:num)";
        // プリペアードステートメントを作る
        $stm = $pdo->prepare($sql);
        // プレースホルダに値をバインドする
        $stm->bindValue(':num', $num, PDO::PARAM_STR);
        // レコード追加後のレコードリストを取得する
        $sql = "SELECT * FROM course";
        // プリペアードステートメントを作る
        $stm = $pdo->prepare($sql);
        // SQL文を実行する
        $stm->execute();
        //結果の取得（連想配列で受け取る）
        $result = $stm->fetchALL(PDO::FETCH_ASSOC);
        
        foreach ($result as $row) {
            // テーブルに入れる
            echo "<tr>";
            echo "<td>", ($row['num']), "</td>";
            echo "</tr>";
        }
    ?>
</div>
</body>
</html>