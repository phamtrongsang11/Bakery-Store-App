<?php 
    include_once("connection.php");
    class employee{
        public $EmpID,$EmpName,$UserName,$Password,$Email,$Phone,$Address,$PrivID;
        public function __construct($EmpName,$UserName,$Password,$Email,$Phone,$Address,$Image,$PrivID){
            $this->EmpName=$EmpName;
            $this->UserName=$UserName;
            $this->Password=$Password;
            $this->Email=$Email;
            $this->Phone=$Phone;
            $this->Address=$Address;
            $this->Image=$Image;
            $this->PrivID=$PrivID;
        }

        public static function getAll(){
            $sql="SELECT * FROM employee";
            return Select($sql);
        }
        public static function getByID($id){
            $sql="SELECT * FROM employee WHERE empID='$id'" ;
            return Select($sql);
        }
        public static function getName($id){
            $sql="SELECT * FROM employee WHERE empID='$id'" ;
            $row=Select($sql)->fetch_array();
            return $row[1];
        }

        public static function insert($emp){
            $sql="INSERT INTO employee (EmpName,UserName,Password,Email,Phone,Address,Image,PrivID)
            VALUES('$emp->EmpName','$emp->UserName','$emp->Password','$emp->Email',
            '$emp->Phone','$emp->Address','$emp->Image','$emp->PrivID')";
            return Insert($sql);
        }
        public static function update($emp,$id){
            $sql="UPDATE employee SET EmpName='$emp->EmpName',UserName='$emp->UserName',Password='$emp->Password',
            Email='$emp->Email',Phone='$emp->Phone',Address='$emp->Address',Image='$emp->Image',PrivID='$emp->PrivID' 
            WHERE EmpID='$id'";
            return Update($sql);
        }
        public static function update_WithoutImg($name,$username,$pass,$email,$phone,$address,$priv,$id){
            $sql="UPDATE employee SET EmpName='$name',UserName='$username',Password='$pass',
            Email='$email',Phone='$phone',Address='$address',PrivID='$priv' WHERE EmpID='$id'";
            return Update($sql);
        }
        public static function delete($id){
            $sql="DELETE FROM employee WHERE EmpID='$id'";
            return Delete($sql);
        }
        public static function checkLogin($username,$password){
            $sql="SELECT EmpID FROM employee WHERE UserName='$username' AND Password='$password'";
            return Select($sql);
        }
        
    }







?>