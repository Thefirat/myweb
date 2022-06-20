<?php

require_once __DIR__ . "/../classes/Database.php";
require_once __DIR__ . "/../classes/Order.php";

class OrdersDatabase extends Database
{
    //Get one

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
    //save order
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

    //Get by user id
    public function get_order_by_user_id($customer_id){
        $query = "SELECT * FROM `orders` WHERE `customer-id` = ?";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("i", $customer_id);

        $stmt->execute();

        $result = $stmt->get_result();

        $db_orders = mysqli_fetch_assoc($result);

        $order = null;

        if ($db_orders){

            $order = new Order(
                $db_orders["customer-id"], 
                $db_orders["status"], 
                $db_orders["order-date"], 
                $db_orders["id"]
            );
        }
        return $order;
    }
   
}