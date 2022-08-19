<?php 

require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/ProductsDatabase.php';
require_once __DIR__ . '/../classes/Template.php';

$products_db = new ProductsDatabase();

$products = $products_db->get_all();

Template::header("Products");?>

<div class="products">
<?php

foreach($products as $product): ?>

<article class="product">
    <img class="img-product" src="<?=$product->img_url ?>" width="120" height="120" alt="Product image">

    <div>
    <b><?=$product->name ?></b>
    <p><?=$product->description ?></p>
    <b><?=$product->price ?>kr</b>

    <form action="/myweb/scripts/post-add-to-cart.php" method="post">
        <input type="hidden" name="product-id" value="<?=$product->id ?>">
        <input type="submit" value="Add to cart">
    </form>

</div>
</article>

<?php

endforeach; ?>
</div>

<?php

Template::footer();
