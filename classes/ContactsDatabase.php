<?php
require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/Contact.php";



class ContactsDatabase extends Database{
    //Send Message

    

    public function send_message(Contact $contact){
        $query = "INSERT INTO contacts(username, email, contact, `message`, reply) VALUES (?,?,?,?,?)";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("ssiss", $contact->username, $contact->email, $contact->contact, $contact->message,  $contact->reply);

        $success = $stmt->execute();

        return $success;
       
    }

    public function get_all_messages()
    {
        $query = "SELECT * FROM contacts";

        $result = mysqli_query($this->conn, $query);

        $db_messages = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $messages =  [];

        foreach ($db_messages as $db_message) {
            
            $db_id = $db_message["id"];
            $db_username = $db_message["Username"];
            $db_email = $db_message["Email"];
            $db_contact = $db_message["Contact"];
            $db_message = $db_message["Message"];
            

            $messages[] = new Contact( $db_username, $db_email, $db_contact, $db_message, $db_id);
        }

        return $messages;
    }

}

    ?>