<?php 
    include_once("connection.php");
    class Special{
        public $SpecialID,$SpecialName;

        public function __construct($Name){
            $this->SpecialName=$Name;
        }
        public static function getAll(){
            $sql="SELECT * FROM special";
            return Select($sql);
        }
        public static function add($special){
            $sql="INSERT INTO special (SpecialName) VALUES ('$special->SpecialName')";
            return Insert($sql);
        }

    }


?>