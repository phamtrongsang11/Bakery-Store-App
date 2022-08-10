<?php 
    include_once("class/discount.php");
    include_once("class/product.php");

    if(isset($_POST['add'])&&isset($_POST['discountid'])&&isset($_SESSION['discount'])){

        $id=$_POST['discountid'];
   
       
        foreach($_SESSION['discount'] as $key=>$val){
            //echo "<br>".$key." ".$val['percent'];
            $percent = $val['percent'];
            discount::insertDetail($id,$key,$percent);
            
        }
        unset($_SESSION['discount']); 
       
       echo "<script>window.location.href='index.php?action=discount&idAct=3&id=$id';</script>";
       

    }
    

?>