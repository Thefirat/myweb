<?php
require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/OrdersDatabase.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";
require_once __DIR__ . "/../classes/ProductsDatabase.php";



//$logged_in_user = $_SESSION["user"];

$is_logged_in = isset($_SESSION['user']);
$logged_in_user = $is_logged_in ? $_SESSION['user'] : null;

Template::header("Order page");

$orders_db = new OrdersDatabase();
$orders = $orders_db->get_order_by_user_id($logged_in_user->id);

$products_db = new ProductsDatabase();
$products = $products_db-> get_by_order_id($logged_in_user->id);


?>
<h2>My  orders</h2>

<?php
if (!$is_logged_in) : ?>
    <a href="/myweb/pages/register.php"><i class="bi bi-people"></i>Login/register to place order</a>
   
<?php endif; ?> 


<?php foreach ( $orders as $order) : ?>

    <p>
        <b>#<?= $order->id ?></b>
        <b><?= $order->order_date ?></b>
        <b>[<?= $order->status ?>] </b><br>   
    </p> 

    <?php endforeach;?>


    <div>
        <h2>Total: <?= $sum = array_reduce($products, function ($arr, $value) {
                        return $arr + $value->price;
                    }) ?> </h2>
    </div>

    
<?php

    Template::footer();

    echo "Hello World";