<?php 
    include_once("class/receivenote.php");
    include_once("class/product.php");

    if(isset($_POST['add'])&&isset($_SESSION['receive'])){
        $prod = $_POST['producername'];
        $totalAmount = $_POST['totalqty'];
        $totalCost = $_POST['totalcost'];
        $date = date("Y/m/d");
        $emp = $_SESSION['EmpID'];
        
        
        if(ReceiveNote::addReceiveNote($date, $totalAmount, $totalCost, $emp, $prod)){
            $id = ReceiveNote::getLastID();
            foreach($_SESSION['receive'] as $key=>$val){
                $qty = $val['qty'];
                $cost = $val['cost'];
                $expiration = $val['expiration'];
               
                ReceiveNote::addReceiveNoteDetail($id, $key, $qty, $cost, $expiration);

                $qtyOld = product::getAmount($key)[0];
                $costOld = product::getCost($key)[0];

                $qtyNew = $qtyOld + $qty;

                

                $costNew = round((($qtyOld*$costOld)+($qty*$cost))/$qtyNew,-3);

                // $qtyOld." ".$qtyNew;

                product::updateQty($key, $qtyNew);
                product::updateCost($key, $costNew);

            }
            unset($_SESSION['receive']); 
            echo "<script>window.location.href='index.php?action=receivenote';</script>";
            
        }
        

    }

?>