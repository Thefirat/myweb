<?php
require_once __DIR__ . '/classes/User.php';
session_start();

$is_logged_in = (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]);
$user = $is_logged_in ? $_SESSION["user"] : null;
$is_admin = $is_logged_in && $user->role == "admin";


if(!$is_admin) {
   http_response_code(401);
    die("You are not authorized to access this page");
}