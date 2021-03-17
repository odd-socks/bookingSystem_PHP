<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>予約内容入力画面</title>
</head>
<body>
<div>
    <?php
    require 'db_connect.php';
    $sql = "SELECT * FROM reservation";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    print_r($result);
    echo $result[0]['people'];
    // foreach ($result as $row){

    // }

    // function checked($value, $question){
    //     if (is_array($question)){
    //         $isChecked = in_array($value, $question);
    //     } else {
    //         $isChecked = ($value===$question);
    //     }
    //     if ($isChecked) {
    //         echo "checked";
    //     } else {
    //         echo "";
    //     }
    // }
    ?>
    <h2>予約内容を入力してください</h2>
    <hr>
    <form method="POST" id="reservation" action="confirm.php" >
        <dl>
            <dt>お名前</dt>
            <dd></dd>
            <dt>日付</dt>
            <dd></dd>
            <dt>時間</dt>
            <dd></dd>
            <dt>人数</dt>
            <dd>
                <!-- <label><input type="radio" name="person_num" value="1" id="num1" <?php //checked("1", $person_num); ?>> 1</label>
                <label><input type="radio" name="person_num" value="2" id="num2" <?php //checked("2", $person_num); ?>> 2</label>
                <label><input type="radio" name="person_num" value="3" id="num3" <?php //checked("3", $person_num); ?>> 3</label>
                <label><input type="radio" name="person_num" value="4" id="num4" <?php //checked("4", $person_num); ?>> 4</label>
                <label><input type="radio" name="person_num" value="5" id="num5" <?php //checked("5", $person_num); ?>> 5</label>
                <label><input type="radio" name="person_num" value="6" id="num6" <?php //checked("6", $person_num); ?>> 6</label> -->
            </dd>
        </dl>
        <p id="submit_button_cover">
            <input type="submit" id="submit_button" value="予約する">
        </p>
    </form>
</div>
<!-- <?php require_once 'footer.php' ?> -->
</body>
</html>