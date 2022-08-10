<?php 
    class productdetail{
        public $ProductID,$Cpu,$Ram,$Hardware,$Des,$Image1,$Image2;

        public function __construct($ProductID,$Cpu,$Ram,$Hardware,$Des,$Image1,$Image2){
            $this->ProductID=$ProductID;
            $this->Cpu=$Cpu;
            $this->Ram=$Ram;
            $this->Hardware=$Hardware;
            $this->Des=$Des;
            $this->Image1=$Image1;
            $this->Image2=$Image2;
        }

        public static function insert($product){
            $sql="INSERT INTO productdetail
            VALUES ('$product->ProductID','$product->Cpu','$product->Ram','$product->Hardware',
            '$product->Des','$product->Image1','$product->Image2')";
            return Insert($sql);
        }
        public static function update($product,$id){
            $sql="UPDATE productdetail SET Cpu='$product->Cpu',Ram='$product->Ram',
            Hardware='$product->Hardware',Des='$product->Des',Image1='$product->Image1',
            Image2='$product->Image2' WHERE ProductID = '$id'";
            return Update($sql);
        }
        public static function update_withoutImage($Cpu,$Ram,$Hardware,$Des,$id){
            $$sql="UPDATE productdetail SET Cpu='$Cpu',Ram='$Ram',Hardware='$Hardware',
            Des='$Des' WHERE ProductID = '$id'";
            return Update($sql);
        }
        public static function delete($id){
            $sql="DELETE FROM productdetail WHERE ProductID='$id'";
            return Delete($sql);
        }

        public static function getByID($id){
            $sql="SELECT * FROM productdetail where ProductID='$id'";
            return Select($sql);
        }


    }


?>