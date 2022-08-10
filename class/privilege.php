<?php 
    include_once("connection.php");
    class privilege{
        public $PrivID,$PrivName;

        public static function getAll(){
            $sql="SELECT * FROM privilege";
            return Select($sql);
        }
        public static function getName($id){
            $sql="SELECT Name FROM privilege WHERE PrivID='$id' ";
            return Select($sql);
        }
        public static function getbyID($id){
            $sql="SELECT * FROM privilege WHERE PrivID='$id' ";
            return Select($sql);
        }
        public static function add($id,$name){
            $sql="INSERT INTO privilege VALUES ('$id','$name')";
            return Insert($sql);
        }
        public static function update($name,$id){
            $sql="UPDATE privilege set PrivName='$name' WHERE PrivID='$id'";
            return Update($sql);
        }
        public static function delete($id){
            $sql="DELETE FROM privilege WHERE PrivID='$id'";
            return Delete($sql);
        }
        public static function deletePriv_Cata($id){
            $sql="DELETE FROM priv_cata WHERE PrivID='$id'";
            return Delete($sql);
        }
        public static function addPriv_Cata($privID,$cataID){
            $sql="INSERT INTO priv_cata VALUES('$privID','$cataID')";
            return Insert($sql);
        }
        public static function getLastID(){
            $sql="SELECT PrivID FROM privilege order by PrivID desc limit 1";
            return Select($sql);
        }
        public static function checkPriv($privID,$cataID){
            $sql="SELECT * FROM priv_cata WHERE PrivID='$privID' AND CataID='$cataID'";
            return Select($sql);
        }
        public static function getPriv_Cata($id){
            $sql="SELECT * FROM priv_cata WHERE PrivID='$id'";
            return Select($sql);
        }

    }


?>