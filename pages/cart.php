<?php
require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . '/../classes/Template.php';

$is_logged_in = isset($_SESSION['user']);
$logged_in_user = $is_logged_in ? $_SESSION['user'] : null;
$is_admin = $is_logged_in && ($logged_in_user->role == 'admin');

$products = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];

Template::header('');


//$total = 0;
?>

<div id="product-details" hidden>
    <img src="" id="product-img" height="70" width="70">
    <p id="product-name"></p>
    <p id="product-description"></p>
    <p id="product-price"></p>

</div>

<?php foreach ($products as $product) : ?>

    <div class="cart-product">
        <img src="<?= $product->img_url ?>" id="product-img" height="70" width="70">
        <b><?= $product->name ?></b>
        <i><?= $product->price ?>Kr</i>
        <p><?= $product->description ?></p>
    </div>
<?php

endforeach;

if (!$is_logged_in) : ?>
    <a href="/myweb/pages/register.php"><i class="bi bi-people"></i>Login to place order</a>

<?php else : ?>

    <div class="cart-total">
        <h2>Total: <?= $sum = array_reduce($products, function ($arr, $value) {
                        return $arr + $value->price;
                    }) ?> </h2>
    </div>

    <form action="/myweb/scripts/post-place-order.php" method="post">
        <input class="btn" type="submit" value="Place order">
    </form>


<?php endif; ?>


<?php

Template::footer();
