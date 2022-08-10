<!DOCTYPE html>

<style>
    .table{
        color: white;
        background-color: #223f5a;
        table-layout: auto;
        white-space: nowrap;
    }
    .table td{
        overflow: hidden;
        padding-right: 0.2rem;
    }
    .table select{
        width: 80%;
        border-radius: 10px;
    }
    .table tbody tr:hover{
        color: white;
        background-color: #2b4f70;
    }
    tr:nth-child(even){
        background-color: #17314a;
    }
    .button{
        background-color: #0075d9;
        color: white;
        border: 1px solid white;
    }
    .button:hover{
        background-color: #005b88;
        color: white;
    }
    .block-title{
        position: relative;
    }
    .block-title:before{
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 100%;
        border-bottom: #e0e0e0 1px solid;
        content:"";
    }
    .block-title h3{
        position: relative;
        color: white;
        margin-top: 2rem;
        margin-bottom: 2rem;
    }
    .block-title h3 span{
        background-color: #2a4a67;
        padding: 0 1em 0 0;
    }
    .modal {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        transform: scale(1.1);
    }
    
    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 1rem 1.5rem;
        width: fit-content;
        border-radius: 0.5rem;
        color: black;
    }

    .modal-container {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        padding: 16px;
    }

    .show-modal {
        display: block;
        transform: scale(1.0);
        transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
    }
    .linkhvc{
        margin: 15px;
    }
    .linkhvc a{
        background-color: #0075d9;
        color: white;
        border: 1px solid white;
        padding: 10px 20px 10px 20px;
        
    }
    .linkhvc a:hover{
        background-color: #005b88;
        border: 1px solid white;
    }
    .header-controls__count {
        position: absolute;
        top: 0px;
        right: 0px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        border: 1px solid #e16565;
        box-shadow: 0 3px 6px 0 rgb(0 0 0 / 8%);
        background-color: #c24343;
        color: #fff;
        font-size: 14px;
        line-height: 25px;
        text-align: center;
        
    }
    
    .li_tab{
        display: flex;
        align-items: center;
        position: relative;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color .3s ease;
        width: fit-content;
        margin-left: 10px;
        padding: 5px;
    }
    .nav-link{
        display: block;
    }
</style>

<?php 
    include_once("class/order.php");
    include_once("class/deliverynote.php");
    include_once("class/invoice.php");
    include_once("class/receivenote.php");
    include_once("class/product.php");
    /*
    if(isset($_GET['status'])&&isset($_GET['orderid'])){
        $status=$_GET['status'];
        $orderid=$_GET['orderid'];
        order::updateStatus($orderid,$status);
    }
    */

    if(isset($_GET['Act'])&&isset($_GET['orderid'])){
        $act=$_GET['Act'];
        $orderid=$_GET['orderid'];
        switch($act){
            case "STA2":
                order::updateStatus($orderid,$act);
                break;
            case "STA3":
                order::updateStatus($orderid,$act);

                break;
            case "STA9":
                order::updateStatus($orderid,$act);
                break;

            case "STA4":
                
                
                if($resultOrd=order::getOrderByID($orderid)){
                    if($rowOrd=$resultOrd->fetch_array()){
                        if($result=order::getOrderDetail($orderid)){
                            while($row=$result->fetch_array()){
                                if(product::getAmount($row['ProductID'])<$row['Quantity']){
                                    echo "<script>window.location.href='index.php?action=order&Act=STB10&orderid=$rowOrd[0]';</script>";
                                    exit;
                                }
                            }
                        }
                    $date=$rowOrd['Date'];
                    $total=0;
                    if(DeliveryNote::addDeliveryNote($orderid,$date,$total,$_SESSION['EmpID'])){
                        $deliveryid=DeliveryNote::getLastID();
                        if($result=order::getOrderDetail($orderid)){
                            while($row=$result->fetch_array()){
                                $productid = $row['ProductID'];
                                $total += $row['Quantity'];
                                DeliveryNote::addDeliveryNoteDetail($deliveryid,$productid,$row['Quantity']);
                                $qtyOld = product::getAmount($productid)[0];
                                
                                
                                $qtyNew = $qtyOld-$row['Quantity'];
                                product::updateQty($productid,$qtyNew);
                            }
                        }
                        order::updateStatus($orderid,$act);
                        DeliveryNote::updateTotal($deliveryid,$total);
                        
                    }
                    }
                }




                break;
            case "STA5":
                if(isset($_GET['child'])&&$_GET['child']=='invoice'){
                    if($result=order::getOrderByID($orderid)){
                        if($row=$result->fetch_array()){
                            $deliveryid=deliverynote::getID($orderid);
                            
                            
                           // $invoiceid=1;
                                
                            if(invoice::addInvoice($row['Recipient'],$row['Date'],$row['Total'],$deliveryid,$_SESSION['EmpID'])){
                                $invoiceid=invoice::getLastInvoiceID();
                                if($resultDe=DeliveryNote::getDetail($deliveryid)){
                                    while($rowDe=$resultDe->fetch_array()){
                                        $price=product::getPrice($rowDe['ProductID']);
                                        invoice::addInvoiceDetail($invoiceid,$rowDe['ProductID'],$rowDe['Amount'],$price,$rowDe['Amount']*$price);
                                    }
                                }
                            }

                            
                        }
                    }
                }
            
                if(isset($_GET['hvc'])){
                    
                    //order::updateHVC($orderid,$vcid);
                    order::updateStatus($orderid,$act);
                }
                break;

            case "STA8":
                order::updateStatus($orderid,$act);
                
                        
            case "STA6":
                order::updateStatus($orderid,$act);
                break;
            case "STB10":
                order::updateStatus($orderid,$act);
                break;
            case "STB11":
                order::updateStatus($orderid,$act);
                break;

        }
    }

?>


<div class="block-title mb-3"><h3><span>Đơn Hàng</span></h3></div>
	
<div style="margin-bottom: 20px">
        <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&idAct=2"'>Thêm Đơn Hàng</button>
    </div>

<div class="container">
  <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
    <?php
        if($reStat=order::getAllStatus()){
            $check=0;
            if(mysqli_num_rows($reStat) > 0){
            while($rowStat=$reStat->fetch_array()){
                if($check==0){
                    $check++;
    ?>
    <li class="nav-item li_tab">
    <?php 
        if($rowSum=order::totalByStatus($rowStat[0])){
            $sum=$rowSum[0];
        }
        
    ?>  
        <a class="nav-link active" data-toggle="pill" href="#<?php echo "status".$rowStat[0] ?>">
            <?php echo $rowStat['Name'] ?>
            <span class="header-controls__count"><?php echo $sum ?></span>    
        </a>
    </li>
    <?php }
        else{
    ?>
    <li class="nav-item li_tab">
    <?php 
        if($rowSum=order::totalByStatus($rowStat[0])){
            $sum=$rowSum[0];
        }
                    
    ?>  
        <a class="nav-link" data-toggle="pill" href="#<?php echo "status".$rowStat[0] ?>">
            <?php //echo $rowStat['Name']." [".$sum."]" ?>
            <?php echo $rowStat['Name'] ?>
            <span class="header-controls__count"><?php echo $sum ?></span>    
        </a>
    
    </li>
    <?php 
        }
    }
    }
}
    ?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <?php 
        if($reStat=order::getAllStatus()){
        $check=0;
        if(mysqli_num_rows($reStat) > 0){
        while($rowStat=$reStat->fetch_array()){
            $statusID=$rowStat[0];
            if($check==0){
                $check++;
    
    ?>
    <div id="<?php echo "status".$statusID ?>" class="container tab-pane active"><br>
    <table class="table"style="text-align: center;">
	<thead>
    <tr>
		<th scope="col" style="width:5%">ID</th>
        <th scope="col">Người Nhận</th>
        <th scope="col">Ngày Nhận</th>
        <th scope="col">SĐT</th>
        <th scope="col">Địa Chỉ</th>
		<th scope="col">Thanh Toán</th>
		<th scope="col">Tổng Tiền</th>
        <th scope="col">HVC</th>
        <th scope="col">Trạng Thái</th>
		<th scope="col" style="width:20%">Hành Động</th>
    </tr>
	</thead>
	<tbody>
    <?php   
        if($result=order::getOrderByStatus($statusID)){;
        while($row=$result->fetch_array()){
        ?>
            <tr id="<?php echo $row[0] ?>">
                <td><?php echo $row[0] ?></td>
                <td><?php echo $row["Recipient"] ?></td>
                <td><?php echo $row["Date"] ?></td>
                <td><?php echo $row["Phone"] ?></td>
                <td><?php echo $row["Address"] ?></td>
                <td><?php echo $row["PayMethod"] ?></td>
                <td><?php echo number_format($row["Total"], 0, ',', '.') . '₫';  //echo $row["Total"] ?></td>
                <?php
                    $hvc=$row['HangVanChuyen'];
                    //$nameHVC="Chưa";
                    if($hvc!=0)
                        $nameHVC=order::getNameHangVC($hvc);

                
                ?>
                <td><?php echo $nameHVC ?></td>
                

                    
                        <?php
                            if($reChild=order::getStatusName($statusID))
                                if($rowChild=$reChild->fetch_array()){
                        ?>
                            <td><?php echo $rowChild[0] ?></td>
                                    

                        <?php
                                }
                            
                        ?>
                    

                
                <td>
                <div class='btn-group' id="<?php echo $row[0]?>">
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&idAct=1&orderid=<?php echo $row[0]?>"'>Chi Tiết</button>
                    
                   <?php 
                        switch($row['Status']){
                            case "STA1":
                    
                    ?>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STA2&orderid=<?php echo $row[0]?>"'>Xác Nhận</button>
                    <button type='button' class='btn button' 
                   
                    onclick='location.href="index.php?action=order&Act=STA9&orderid=<?php echo $row[0]?>"'>Hủy</button>
                
                    <?php 
                            break;
                            case "STA2":
                                
                    ?>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STA3&orderid=<?php echo $row[0]?>"'>In đơn</button>
                    <?php 
                            break;
                            case "STA3":
                                
                    ?>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STA4&orderid=<?php echo $row[0]?>"'>Xuất kho</button>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STB10&orderid=<?php echo $row[0]?>"'>Hết hàng</button>
                    
                    <?php 
                            break;
                            case "STA4":
                            if(order::checkInvoice($row[0])==0){
                    ?>
                
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STA5&child=invoice&orderid=<?php echo $row[0]?>"'>Lập hóa đơn</button>
                    <?php
                            }
                    ?>
                    <button type='button' class='btn button'
                    onclick='location.href="index.php?action=order&Act=STA5&hvc=1&orderid=<?php echo $row[0]?>"'>Gửi vận chuyển</button>
                    
                    <?php 
                            break;
                            case "STA5":
                                
                    ?>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STA6&orderid=<?php echo $row[0]?>"'>Thành công</button>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STB11&orderid=<?php echo $row[0]?>"'>Thất bại</button>
                    <?php 
                            break;
                            case "STA7":
                    ?>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STA8&orderid=<?php echo $row[0]?>"'>Lập phiếu hoàn hàng</button>
                   
                    
                    <?php 
                            break;
                        }
                    ?>
                </div>
                <!--
                <div id="<?php echo "m".$row[0] ?>" class="modal">
                    <form class="modal-content" action="" style="padding: 20px">
                        <div class="modal-container">
                            <h4 style="text-align: center;">Các hãng vận chuyển liên kết với hệ thống</h4>
                            <?php 
                                if($resultVC=order::getAllHangVC()){
                                while($rowVC=$resultVC->fetch_array()){
                                
                            
                            ?>
                            <div><a href="index.php?action=order&Act=STA5&vcid=<?php echo $rowVC[0]?>&orderid=<?php echo $row[0]?>">
                            <?php echo $rowVC[1] ?></a></div>

                            <?php 
                                    }
                                }
                            
                            ?>
                            <div style="text-align: center;">
                                <button class="btn button ml-2" id="continue" type="button" onclick="">Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
                -->
                </td>
            </tr>
    <?php   
        }
    }
    ?>
	</tbody>
    </table>
    </div>

    <?php 
        }
        else{
    
    ?>

    <div id="<?php echo "status". $statusID ?>" class="container tab-pane fade"><br>
            <table class="table"style="text-align: center;">
	<thead>
    <tr>
		<th scope="col" style="width:5%">ID</th>
        <th scope="col">Người Nhận</th>
        <th scope="col">Ngày Nhận</th>
        <th scope="col">SĐT</th>
        <th scope="col">Địa Chỉ</th>
		<th scope="col">Thanh Toán</th>
		<th scope="col">Tổng Tiền</th>
        <th scope="col">HVC</th>
        <th scope="col">Trạng Thái</th>
		<th scope="col" style="width:20%">Hành Động</th>
    </tr>
	</thead>
	<tbody>
    <?php   
        if($result=order::getOrderByStatus($statusID)){;
        while($row=$result->fetch_array()){
        ?>
            <tr id="<?php echo $row[0] ?>">
                <td><?php echo $row[0] ?></td>
                <td><?php echo $row["Recipient"] ?></td>
                <td><?php echo $row["Date"] ?></td>
                <td><?php echo $row["Phone"] ?></td>
                <td><?php echo $row["Address"] ?></td>
                <td><?php echo $row["PayMethod"] ?></td>
                <td><?php echo number_format($row["Total"], 0, ',', '.') . '₫'; //echo $row["Total"] ?></td>
                <?php
                    $hvc=$row['HangVanChuyen'];
                    //$nameHVC="Chưa";
                    if($hvc != 0)
                        $nameHVC = order::getNameHangVC($hvc);

                
                ?>
                <td><?php echo $nameHVC ?></td>

                <?php
                            if($reChild=order::getStatusName($statusID))
                                if($rowChild=$reChild->fetch_array()){
                        ?>
                            <td><?php echo $rowChild[0] ?></td>
                                    

                        <?php
                                }
                            
                        ?>
                <td>
                <div class='btn-group' id="<?php echo $row[0]?>">
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&idAct=1&orderid=<?php echo $row[0]?>"'>Chi Tiết</button>
                    
                    <?php 
                        switch($row['Status']){
                            case "STA1":
                    
                    ?>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STA2&orderid=<?php echo $row[0]?>"'>Xác Nhận</button>
                    <button type='button' class='btn button' 
                   
                    onclick='location.href="index.php?action=order&Act=STA9&orderid=<?php echo $row[0]?>"'>Hủy</button>
                
                    <?php 
                            break;
                            case "STA2":
                                
                    ?>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STA3&orderid=<?php echo $row[0]?>"'>In đơn</button>
                    <?php 
                            break;
                            case "STA3":
                                
                    ?>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STA4&orderid=<?php echo $row[0]?>"'>Xuất kho</button>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STB10&orderid=<?php echo $row[0]?>"'>Hết hàng</button>
                    
                    <?php 
                            break;
                            case "STA4":
                                if(order::checkInvoice($row[0])==0){
                    ?>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STA5&child=invoice&orderid=<?php echo $row[0]?>"'>Lập Hóa Đơn</button>
                    <?php 
                                }
                    
                    ?>
                    
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STA5&hvc=1&orderid=<?php echo $row[0]?>"'>Gửi Vận chuyển</button>
                    
                    <?php 
                            break;
                            case "STA5":
                                
                    ?>
                    
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STA6&orderid=<?php echo $row[0]?>"'>Thành công</button>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=order&Act=STB11&orderid=<?php echo $row[0]?>"'>Thất bại</button>
                    <?php 
                            break;
                                
                    ?>
                    

                    <?php 

                        }
                    ?>
                </div>
                <!--
                <div id="<?php echo "m".$row[0] ?>" class="modal">
                    <form class="modal-content" action="" style="padding: 20px">
                        <div class="modal-container">
                            <h4 style="text-align: center;">Chọn hãng vận chuyển</h4>
                            <?php 
                                if($resultVC=order::getAllHangVC()){
                                while($rowVC=$resultVC->fetch_array()){
                                
                            
                            ?>
                            <div class="linkhvc"><a href="index.php?action=order&Act=STA5&vcid=<?php echo $rowVC[0]?>&orderid=<?php echo $row[0]?>">
                            <?php echo $rowVC[1] ?></a></div>

                            <?php 
                                    }
                                }
                            
                            ?>
                            <div style="text-align: center;">
                                <button class="btn button ml-2" id="continue" type="button" onclick="">Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
                -->
                </td>

            </tr>
    <?php   
        }
    }
    ?>
	</tbody>
    </table>
    
    </div>

    <?php 
        }
    }
    }
}
    ?>
  </div>
</div>

<script>

    $(document).ready(function(){
        /*
        $("button#vc").on("click",function(e){
            
            e.preventDefault();
            var id=$(this).parent().attr("id");
            document.getElementById("m"+id).style.display="block";

        })
        */

        $("div #continue").on("click",function(e){
            e.preventDefault();
            var cont=$(this).parent().parent().parent().parent().attr("id");
            document.getElementById(cont).style.display="none";
        })
        
    })
        /*
    $("td #status").change(function(){
        var id=$(this).parent().parent().attr("id");
        window.location = "index.php?action=order&status="+$(this).val()+"&orderid="+id;
    })
    */
</script>