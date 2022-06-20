<?php
require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . '/../classes/Template.php';

$is_logged_in = isset($_SESSION['user']);
$logged_in_user = $is_logged_in ? $_SESSION['user'] : null;
$is_admin = $is_logged_in && ($logged_in_user->role == 'admin');

$products = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];
 

Template::header('');
?>

<div id="product-details" hidden>
    <img src="" id="product-img" height="70" width="70">
    <p id="product-name"></p>
    <p id="product-description"></p>
    <p id="product-price"></p>

</div>

<?php foreach($products as $product) : ?>

    <div>
        <img src="<?= $product->img_url?>" id="product-img" height="70" width="70">
        <b><?= $product->name ?></b>
        <b><?= $product->price ?></b>
        <p><?= $product->description ?></p>
    </div>

   <?php if (!$is_logged_in) : ?>
                    <a href="/myweb/pages/register.php"><i class="bi bi-people"></i>Login to place order</a>

                <?php elseif ($is_admin) : ?>
                    <a href="/myweb/pages/orders.php"><i class="bi bi-box"></i>Place order</a>

                <?php endif; ?>

   
    
<?php
endforeach;


Template::footer();