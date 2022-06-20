<?php
require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/OrdersDatabase.php";

$logged_in_user = $_SESSION["user"];

Template::header("Order page");

$orders_db = new OrdersDatabase();

$orders = $orders_db->get_by_user_id($logged_in_user->id);?>

<h2>My  orders</h2>

<?php foreach ($orders as $order) : ?>

    <p>
        <b>Orders (# <?= $order->id ?>)</b>
        [<?= $orders->status ?>]
    </p>

    <?php endforeach;

    Template::footer();