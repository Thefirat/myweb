<?php
require_once __DIR__ . "/Database.php";
require_once __DIR__ . '/Product.php';

class ProductsDatabase extends Database{
    //get_one


    //get_all
    public function get_all(){
        $query = "SELECT * FROM products";

        $result = mysqli_query($this->conn, $query);

        $db_products = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $products = [];

        foreach ($db_products as $db_product) {
           $db_id = $db_product["id"];
           $db_name = $db_product["product-name"];
           $db_description = $db_product["product-description"];
           $db_price = $db_product["price"];
           $db_img_url = $db_product["image"];


           $products [] = new Product($db_name, $db_description, $db_price,  $db_img_url, $db_id);

        }

        return $products;
    }



    //create

    public function create(Product $product){
        $query = "INSERT INTO products (`product-name`, `product-description`, price, `image`) VALUES (?,?,?,?)";

        $stmt = mysqli_prepare($this->conn, $query);


        $stmt->bind_param("ssis", $product->name, $product->description, $product->price, $product->img_url);

        $success = $stmt->execute();

        return $success;

    }
    //update
    //delete
}