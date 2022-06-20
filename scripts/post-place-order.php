<?php
require_once __DIR__ . "/../classes/UsersDatabase.php";
require_once __DIR__ . "/../classes/OrdersDatabase.php";
require_once __DIR__ . "/../classes/Template.php";

session_start();

$success = false;

if (isset($_POST["id"]) && isset($_SESSION["customer"]) ){
$customer = $_SESSION["customer"];

$db_orders = new OrdersDatabase();

$status = true;

$order_date = date("Y-m-d");

$order = new Order($customer->id, $status,  $order_date, $_POST["id"]);

$success = $db_orders->place_order($order);
}else{
    die("invalid input");
}

if($success){
    echo "Funkar";
}
else{
    die("Error placing order");
}
