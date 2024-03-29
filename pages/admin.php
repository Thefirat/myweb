<?php
require_once __DIR__ . '/../classes/Template.php';
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . "/../classes/ProductsDatabase.php";
require_once __DIR__ . '/../classes/UsersDatabase.php';
require_once __DIR__ . "/../classes/OrdersDatabase.php";
require_once __DIR__ . "/../classes/ContactsDatabase.php";


$users_db = new UsersDatabase();
$users = $users_db->get_all_users();

$products_db = new ProductsDatabase();
$products = $products_db->get_all();

$orders_db = new OrdersDatabase();
$orders = $orders_db->get_all();

//Contact page 
$messages_db = new ContactsDatabase();
$messages = $messages_db->get_all_messages();


Template::header('');

?>
<div class="admin-create">
    <div class="create-products">
        <h2>Create Product</h2>

        <form action="/myweb/admin-scripts/post-create-product.php" method="post" enctype="multipart/form-data">
            <input type="text" name="product-name" placeholder="Name"><br>
            <textarea name="product-description" placeholder="Description"></textarea><br>
            <input type="number" name="price" placeholder="Price"><br>
            <input type="file" name="image" accept="image/*"><br>
            <input type="submit" value="Save">
        </form>
        <hr>

        <h2>Products</h2>

        <?php foreach ($products as $product) : ?>
            <p>
                <a href="/myweb/pages/admin-product.php?id=<?= $product->id ?>">
                    <?= $product->name ?>
                </a>
            </p>
        <?php endforeach; ?>

    </div>

    <hr>
    <div class="create-user">
        <h2>Create User</h2>
        <form action="/myweb/admin-scripts/post-create-user.php" method="post">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <select name="role">
                <option disabled selected>Role</option>
                <option value="admin">Admin</option>
                <option value="customer">Customer</option>
            </select>
            <input type="submit" value="Save">
        </form>

        <hr>

        <h2>Users</h2>
        <?php foreach ($users as $user) : ?>
            <p>
                <a href="/myweb/pages/admin-user.php?username=<?= $user->username ?>">
                    <?= $user->username ?>
                </a>
                <i><?= $user->role ?></i>
            </p>

        <?php endforeach; ?>

    </div>
</div>

<hr>

<h2>Orders</h2>

<?php foreach ($orders as $order) : ?>
    <div>
        <b>#<?= $order->id ?></b>
        <?= $order->order_date ?>
        <b>[<?= $order->status ?>]</b>
        <form action="/myweb/admin-scripts/post-edit-order.php" method="post">
            <input type="hidden" name="id" value="<?= $order->id ?>">
            <select name="status">
                <option disabled selected>Status</option>
                <option value="waiting">Waiting</option>
                <option value="send">Send</option>
            </select>
            <input type="submit" value="Edit">
        </form>

        <form action="/myweb/admin-scripts/post-delete-order.php" method="post">
            <input type="hidden" name="id" value="<?= $order->id ?>">
            <input type="submit" value="Delete order">

        </form>


    </div>
    <hr>

<?php endforeach; ?>


        <div class="container">
        <div class="text">
            <h2 class="text-center">Customer Emails</h2>           
        </div>
        
            <?php foreach ($messages as $message)  : ?>

                <div>
                <h3>Message ID: <?= $message->id?><br>
                <h3>Username: <?= $message->username?><br>
                <h3>Email:<?= $message->email?><br>
            </div>

            <form action="/myweb/admin-scripts/post-answer-form.php" method="POST" autocomplete="off">
            <input type="hidden" name="id" value="<?= $message->id?>">
           
            <div class="reply"> 
                <h3>Message: </h3><i><?= $message->message?></i><br>                  
                <textarea name="reply" id="message" class="form-control" cols="30" rows="5"></textarea><br>
                
                <button class="btn btn-success">Reply</button>               
            </div>  

            <div> 
                <h3>Admin: </h3><i><?= $message->reply?></i><br>                  
                <textarea name="reply" id="message" class="form-control" cols="30" rows="5"></textarea><br>
                
                <button class="btn btn-success">Reply</button>               
            </div> 
             
            
        <?php endforeach; ?>
            
            
        </form>

<?php


Template::footer();
