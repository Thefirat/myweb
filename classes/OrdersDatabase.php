<?php

require_once __DIR__ . "/../classes/Database.php";
require_once __DIR__ . "/../classes/Order.php";

class OrdersDatabase extends Database
{


    //Get all
    public function get_all(){
        $query = "SELECT * FROM `orders`";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->execute();

        $result = $stmt->get_result();

        $db_orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $orders = [];

        foreach($db_orders as $db_order){
            $orders[] = new Order( 
            $db_order["customer-id"], 
            $db_order["status"], 
            $db_order["order-date"], 
            $db_order["id"]);
        }
        return $orders;

    }
    /*save order
    public function place_order(Order $order){
        $query = "INSERT INTO orders (`customer-id`, `status`, `order-date`, `id`) VALUES (?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $customer_id = $order->customer_id;
        $status = $order->status;
        $order_date = $order->order_date;
        $id = $order->order_id;

        $stmt->bind_param("issi", $customer_id, $status,$order_date, $id);
        $success = $stmt->execute();

        if (!$success) {
            die("Failed to place order:" . $stmt->error);
        }
        return $success;

    }
    */

    //Get by user id
    public function get_order_by_user_id($customer_id){
        $query = "SELECT * FROM `orders` WHERE `customer-id` = ? ";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("i", $customer_id);

        $stmt->execute();

        $result = $stmt->get_result();

        $db_orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $orders = [];

     foreach ( (array)$db_orders as $db_order){

            $order = new Order(
                $db_order["customer-id"], 
                $db_order["status"], 
                $db_order["order-date"], 
                $db_order["id"]
            );

            $orders[] = $order;
        }
        
        return $orders;
    }

    //create
    public function create(Order $order){
        $query = "INSERT INTO orders (`customer-id`, `status`, `order-date`) VALUES (?,?,?)";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("iss", $order->customer_id, $order->status, $order->order_date);

        $success = $stmt->execute();

        if($success){
            return $stmt->insert_id;
        }

        return false;

    }

    public function create_product_order($order_id, $product_id){
        $query = "INSERT INTO `product-orders` (`order-id`, `product-id`) VALUES (?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param("ii", $order_id, $product_id);
        $success = $stmt->execute();

        return $success;
    }
   



  public function get_ordes_by_product_id($product_id)
  {
      $query = "SELECT *, products.id AS `product-id` FROM `products` 
      JOIN product-orders ON product-orders.product-id = products.`id`
      WHERE products.`id` = ?";
      $stmt = mysqli_prepare($this->conn, $query);
      $stmt->bind_param("i", $product_id);
      $stmt->execute();
      $result = $stmt->get_result();
      $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
      return $orders;
  }


  //update 

  public function update_order_status($order_id, $status)
    {
        $query = "UPDATE `orders` SET `status` = ? WHERE `id` = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param("si", $status, $order_id);
        $success = $stmt->execute();
        return $success;
    }



}