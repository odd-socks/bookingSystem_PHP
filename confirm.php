<?php
if (isset($_POST['person_num'])){
    $person_num = $_POST['person_num'];
    $_SESSION['person_num'] = $person_num;

    $diffValue = array_diff($person_num, ["1", "2", "3", "4", "5", "6"]);
    if (count($diffValue>0)){
        $error[] = "「人数」に入力エラーがありました。";
    }
    $person_numString = implode("person_num");
}
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
<form>
<?php if (count($error)>0){ ?>
<span class="error"><?php echo implode('<br>', $error); ?></span><br>
<span>
    <input type="button" value="戻る" onclick="location.href='reservation_form.php'"> 
</span>
<?php } else { ?>
    <span>
        名前:
        日付:
        時間:
        人数:<?php echo ($person_num); ?><br>
        <input type="button" value="訂正する" onclick="location.href='reservation_form.php'">
        <input type="button" value="送信する" onclick="location.href='index.php'">
    </span>
<?php } ?>
</form>
</div>
   
</body>
</html>