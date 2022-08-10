<?php 
    include_once("connection.php");
    class customer{
        public $CustomerID,$UserName,$Password,$Fullname,$Email,$Phone,$Address,$City,$Image;
        function __construct($UserName,$Password,$Fullname,$Email,$Phone,$Address,$City){
            $this->UserName=$UserName;
            $this->Password=$Password;
            $this->Fullname=$Fullname;
            $this->Email=$Email;
            $this->Phone=$Phone;
            $this->Address=$Address;
            $this->City=$City;
        }
        public static function getAll(){
            $sql="SELECT * FROM customers";
            return Select($sql);
        }
        public static function getByID($cusid){
            $sql="SELECT * FROM customers WHERE CustomerID='$cusid'";
            return Select($sql);
        }
        public static function checkLogin($username,$password){
            $sql="SELECT CustomerID FROM customers WHERE UserName='$username' AND Password='$password'";
            return Select($sql);
        }
        public static function add($cus){
            $sql="INSERT INTO customers (UserName,Password,Fullname,Email,Phone,Address,City) VALUES 
            ('$cus->UserName','$cus->Password','$cus->Fullname','$cus->Email','$cus->Phone','$cus->Address','$cus->City')";
            return Insert($sql);
        }
        public static function update($username,$fullname,$email,$phone,$address,$city,$image,$id){
            $sql="UPDATE customers SET UserName='$username',Fullname='$fullname',
            Email='$email',Phone='$phone',Address='$address',City='$city',Image='$image'
            WHERE CustomerID='$id'";
            return Update($sql);
        } 
         
        public static function update_status($status,$id){
            $sql="UPDATE customers set Status='$status' WHERE CustomerID='$id'";
            return Update($sql);
        }
        
    }
?>