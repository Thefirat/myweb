<?php
require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/Contact.php";



class ContactsDatabase extends Database{
    //Send Message

    

    public function send_message(Contact $contact){
        $query = "INSERT INTO contacts(username, email, contact, `message`) VALUES (?,?,?,?)";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("ssis", $contact->username, $contact->email, $contact->contact, $contact->message);

        $success = $stmt->execute();

        return $success;
       
    }

}

    ?>