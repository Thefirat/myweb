<?php 

Class Contact {
    public $username;
    public $email;
    public $contact;
    public $message;

    public function __construct($username, $email, $contact, $message)
    {
        $this->username = $username;
        $this->email = $email;
        $this->contact = $contact;
        $this->message = $message;

    }

}
