<?php
    include_once("../class/producer.php");
    if(isset($_POST['add'])){
        $prodcer=new producer($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['address']);
        producer::insert($prodcer);
        header("Location: ../index.php?action=producer");
    }
    else if(isset($_POST['edit'])&&isset($_GET['id'])){
        $id=$_GET['id'];
        $prodcer=new producer($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['address']);
        producer::update($prodcer,$id);
        header("Location: ../index.php?action=producer");
    }

?>