<?php
$login=file_get_contents('login.json');
$login=json_decode($login, true);
if ($_SERVER['PHP_AUTH_USER']!==$login[0]['user'] OR $_SERVER['PHP_AUTH_PW'] !== $login[0]['pass']) {
    http_response_code(403);
    die ("Not authorized");
}
$fileList = glob('uploads/*.json');
foreach ($fileList as $key => $value) {
$fileTest = file_get_contents($fileList[$key]);
$decodeFile = json_decode($fileTest, true);
$test = $decodeFile;
?>
<!doctype html>
<html lang="ru">
<head>
<body>
<form method="post" action="actionDelete.php" enctype="multipart/form-data">
    <p><label><input type=radio name="<?=$key?>" value="<?=$value?>"><?= $test[0]['question'] ?></label></p>

    <?php
    }
    ?>
    <input type="submit" name="" value="Удалить">
</form>
<p><a href="list.php">Список тестов</a></p>
</body>
</head>
</html>