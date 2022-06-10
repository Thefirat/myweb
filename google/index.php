<?php

//Include Google Configuration File
require_once __DIR__ . "/google-config.php";

if (!isset($_SESSION['access_token'])) {
    //Create a URL to obtain user authorization
    $google_login_btn = '<a href="' . $google_client->createAuthUrl() . '">Login with Google</a>';
} else {
    header("Location: google-login.php");
}


?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP Login With Google</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport' />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <br />
        <h2 align="center">PHP Login With Google</h2>
        <br />
        <div class="panel panel-default">
            <?php
            echo '<div align="center">' . $google_login_btn . '</div>';
            ?>
            <a href="/myweb">Home</a>
        </div>
    </div>

</body>

</html>