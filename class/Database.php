<?php 
require_once("configs/connection.php");

class Database{

    public $connection;


    public function __construct(){
        $this->openDbConnect();
        $this->connection->set_charset("utf8");
    }

    // function of database connetion
    public function openDbConnect(){
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if($this->connection->connect_errno){
            die("Database Connection Failed!!") . $this->connection->connect_error;
        }
    }


    public function query($sql){
        return $this->connection->query($sql);
    }

    private function confirmQuery($res){
        if($res){
            die("Query is Failed!!" . $this->connection->error);
        }
    }

    public function es($str){
        return $this->connection->real_escape_string($str);
    }

}



$database = new Database();

?>
