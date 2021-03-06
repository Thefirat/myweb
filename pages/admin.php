<?php
require_once __DIR__ . '/../classes/Template.php';
require_once __DIR__ . '/../classes/Product.php';
require_once __DIR__ . "/../classes/ProductsDatabase.php";
require_once __DIR__ . '/../classes/UsersDatabase.php';
require_once __DIR__ . "/../classes/OrdersDatabase.php";

$users_db = new UsersDatabase();
$users = $users_db->get_all_users();

$products_db = new ProductsDatabase();
$products = $products_db->get_all();

$orders_db = new OrdersDatabase();
$orders = $orders_db->get_ordes_by_product_id($product_id);

Template::header('');

?>
<div class="admin-create">
<div class="create-products">
<h2>Create Product</h2>
<?php // CREATE PRODUCT ?>

<form action="/myweb/admin-scripts/post-create-product.php" method="post" enctype="multipart/form-data">
    <input type="text" name="product-name" placeholder="Name"><br>
    <textarea name="product-description" placeholder="Description"></textarea><br>
    <input type="number" name="price" placeholder="Price"><br>
    <input type="file" name="image" accept="image/*" ><br>
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
<?php foreach($users as $user): ?>
    <p>
    <a href="/myweb/pages/admin-user.php?username=<?= $user->username ?>">
           <?= $user->username ?>
        </a>
        <i><?= $user->role?></i>
    </p>

    <?php endforeach; ?>

    </div>
    </div>

    <hr>

<h2>Orders</h2>

<?php foreach($orders as $order): ?>
    <p>
    <?= $order->date ?>   
        <i><?= $order->status?></i>
    </p>
    <button>Mark as send</button> 

    <?php endforeach; ?>
    
<?php

Template::footer();