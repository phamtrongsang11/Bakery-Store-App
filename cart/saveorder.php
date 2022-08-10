<?php 

    if(isset($_SESSION['CusID'])&&isset($_SESSION['cart'])){
        include_once("../class/order.php");
        include_once("../class/product.php");
        $cusid = $_SESSION['CusID'];
        $recipient = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $method = $_POST['method'];
        $total = 0;
        $note = $_POST['note'];
        $date = $_POST['date'];
        $hvc = $_POST['hvc'];

        //echo $note;
        foreach($_SESSION['cart'] as $key=>$val){
            $total+=$val['qty']*$val['price'];
        }

        //$date=date("Y/m/d");
        foreach($_SESSION['cart'] as $key=>$val){
            if(order::checkQuantity($key)<$val['qty']){
                header("Location:../index.php?id=1&position=top&quantity=-1");
            }
        }

        

        if(order::addOrder($cusid,$recipient,$phone,$address,$method,$date,$total,$note,$hvc)){
            $orderid=order::getLastOrderID();
            foreach($_SESSION['cart'] as $key=>$val){
                $subtotal=$val['qty']*$val['price'];
                order::addOrderDetail($orderid,$key,$val['price'],$val['qty'],$subtotal);

                //$qtyNew=product::getAmount($key)-$val['qty'];
                //echo $qtyNew;
                //product::updateQty($key,$qtyNew);
            }
           
            echo "<script>window.location.href='index.php?action=summary&orderid=$orderid';</script>";
        }
        
    }
?>