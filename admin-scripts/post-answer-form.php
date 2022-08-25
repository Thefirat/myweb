<?php 
require_once __DIR__ . '/../classes/Contact.php';
require_once __DIR__ . '/../classes/ContactsDatabase.php';



 $success = false;

if (isset($_POST["id"]) && isset ($_POST["reply"])) {
    $reply_db = new ContactsDatabase();

    $success = $reply_db->reply_message($_POST["id"], $_POST["reply"]);
} else {
        die("Invalid input");
}

if ($success) {
    header("Location: /myweb/pages/contact-us.php"); 
    die();
} else {
    die("Error replying message");
}
