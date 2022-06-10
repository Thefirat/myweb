<?php
require_once __DIR__ . '/../classes/Template.php';
require_once __DIR__ . '/../google/google-config.php';
require_once __DIR__ . '/../classes/UsersDatabase.php';



Template::header('');

$google_login_btn = '<a href="' . $google_client->createAuthUrl() . '">Login with Google</a>';


?>


<h2>Register</h2>
<form action="/myweb/scripts/post-register-user.php" method="post">
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="password" name="confirm-password" placeholder="Confirm Password"><br>
    <input type="submit" value="Register">
</form>

<hr>

<h2>Login</h2>
<form action="/myweb/scripts/post-login.php" method="post">
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="submit" value="Login">
    <?= $google_login_btn ?>
    
</form>

<hr>

<?php
Template::footer();
?>