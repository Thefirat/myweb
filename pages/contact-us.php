<?php
require_once __DIR__ . '/../classes/Template.php';

$is_logged_in = isset($_SESSION['user']);
$logged_in_user = $is_logged_in ? $_SESSION['user'] : null;
$is_admin = $is_logged_in && ($logged_in_user->role == 'admin');

Template::header('');

?>


<?php

  if (!$is_logged_in) : ?>
    <a href="/myweb/pages/register.php"><i class="bi bi-people"></i>Login to send message</a>

<?php else : ?>

    <div class="container">
        <div class="text">
            <h1 class="text-center">Contact Us</h1>        
            <hr class="w-25 m-auto bg-dark">    
        </div>
        <form action="/myweb/scripts/post-contact-form.php" method="POST" autocomplete="off">
            <div class="user">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="email">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="contact">
                <label for="contact">Contact</label>
                <input type="number" name="contact" id="contact" class="form-control">
            </div>
            <div class="message">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control" cols="30" rows="5"></textarea>
            </div>
            <button class="btn btn-success">Send Message</button>

        </form>

        
    </div>

    <?php endif; ?>








<?php

Template::footer();