<?php

class Database {
    private $host = "localhost";
    private $dbName = "cultureDevto";
    private $username = "root";
    private $password = "";
    
    public function connectPDO(){
      try{
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
      }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
      }
        
    }
}

// class Database{
//     public $host = "localhost";
//     public $db_name = "cultureDevto";
//     public $user = "root";
//     public $password = "";
//     public $conn;
  
//     public function __construct(){
//       $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
//     }
//   }
  ?>