<?php
require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";
require_once __DIR__ . "/../classes/OrdersDatabase.php";
require_once __DIR__ . "/../classes/Template.php";

$is_logged_in = isset($_SESSION['user']);
$cart = $_SESSION['cart'];
$logged_in_user = $is_logged_in ? $_SESSION['user'] : null;

if(!$cart){
    header("Location: /myweb/pages/cart.php");
}

/*
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
}*/

if ($is_logged_in && count($cart) > 0) {
    $order = new Order($logged_in_user->id, "waiting", date("Y-m-d"));
    $db_orders = new OrdersDatabase();

    $order_id = $db_orders->create($order);

    if ($order_id == false) {
        die("Error creating order");
    }

    $success = true;
    foreach ($cart as $product) {
        $success = $success && $db_orders->create_product_order($order_id, $product->id);
    }

    if ($success) {
        unset($_SESSION["cart"]);
        header("Location: /myweb/pages/orders.php");
        die();
    } else {
        die("Error saving order");
    }
} else {
    die("invalid cart / user");
}
