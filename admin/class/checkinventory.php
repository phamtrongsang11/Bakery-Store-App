<?php 
    include_once("connection.php");
    class checkinventory{

        public static function addcheck($employeeid, $date, $totalqty, $totalwrong, $totalvalue){
            $sql = "INSERT INTO checkinventory (EmployeeID, Date, TotalQty, TotalWrongQty, TotalValue) 
            VALUES ('$employeeid', '$date', '$totalqty', '$totalwrong', '$totalvalue')";
           
            return Insert($sql);
        }

        public static function addDetailcheck($checkid, $productid, $price, $qty, $wrongqty, $status, $subvalue){
            $sql = "INSERT INTO detailcheckinventory (CheckID, ProductID, Price, Qty, WrongQty, StatusQty, SubValue) 
            VALUES ('$checkid', '$productid', '$price', '$qty', '$wrongqty', '$status', '$subvalue')";
            
            return Insert($sql);
        }

        public static function getAllCheck(){
            $sql = "SELECT * FROM checkinventory INNER JOIN employee ON checkinventory.EmployeeID = employee.EmpID 
            ORDER BY CheckID DESC" ;
            
            return Select($sql);
        }
        public static function getDetailCheck($id){
            $sql = "SELECT * FROM detailcheckinventory 
            INNER JOIN product ON product.ProductID = detailcheckinventory.ProductID WHERE CheckID = '$id'";
            return Select($sql);
        }

        
        public static function deleteCheck($id){
            $sql = "DELETE FROM checkinventory WHERE CheckID = '$id'";
            return Delete($sql);
        }

        public static function deleteDetailCheck($id){
            $sql = "DELETE FROM detailcheckinventory WHERE CheckID = '$id'";
            return Delete($sql);
        }


        public static function getLastID(){
            $sql="SELECT CheckID FROM checkinventory ORDER BY CheckID desc limit 1";
            $row = Select($sql)->fetch_array();
            return $row[0];
        }
        public static function updateStatus($id){
            $sql="UPDATE checkinventory SET Status = '1' WHERE CheckID = '$id'";
            return Update($sql);
        }


        

    }



?>