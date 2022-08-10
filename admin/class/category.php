<?php 
    include_once("connection.php");
    class category{
        public $CategoryID,$Name,$Description,$Image;

        public function __construct($Name,$Description,$Image){
            $this->Name=$Name;
            $this->Description=$Description;
            $this->Image=$Image;
        }
        public static function getAll(){
            $sql="SELECT * FROM category";
            return Select($sql);
        }
        public static function getName($id){
            $sql="SELECT Name FROM category WHERE CategoryID='$id' ";
            return Select($sql);
        }
        public static function getbyID($id){
            $sql="SELECT * FROM category WHERE CategoryID='$id' ";
            return Select($sql);
        }
        public static function add($cate){
            $sql="INSERT INTO category (Name, Description, Image) VALUES ('$cate->Name','$cate->Description','$cate->Image')";
            return Insert($sql);
        }
        public static function update($cate,$id){
            $sql="UPDATE category set Name='$cate->Name', Description='$cate->Description',Image='$cate->Image' WHERE CategoryID='$id'";
            return Update($sql);
        }
        public static function update_without_image($name,$des,$id){
            $sql="UPDATE category set Name='$name', Description='$des' WHERE CategoryID='$id'";
            return Update($sql);
        }
        public static function delete($id){
            $sql="DELETE FROm category WHERE CategoryID='$id'";
            return Delete($sql);
        }

    }


?>