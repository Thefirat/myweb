<?php

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "myweb-db";

    protected $conn;
    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);

        if (!$this->conn){
            die("connection failed");
        }
    }
}