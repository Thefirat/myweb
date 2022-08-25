<?php 

Class Contact {
    public $id;
    public $username;
    public $email;
    public $contact;
    public $message;
    public $reply;

    public function __construct($username, $email, $contact, $message, $id=0, $reply = 0)
    {
        if($id > 0){
            $this->id = $id;
        }

        
        $this->username = $username;
        $this->email = $email;
        $this->contact = $contact;
        $this->message = $message;
        $this->reply = $reply;

    }

}
