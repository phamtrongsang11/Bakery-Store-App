<?php 
    session_start();
    include("../class/customer.php");
    if(isset($_POST['username'])&&$_POST['password']){
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        
        $result=customer::checkLogin($username,$password);
        echo($password);
        if($result->num_rows>0){
            $row=$result->fetch_array();
            $_SESSION['CusID']=$row["CustomerID"];
            header("Location:../product/index.php");
        }
        else
                    
            header("Location:../product/index.php?id=4&position=top&login=false");
    }


?>