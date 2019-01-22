<?php
if (!$_SERVER['PHP_AUTH_USER']) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    http_response_code(401);
    die ("Not authorized");
} else {
    header("Location: list.php");
}