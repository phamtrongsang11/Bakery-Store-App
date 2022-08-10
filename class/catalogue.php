<?php 
    include_once("connection.php");
    class catalogue{
        public $CataID,$CataName;

        public static function getAll(){
            $sql="SELECT * FROM catalogue";
            return Select($sql);
        }
        public static function getbyID($id){
            $sql="SELECT * FROM catalogue WHERE CataID='$id' ";
            return Select($sql);
        }
        public static function add($name){
            $sql="INSERT INTO catalogue (CataName) VALUES ('$name')";
            return Insert($sql);
        }
        public static function update($name,$id){
            $sql="UPDATE catalogue set CataName='$name' WHERE CataID='$id'";
            return Update($sql);
        }
        public static function delete($id){
            $sql="DELETE FROm catalogue WHERE CataID='$id'";
            return Delete($sql);
        }

    }


?>