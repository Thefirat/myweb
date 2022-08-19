<?php
require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/OrdersDatabase.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";



//$logged_in_user = $_SESSION["user"];

$is_logged_in = isset($_SESSION['user']);
$logged_in_user = $is_logged_in ? $_SESSION['user'] : null;

Template::header("Order page");

$orders_db = new OrdersDatabase();

$orders = $orders_db->get_order_by_user_id($logged_in_user->id);

?>
<h2>My  orders</h2>

<?php foreach ( $orders as $order) : ?>

    <p>
        <b>Orders # <?= $order->id ?></b>
        <?= $order->id ?>
         <?= $order->order_date ?>
        [<?= $order->status ?>]
    </p> 

    <?php endforeach;

if (!$is_logged_in) : ?>
    <a href="/myweb/pages/register.php"><i class="bi bi-people"></i>Login/register to place order</a>
   

<?php endif; ?> 
    
<?php

    Template::footer();

    echo "Hello World";