<?php

require_once __DIR__ . "/../classes/Product.php";
require_once __DIR__ . "/../classes/ProductsDatabase.php";

session_start();

if (isset($_POST["product-id"])){

    $products_db = new ProductsDatabase();
    $product = $products_db->get_one($_POST["product-id"]);

    if (!isset($_SESSION["cart"])){
        $_SESSION["cart"] = [];
    }

    if ($product) {
        $_SESSION["cart"][] = $product;

        header("Location: /myweb/pages/products.php");
        die();
    }
}else{
    die("Invalid input");
}

die("Error adding product to cart");