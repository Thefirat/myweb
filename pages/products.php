<?php 

require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . '/../classes/ProductsDatabase.php';
require_once __DIR__ . '/../classes/Template.php';

$products_db = new ProductsDatabase();

$products = $products_db->get_all();

Template::header("Products");

foreach($products as $product): ?>

<div>

    <img src="<?=$product->img_url ?>" width="50" height="50" alt="Product image">
    <b><?=$product->name ?></b>
    <i><?=$product->price ?>kr</i>

    <button>Add to cart</button>

    

   
</div>

<?php

endforeach;

Template::footer();
