<?php

require_once "core.php";
class Database extends Core{
    // specify your own database credentials
    // private $host = "localhost";
    // private $db_name = "transp_u";
    // private $username = "transp_u_master";
    // private $password = "Ht90tWFOTh4wrn9r";
    public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
