<?php 
    include_once("connection.php");
    class order{

        public static function getAll(){
            $sql="SELECT * FROM orders";
            return Select($sql);
        }

        public static function getAllOrder($cusID){
            $sql="SELECT * FROM orders WHERE CustomerID='$cusID'";
            return Select($sql);
        }

        public static function getOrderByID($id){
            $sql="SELECT * FROM orders WHERE OrderID='$id'";
            return Select($sql);
        }

        public static function getOrderDetail($orderid){
            $sql="SELECT * FROM orderdetail WHERE OrderID='$orderid'";
            return Select($sql);
        }

        public static function addOrder($CustomerID,$Recipient,$Phone,$Address,$Method,$Date,$Total,$Note,$HVC){
            $sql="INSERT INTO orders (CustomerID,Recipient,Phone,Address,PayMethod,Date,Total,Note,HangVanChuyen) VALUES 
            ('$CustomerID','$Recipient','$Phone','$Address','$Method','$Date','$Total','$Note','$HVC')";
            return Insert($sql);
        }

        public static function addOrderDetail($OrderID,$ProductID,$Price,$Quantity,$SubPrice){
            $sql="INSERT INTO orderdetail (OrderID,ProductID,Price,Quantity,SubPrice) VALUES 
            ('$OrderID','$ProductID','$Price','$Quantity','$SubPrice')";
            return Insert($sql);
        }

        public static function getLastOrderID(){
            $sql="SELECT OrderID FROM orders ORDER BY OrderID desc limit 1";
            $row=Insert($sql)->fetch_array();
            return $row[0];
        }


        public static function getAllStatus(){
            $sql="SELECT * FROM status_order ORDER BY ID ASC";
            return Select($sql);
        }

        public static function getStatusName($id){
            $sql="SELECT Name FROM status_order WHERE ID='$id'";
            return Select($sql);
        }

        public static function getOrderByStatus($id){
            $sql="SELECT * FROM orders WHERE STATUS='$id'";
            return Select($sql);
        }


        public static function totalByStatus($status){
            $sql="SELECT count(OrderID) FROM orders WHERE Status='$status'";
            return Select($sql)->fetch_array();
        }

        public static function updateStatus($orderid,$statusid){
            $sql="UPDATE orders SET Status='$statusid' WHERE OrderID='$orderid'";
            return Update($sql);
        }
        /*
        public static function huy($orderid){
            $sql="UPDATE orders SET Status='STA9' WHERE OrderID='$orderid'";
            return Update($sql);
        }
        public static function dangcb($orderid){
            $sql="UPDATE orders SET Status='STA3' WHERE OrderID='$orderid'";
            return Update($sql);
        }
        public static function dacb($orderid){
            $sql="UPDATE orders SET Status='STA4' WHERE OrderID='$orderid'";
            return Update($sql);
        }
        public static function danggiao($orderid){
            $sql="UPDATE orders SET Status='STA5' WHERE OrderID='$orderid'";
            return Update($sql);
        }
        */
        public static function getAllHangVC(){
            $sql="SELECT * FROM hangvanchuyen";
            return Select($sql);
        }

        public static function updateHVC($orderid,$id){
            $sql="UPDATE orders SET HangVanChuyen='$id' WHERE OrderID='$orderid'";
            return Update($sql);
        }
        
        public static function getNameHangVC($id){
            $sql="SELECT Name FROM hangvanchuyen WHERE ID='$id'";
            $row=Select($sql)->fetch_array();
            return $row[0];
        }

        public static function checkInvoice($orderid){
            $sql="SELECT * FROM (orders INNER JOIN deliverynote on orders.OrderID=deliverynote.OrderID)
            INNER JOIN invoice on deliverynote.DeliveryID=invoice.DeliveryID WHERE orders.OrderID='$orderid'";
            $check=0;
            if(Select($sql)){
                $check=1;
            }
            return $check;
            

        }
        
    }


    
?>