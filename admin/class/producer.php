<?php 
include_once("connection.php");
class producer{
    public $ProducerID,$ProducerName,$Email,$Phone,$Address;
    public function __construct($ProducerName,$Email,$Phone,$Address){
        $this->ProducerName=$ProducerName;
        $this->Email=$Email;
        $this->Phone=$Phone;
        $this->Address=$Address;
    }

    public static function selectAll(){
        $sql="SELECT * FROM producer";
        return Select($sql);
    }
    public static function getByID($id){
        $sql="SELECT * FROM producer WHERE ProducerID='$id'";
        return Select($sql);
    }
    public static function insert($producer){
        $sql="INSERT INTO producer (ProducerName,Email,Phone,Address) 
        VALUES ('$producer->ProducerName','$producer->Email','$producer->Phone','$producer->Address')";
        return Insert($sql);
    }

    public static function update($producer,$id){
        $sql="UPDATE producer SET ProducerName='$producer->ProducerName',Email='$producer->Email',
        Phone='$producer->Phone',Address='$producer->Address' WHERE ProducerID='$id'";
        return Update($sql);
    }

    public static function delete($id){
        $sql="DELETE FROM producer WHERE ProducerID='$id'";
        return Delete($sql);
    }


}

?>