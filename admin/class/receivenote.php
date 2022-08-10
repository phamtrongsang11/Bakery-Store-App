<?php 
    include_once("connection.php");
    class ReceiveNote{

        public static function getAll(){
            $sql="SELECT * FROM receivenote";
            return Select($sql);
        }


        public static function getDetail($id){
            $sql="SELECT * FROM receivenotedetail WHERE ReceiveID='$id'";
            return Select($sql);
        }
        
        public static function addReceiveNote($date,$totalAmount,$totalCost,$employee,$producer){
            $sql="INSERT INTO receivenote (Date,TotalAmount,TotalCost,EmployeeID,ProducerID) VALUES 
            ('$date','$totalAmount','$totalCost','$employee','$producer')";
            return Insert($sql);
        }

        public static function addReceiveNoteDetail($id,$ProductID,$Amount,$Cost,$Expiration){
            $sql="INSERT INTO receivenotedetail (ReceiveID,ProductID,Amount,Cost,ExpirationDate) VALUES 
            ('$id','$ProductID','$Amount','$Cost','$Expiration')";
           
            return Insert($sql);
        }
        
        public static function getLastID(){
            $sql="SELECT ReceiveID FROM receivenote ORDER BY ReceiveID desc limit 1";
            $row=Insert($sql)->fetch_array();
            return $row[0];
        }
        public static function updateTotal($id,$total){
            $sql="UPDATE receivenotenote SET TotalAmount='$total' WHERE ReceiveID='$id'";
            return Update($sql);
        }

        public static function deleteReceive($id){
            $sql="DELETE FROM receivenote WHERE ReceiveID='$id'";
            return Delete($sql);
        }
        public static function updateExpiration($id,$Expiration){
            $sql = "UPDATE receivenotedetail SET ExpirationDate = '$Expiration' WHERE ProductID = '$id'";
            return Update($sql);
        }
    }


?>