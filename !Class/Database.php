<?php


class Database
{
    protected $conn;

    public function __construct($Host, $DBName, $UserName, $Password)
    {
        try {
            $this->conn = new PDO("mysql:host=$Host;dbname=$DBName", $UserName, $Password);
        } catch (PDOException $exception) {
            echo "Connection failed $exception";
        }
    }

    public function getConn(){
        return $this->conn;
    }

}