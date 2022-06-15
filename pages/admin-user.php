<?php
require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";

$user_db = new UsersDatabase();
$user = $user_db->get_one_by_username($_GET["username"]);

Template ::header("Admin-user");

?>
<div class="edit-user">
<h2>Edit user</h2>

<b>Edite the role or delete user:<i> <?= $user->username?></i></b>

<form action="/myweb/admin-scripts/post-update-user.php?username=<?= $_GET["username"] ?>" method="post">
    <input type="text" name="role" placeholder="Role" value="<?= $user->role ?>"><br>
    <input type="submit" value="Edit">
</form>

<form class="form-delete-user" action="/myweb/admin-scripts/post-delete-user.php" method="post">
    <input type="hidden" name="username" value="<?= $_GET["username"] ?>">
    <input type="submit" value="Delete user">
</form>

</div>
<?php

Template::footer();