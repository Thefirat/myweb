<?php
require_once __DIR__ . '/../classes/Template.php';
require_once __DIR__ . '/../classes/UsersDatabase.php';

$users_db = new UsersDatabase();
$users = $users_db->get_all_users();

var_dump($users);
Template::header('Admin page');

?>



<hr>

<h2>Create Product</h2>

<hr>

<h2>Create User</h2>
<form action="/myweb/admin-scripts/post-create-user.php" method="post">
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <select name="role">
        <option value="admin">Admin</option>
        <option value="customer">Customer</option>
    </select>
    <input type="submit" value="Save">
</form>

<hr>

<h2>Users</h2>
<?php foreach($users as $user): ?>
    <p>
    <a href="/myweb/pages/admin-user.php?id=<?= $user->id ?>">
           <?= $user->username ?>
        </a>
    </p>

    <?php endforeach; ?>
    
<?php
Template::footer();