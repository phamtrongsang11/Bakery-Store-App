<?php 
include_once("connection.php");
class banking{

    public static function getAll(){
        $sql="SELECT * FROM Banking";
        return Select($sql);
    }

}


?>