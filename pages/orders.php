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

$all_products = [];

$total_price = 0;



?>
<h2>My orders</h2>

<?php
if (!$is_logged_in) : ?>
    <a href="/myweb/pages/register.php"><i class="bi bi-people"></i>Login/register to place order</a>

<?php endif; ?>


<?php foreach ($orders as $order) : ?>

    <p>
        <i>#<?= $order->id ?></i>
        <i><?= $order->order_date ?></i>
        <b>[<?= $order->status ?>] </b><br>

    </p>


    <?php $products = $products_db->get_by_order_id($order->id);

    
    foreach ($products as $product) {
        $total_price += $product->price;
    } ?>

    <?php foreach ($products as $product) : ?>
        <?php array_push($all_products, $product); ?>
        <p>
            <img src="<?= $product->img_url ?>" width="50" height="50" alt="Product image">
            <i><?= $product->name ?></i>
            <i><?= $product->price ?>kr</i>
        </p>


    <?php endforeach; ?>
    <b> Order value: <?= $total_price ?> kr</b>
    <hr>

<?php endforeach; ?>

<?php $products = $products_db->get_by_order_id($logged_in_user->id); ?>


<div>
    <h2>Total value: <?= $sum = array_reduce($all_products, function ($arr, $value) {
                    return $arr + $value->price;
                })  ?> Kr </h2>
</div>


<?php

Template::footer();

echo "Hello World";
