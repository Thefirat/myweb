<?php

require_once __DIR__ . "/../classes/ProductsDatabase.php";


$success = false;

if (isset($_POST["id"])) {
    $products_db = new ProductsDatabase();

    $success = $products_db->delete($_POST["id"]);
} else {
    die("Invalid input");
}

if ($success) {
    header("Location: /myweb/pages/admin.php");
    die();
} else {
    die("Error deleting product");
}
