<?php
$fileList = glob('users/*.json');
$accessCheck = 'users/'.$_SESSION['name'].'.json';
if (!in_array($accessCheck, $fileList)) {
    http_response_code(403);
    header("Location:index.php");
} else {
    $login=file_get_contents('users/admin.json');
    $login=json_decode($login, true);
}
if(empty($_SESSION ['status'])||$_SESSION['status']!=='user'){
    http_response_code(403)
    header("location:index.php")
}
?>