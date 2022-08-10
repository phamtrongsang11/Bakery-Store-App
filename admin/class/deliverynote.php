<?php 
    include_once("connection.php");
    class DeliveryNote{

        public static function getAll(){
            $sql="SELECT * FROM deliverynote ORDER BY DeliveryID DESC";
            return Select($sql);
        }

        public static function getByOrderID($id){
            $sql="SELECT * FROM deliverynote WHERE OrderID='$id'";
            return Select($sql);
        }

        public static function getDetail($id){
            $sql="SELECT * FROM deliverynotedetail WHERE DeliveryID='$id'";
            return Select($sql);
        }
        public static function addDeliveryNote($orderid,$date,$total,$employee){
            $sql="INSERT INTO deliverynote (Date,TotalAmount,OrderID,EmployeeID) VALUES 
            ('$date','$total','$orderid','$employee')";
            return Insert($sql);
        }

        public static function addDeliveryNoteDetail($id,$ProductID,$Amount){
            $sql="INSERT INTO deliverynotedetail (DeliveryID,ProductID,Amount) VALUES 
            ('$id','$ProductID','$Amount')";
            return Insert($sql);
        }

        public static function getLastID(){
            $sql="SELECT DeliveryID FROM deliverynote ORDER BY DeliveryID desc limit 1";
            $row=Insert($sql)->fetch_array();
            return $row[0];
        }
        public static function updateTotal($id,$total){
            $sql="UPDATE deliverynote SET TotalAmount='$total' WHERE DeliveryID='$id'";
            return Update($sql);
        }

        public static function getID($orderid){
            $sql="SELECT DeliveryID FROM deliverynote WHERE OrderID='$orderid'";
            $row=Insert($sql)->fetch_array();
            return $row[0];
        }

        public static function deleteDelivery($id){
            $sql="DELETE FROM deliverynote WHERE DeliveryID='$id'";
            return Delete($sql);
        }
    }


?>