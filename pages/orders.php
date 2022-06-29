<?php
require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/OrdersDatabase.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";

$logged_in_user = $_SESSION["user"];

Template::header("Order page");

$orders_db = new OrdersDatabase();

$orders = $orders_db->get_order_by_user_id($logged_in_user->id);

var_dump($orders);

?>

<h2>My  orders</h2>

<?php foreach ((array) $orders as $order) : ?>

    <p>
        <b>Orders (# <?= $order->id ?>)</b>
        [<?= $order->status ?>]
    </p> 

    <?php endforeach;


    Template::footer();