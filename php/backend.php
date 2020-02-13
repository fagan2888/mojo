<?php

class Artikim{
private $id;
private $name;
private $address;
private $type;
private $lat;
private $lng;
private $conn;
private $tableName ='icecream';

function setId($id) { $this->id = $id; }
function getId() { return $this->id; }
function setName($name) { $this->name = $name; }
function getName() { return $this->name; }
function setAddress($address) { $this->address = $address; }
function getAddress() { return $this->address; }
function setType($type) { $this->type = $type; }
function getType() { return $this->type; }
function setLat($lat) { $this->lat = $lat; }
function getLat() { return $this->lat; }
function setLng($lng) { $this->lng = $lng; }
function getLng() { return $this->lng; }


   public  function __construct(){
    require_once('DbConnect.php');
    $conn = new DbConnect();
    $this->conn = $conn->connect();
    }
    public function getCollegesBlanLatLng(){
        $sql = "SELECT * FROM $this->tableName WHERE lat IS NULL AND lng IS NULL LIMIT 10";
        $stmt = $this->conn->prepare($sql);
         $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getAllColleges(){
      $sql = "SELECT * FROM $this->tableName";
      $stmt = $this->conn->prepare($sql);
       $stmt->execute();
     return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }
  public function insertNew(){
    $sql = $this->conn->prepare("INSERT INTO $this->tableName (name, address) VALUES (:name, :address)");
    $sql->execute(array('name' => $this->name, 'address' => $this->address));
    if($sql->execute(array('name' => $this->name, 'address' => $this->address))){
      return true;
    }
    else{
      return false;
    }
  }
  public function delShop(){
    $sql = $this->conn->prepare("DELETE   FROM $this->tableName WHERE name = :name AND address = :address ");
    $sql->execute(array('name' => $this->name, 'address' => $this->address));
    if($sql->execute(array('name' => $this->name, 'address' => $this->address))){
      return true;
    }
    else{
      return false;
    }
  }
    public function updateCollegesWithLatLng(){
      $sql = "UPDATE $this->tableName SET lat = :lat, lng = :lng WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':lat',$this->lat);
      $stmt->bindParam(':lng',$this->lng);
      $stmt->bindParam(':id',$this->id);
      if($stmt->execute()){
        return true;
      }
      else{
        return false;
      }

    }

}
?>



