<?php
require_once __DIR__ . '/../classes/Template.php';
require_once __DIR__ . "/../classes/ContactsDatabase.php";

$is_logged_in = isset($_SESSION['user']);
$logged_in_user = $is_logged_in ? $_SESSION['user'] : null;
$is_admin = $is_logged_in && ($logged_in_user->role == 'admin');

$messages_db = new ContactsDatabase();
$messages = $messages_db->get_all_messages();

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

    
    <?php foreach ($messages as $message)  : ?>

<div>
<h3>Message ID: <?= $message->id?><br>
<h3>Username: <?= $message->username?><br>
<h3>Email:<?= $message->email?><br>
</div>

<form action="/myweb/admin-scripts/post-answer-form.php" method="POST" autocomplete="off">
<input type="hidden" name="id" value="<?= $message->id?>">

<hr>
<div class="reply"> 
<h3>Message: </h3><i><?= $message->message?></i><br>                                
</div>  

<div> 
<h3>Admin: </h3><i><?= $message->reply?></i><br>                                
</div> 
<hr>


<?php endforeach; ?>


</form>

    <?php endif; ?>










<?php

Template::footer();