<?php
require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . '/../classes/Template.php';


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
    
<?php
endforeach;


Template::footer();