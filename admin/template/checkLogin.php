<?php 
    session_start();
    include("../class/employee.php");
    if(isset($_POST['username'])&&$_POST['password']){
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        
        $result=employee::checkLogin($username,$password);
        if($result&&$result->num_rows>0){
            
            $row=$result->fetch_array();
            $_SESSION['EmpID']=$row["EmpID"];
            header("Location:../index.php");
            
        }
        else
            header("Location:login.php");
    }


?>