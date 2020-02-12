<?php
//connect to DB
class Dbconnect{
private $host = 'localhost';
private $dbname ='nirsaban_mojo';
private $user = 'nirsaban_mojo';
private $pass = '123456';
public function connect(){
    try {
        $conn = new PDO('mysql:host=' .$this->host. ';dbname='.$this->dbname ,$this->user,$this->pass);
       
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $conn;
      }catch(PDOException $e){
        echo 'Database Error : '. $e->getMessage();
      }



}
}