<?php 
    include_once("class/order.php");
    include_once("class/customer.php");

    
    if(isset($_POST['add'])&&isset($_SESSION['order'])){
        
        //$date=$_POST['date'];
        
        //$date = date("Y/m/d");
        //$emp = $_SESSION['EmpID'];
        $cusid = $_POST['customer'];
        $total = $_POST['total'];

        if($row = customer::getByID($cusid)->fetch_array())
            $recipient = $row["Fullname"];

        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $method = $_POST['method'];
        
        $note = $_POST['note'];
        $date = $_POST['date'];
        $hvc = $_POST['hvc'];
        /*
        if(invoice::addInvoice($cus,$date,$total,0,$emp)){
        $id=invoice::getLastInvoiceID()+1;
        foreach($_SESSION['invoice'] as $key=>$val){
            $qty=$val['qty'];
            $price=$val['price'];
            $subtotal=$qty*$price;
            invoice::addInvoiceDetail($id,$key,$qty,$price,$subtotal);
            
        }
        
        }
        */
        if(order::addOrder($cusid,$recipient,$phone,$address,$method,$date,$total,$note,$hvc)){
            $orderid=order::getLastOrderID();
            foreach($_SESSION['order'] as $key=>$val){
                $subtotal=$val['qty']*$val['price'];
                order::addOrderDetail($orderid,$key,$val['price'],$val['qty'],$subtotal);

                //$qtyNew=product::getAmount($key)-$val['qty'];
                //echo $qtyNew;
                //product::updateQty($key,$qtyNew);
            }
           
            //echo "<script>window.location.href='index.php?action=summary&orderid=$orderid';</script>";
        }
        echo "<script>window.location.href='index.php?action=order&idAct=2';</script>";
        unset($_SESSION['order']); 

    }

?>