<?php
require_once __DIR__ . "/../classes/OrdersDatabase.php";
require_once __DIR__ . "/force-admin.php";

$success = false;

if(isset($_POST["status"]) && isset($_POST["id"])){
$orders_db = new OrdersDatabase();
$success = $orders_db->update_order_status($_POST["status"], $_POST["id"]);
}


else{
    die("Invalid input!!!!");
}
if($success){
    header("Location: /myweb/pages/admin.php");
    die();
}
else{
    die("Error updating order");
}



echo "Hello World";
