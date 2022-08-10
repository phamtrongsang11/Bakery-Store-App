<?php 
    include_once("class/invoice.php");
    
    if(isset($_POST['add'])&&isset($_SESSION['invoice'])){
        $cus=$_POST['cusname'];
        //$date=$_POST['date'];
        $total=$_POST['total'];
        $date=date("Y/m/d");
        $emp=$_SESSION['EmpID'];
        if(invoice::addInvoice($cus,$date,$total,0,$emp)){
        $id=invoice::getLastInvoiceID()+1;
        foreach($_SESSION['invoice'] as $key=>$val){
            $qty=$val['qty'];
            $price=$val['price'];
            $subtotal=$qty*$price;
            invoice::addInvoiceDetail($id,$key,$qty,$price,$subtotal);
            
        }
        }
        echo "<script>window.location.href='index.php?action=invoice&idAct=1';</script>";
        unset($_SESSION['invoice']); 

    }

?>