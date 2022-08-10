<?php
    include_once("connection.php");
    class discount{
        public $DiscountID,$DiscountName,$DateFrom,$DateTo,$Image;
        public function __construct($DiscountName,$DateFrom,$DateTo,$Image){
            $this->DiscountName=$DiscountName;
            $this->DateFrom=$DateFrom;
            $this->DateTo=$DateTo;
            $this->Image=$Image;
        }

        public static function insert($dis){
            $sql="INSERT INTO discount (DiscountName,DateFrom,DateTo,Image) VALUE 
            ('$dis->DiscountName','$dis->DateFrom','$dis->DateTo','$dis->Image')";
            return Insert($sql);
        }

        public static function update($dis,$id){
            $sql="UPDATE discount SET DiscountName='$dis->DiscountName',DateFrom='$dis->DateFrom',DateTo='$dis->DateTo',
            Image='$dis->Image' WHERE DiscountID='$id'";
            return Update($sql);
        }

        public static function update_withoutImg($name,$datefrom,$dateto,$id){
            $sql="UPDATE discount SET DiscountName='$name',DateFrom='$datefrom',DateTo='$dateto' 
            WHERE DiscountID='$id'";
            return Update($sql);
        }

        public static function delete($id){
            $sql="DELETE FROM discount WHERE DiscountID='$id'";
            return Delete($sql);
        }

        public static function getAll(){
            $sql="SELECT * FROM discount";
            return Select($sql);
        }

        public static function getByID($id){
            $sql="SELECT * FROM discount WHERE DiscountID='$id'";
            return Select($sql);
        }

        public static function getDetail($id){
            $sql="SELECT * FROM discountdetail WHERE DiscountID='$id'";
            return Select($sql);
        }

        public static function insertDetail($idDiscount,$idProduct,$per){
            $sql="INSERT INTO discountdetail VALUES ('$idDiscount','$idProduct','$per')";
            return Insert($sql);
        }
        
        public static function deleteDetail($idDiscount,$idProduct){
            $sql="DELETE FROM discountdetail WHERE DiscountID='$idDiscount' AND ProductID='$idProduct'";
            return Delete($sql);
        }


    }


?>