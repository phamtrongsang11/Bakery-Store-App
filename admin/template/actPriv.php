<?php
include_once("../class/privilege.php");
if(isset($_POST['add'])&&isset($_POST['name'])){
    
    $id = privilege::getLastID()->fetch_array()[0] + 1;
   
    privilege::add($id, $_POST['name']);
    foreach($_POST['cata'] as $key=>$value){
        privilege::addPriv_Cata($id,$value);
    }
    
    header("Location: ../index.php?action=privilege");
}
else if(isset($_POST['edit'])&&isset($_GET['id'])){
    $id=$_GET['id'];
    privilege::update($_POST['name'],$id);   
    privilege::deletePriv_Cata($id);
    foreach($_POST['cata'] as $key=>$value){
        privilege::addPriv_Cata($id,$value);
    }
    header("Location: ../index.php?action=privilege");
}
?>