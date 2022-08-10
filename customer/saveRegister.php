<?php 
    include("../class/customer.php");
    /*
    if(isset($_POST['fullname'])&&isset($_POST['password'])&&isset($_POST['address'])&&isset($_POST['city'])){
        $password = md5($_POST['password']);
        $cus=new customer($_POST['username'],$password,$_POST['fullname'],$_POST['email'],$_POST['phone'],$_POST['address'],$_POST['city']);
        $result=customer::add($cus);
        if($result){
?>
            <script>alert("Register succesful");</script>
<?php
            header("Location: ../product/index.php?id=4&position=top");
        }
        
        else{
?>
            <script>alert("Register falled");</script>
<?php
        }

    }
    */


    if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['phone'])){
        $password = md5($_POST['password']);
        $fullname = $_POST['username'];
        $address = "";
        $email = "";
        $city = "";
        $cus=new customer($_POST['username'], $password, $fullname, $email, $_POST['phone'], $address, $city);
        $result=customer::add($cus);
        if($result){
?>
            <script>alert("Register succesful");</script>
<?php
            header("Location: ../product/index.php?id=4&position=top");
        }
        
        else{
?>
            <script>alert("Register falled");</script>
<?php
        }

    }
?>