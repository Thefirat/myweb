<?php 

require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/ProductsDatabase.php';
require_once __DIR__ . '/../classes/Template.php';

$products_db = new ProductsDatabase();

$products = $products_db->get_all();

Template::header("Products");?>

<div class="product">
<?php

foreach($products as $product): ?>

<article class="product">
    <img src="<?=$product->img_url ?>" width="150" height="150" alt="Product image">

    <div>
    <b><?=$product->name ?></b>
    <p><?=$product->description ?></p>
    <b><?=$product->price ?>kr</b>

    <form action="/myweb/scripts/post-add-to-cart.php" method="post">
        <input type="hidden" name="product-id" value="<?=$product->id ?>">
        <input type="submit" value="Add to cart">
    </form>

</div>

<?php

endforeach; ?>
</div>

<?php

Template::footer();
