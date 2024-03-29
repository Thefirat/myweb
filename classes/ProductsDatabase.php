<?php
require_once __DIR__ . "/Database.php";
require_once __DIR__ . '/Product.php';

class ProductsDatabase extends Database{
    //get_one
    public function get_one($id){
        $query = "SELECT * FROM products WHERE id = ? ";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $db_product = mysqli_fetch_assoc($result);

        $product = null;

        if($db_product ){
            $product = new Product(
                $db_product["product-name"],
                $db_product["product-description"],
                $db_product["price"],
                $db_product["image"],
                $id

            );
        }
        return $product;
    }


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

    //get by order id

    public function get_by_order_id($order_id)
    {
        $query = "SELECT po.id, po.`order-id`, u.username, p.`product-name`, p.`product-description`, p.price,  p.`image`, o.`customer-id`, o.`order-date`, o.`status` FROM `product-orders` AS po
        JOIN orders AS o ON po.`order-id` = o.id 
        JOIN users AS u ON o.`customer-id` = u.id
        JOIN products AS p ON po.`product-id` = p.id
        WHERE po.`order-id` = ?";

        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $db_products = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $products = [];

     foreach ($db_products as $db_product){

            $product = new Product(
                $db_product["product-name"],
                $db_product["product-description"],
                $db_product["price"],
                $db_product["image"],
            
            );

            $products[] = $product;
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

    public function update (Product $product, $id){

        $query = "UPDATE products SET `product-name`=?, `product-description`=?, price=?,`image`=? WHERE id=?";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("ssisi", $product->name, $product->description, $product->price, $product->img_url, $id);

        return $stmt->execute();
    }
    //delete

    public function delete($id){
        $query = "DELETE FROM products WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

}