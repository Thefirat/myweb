<?php 
require_once __DIR__ . '/../classes/Contact.php';
require_once __DIR__ . '/../classes/ContactsDatabase.php';



 $success = false;

 

    $contact = new Contact($_POST["username"], $_POST["email"], $_POST["contact"], $_POST["message"]);

    $contacts_db = new ContactsDatabase();

    $success = $contacts_db->send_message($contact);

    If($success) {
        header( "refresh:3; url=/myweb/pages/contact-us.php");
        echo "<p class='confirmation'>Message Sent!</p>";
    }

    else{
    
        die("error sending message");

    }


    


?>


<style>
.confirmation{
	color: blue;
    border:1px solid black;
    background: white;
    padding: 10px;
    font-size: xx-large;
    text-align: center;
    margin: auto;
    background-color: lightblue;
    height: 100px;
    width: 500px;      
    display: block;
    margin: 15px auto 15px;  
    border-radius: 50px;
    

}
</style>