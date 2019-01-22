<?php
$fileList = glob('uploads/*.json');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            padding: 30px;
        }
        div {
            width: 300px;
            text-align: center;
            border: 1px solid black;
            border-radius: 10px;
            padding: 10px 0;
        }
    </style>
    <title>Список тестов</title>
</head>
<body>

<div>
    <h3>Список доступных тестов</h3>
    <?php
    foreach ($fileList as $key => $file) {
        $fileTest   = file_get_contents($file);
        $decodeFile = json_decode($fileTest, true);

        foreach ($decodeFile as $test) {
            $question = $test['question'];
            ?>
            <p><a href=<?= "test.php?test=$key" ?>><?= $question ?></a></p>
            <?php
        }
    }
    $login=file_get_contents('login.json');
    $login=json_decode($login, true);
    if ($_SERVER['PHP_AUTH_USER']!==$login[0]['user'] OR $_SERVER['PHP_AUTH_PW'] !== $login[0]['pass']) {
        die;
    }
    ?>
    <p><a href="index.php">Выйти</a></p>
    <p><a href="admin.php">Загрузить новый тест</a></p>
    <p><a href="delete.php">Удалить тест</a></p>
</div>

</body>
</html>