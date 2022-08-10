<?php 
    include_once("class/checkinventory.php");
    include_once("class/product.php");

    if(isset($_POST['add'])&&isset($_SESSION['check'])){
        
        $totalQty = $_POST['totalqty'];
        $totalWrongQty = $_POST['totalwrongqty'];
        $totalValue = $_POST['totalvalue'];
        $date = date("Y/m/d");
        $emp = $_SESSION['EmpID'];
        
        
        if(checkinventory::addcheck($emp, $date, $totalQty, $totalWrongQty, $totalValue)){
            $id = checkinventory::getLastID();
            foreach($_SESSION['check'] as $key=>$val){
                $qty = $val['qty'];
                $wrongqty = $val['wrongqty'];
                $subvalue = $val['subvalue'];
                $status = $val['status'];
                $price = $val['price'];
               
                checkinventory::addDetailcheck($id, $key,$price ,$qty, $wrongqty, $status, $subvalue);

            }
            unset($_SESSION['check']); 
            echo "<script>window.location.href='index.php?action=checkinventory';</script>";
            
        }
        

    }
    if(isset($_GET['updateqty'])&&isset($_GET['checkid'])){
        $id = $_GET['checkid'];
        $err = 0;
        if($result = checkinventory::getDetailCheck($id))
            while($row = $result->fetch_array()){
                if(!product::updateQty($row['ProductID'], $row['Qty']))
                    $err = 1;
            }
        if($err == 0 ){
            checkinventory::updateStatus($id);
            echo "<script>window.location.href='index.php?action=checkinventory';</script>";
        }
    }

?>