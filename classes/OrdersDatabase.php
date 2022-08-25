<?php

require_once __DIR__ . "/../classes/Database.php";
require_once __DIR__ . "/../classes/Order.php";

class OrdersDatabase extends Database
{


    //Get all
    public function get_all()
    {
        $query = "SELECT * FROM `orders`";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->execute();

        $result = $stmt->get_result();

        $db_orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $orders = [];

        foreach ($db_orders as $db_order) {
            $orders[] = new Order(
                $db_order["customer-id"],
                $db_order["status"],
                $db_order["order-date"],
                $db_order["id"]
            );
        }
        return $orders;
    }

    //Get by user id
    public function get_order_by_user_id($customer_id)
    {
        $query = "SELECT po.id, po.`order-id`, u.username, o.`customer-id`, o.`order-date`, o.`status` 
        FROM `product-orders` AS po
        JOIN orders AS o ON po.`order-id` = o.id 
        JOIN users AS u ON o.`customer-id` = u.id
        WHERE o.`customer-id` = ?
        group by  po.`order-id`";
        
        

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("i", $customer_id);

        $stmt->execute();

        $result = $stmt->get_result();

        $db_orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $orders = [];

        foreach ((array)$db_orders as $db_order) {

            $order = new Order(
                $db_order["customer-id"],
                $db_order["status"],
                $db_order["order-date"],
                $db_order["order-id"]

            );

            $orders[] = $order;
        }

        return $orders;
    }

    //create
    public function create(Order $order)
    {
        $query = "INSERT INTO orders (`customer-id`, `status`, `order-date`) VALUES (?,?,?)";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("iss", $order->customer_id, $order->status, $order->order_date);

        $success = $stmt->execute();

        if ($success) {
            return $stmt->insert_id;
        }

        return false;
    }

    public function create_product_order($order_id, $product_id)
    {
        $query = "INSERT INTO `product-orders` (`order-id`, `product-id`) VALUES (?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param("ii", $order_id, $product_id);
        $success = $stmt->execute();

        return $success;
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
 //--------RADERA EN ORDER----------//

    public function delete($id)
    {
        $query = "DELETE FROM `orders` WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}

