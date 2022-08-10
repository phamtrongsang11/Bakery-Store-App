<!DOCTYPE html>

<style>
    a.nav-link{
        color: white;
    }
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
    .modal{
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 50%;
        height: 60%;
        overflow: auto;;
        margin-top: 30%;
        margin-left: 30%;
        color: black;
    }
    .modal-content{
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        border: 1px solid #888;
        width: 70%;
        
    }
    .linkhvc{
        margin: 20px;
    }
    .linkhvc a{
        background-color: #0075d9;
        color: white;
        border: 1px solid white;
        padding: 10px;
        
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
</style>

<?php 
    include_once("../class/order.php");
    include_once("../class/product.php");
    if(isset($_GET['Act'])&&isset($_GET['orderid'])){
        $act=$_GET['Act'];
        $orderid=$_GET['orderid'];
        switch($act){
            case "STA7":
                order::updateStatus($orderid,$act);
                break;
            case "STA9":
                order::updateStatus($orderid,$act);
                break;

        }
    }

?>

<?php 
    if(isset($_SESSION['CusID'])){
        include_once("../class/order.php");
        $cusid=$_SESSION['CusID'];
    
?>
<div class="block-title mb-3"><h3><span>LỊCH SỬ ĐƠN HÀNG</span></h3></div>
	

<div class="container">
  <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
    <?php
        if($reStat=order::getAllStatus())
            $check=0;
            while($rowStat=$reStat->fetch_array()){
                if($check==0){
                    $check++;
    ?>
    <li class="nav-item li_tab">
    <?php 
        if($rowSum=order::totalByStatusAndCustomer($rowStat[0],$cusid)){
            $sum=$rowSum[0];
        }
                    
    ?>  
      <a class="nav-link active" data-toggle="pill" href="#<?php echo "status".$rowStat[0] ?>">
            <?php echo $rowStat['Name'] ?>
            <span class="header-controls__count"><?php echo $sum ?></span>    
        </a></li>
    <?php }
        else{
    ?>
    <li class="nav-item li_tab">
    <?php 
        if($rowSum=order::totalByStatusAndCustomer($rowStat[0],$cusid)){
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
    ?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <?php 
        if($reStat=order::getAllStatus())
        $check=0;
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
        <th scope="col">Ngày Lập</th>
        <th scope="col">SĐT</th>
        <th scope="col">Đia Chỉ</th>
		<th scope="col">Thanh Toán</th>
		<th scope="col">Tổng Tiền</th>
        <th scope="col">HVC</th>
        <th scope="col">Trạng Thái</th>
		<th scope="col">Hành Động</th>
    </tr>
	</thead>
	<tbody>
    <?php   
        if($result=order::getOrderByStatusAndCustomer($statusID,$cusid)){;
        while($row=$result->fetch_array()){
        ?>
            <tr id="<?php echo $row[0] ?>">
                <td><?php echo $row[0] ?></td>
                <td><?php echo $row["Recipient"] ?></td>
                <td><?php echo $row["Date"] ?></td>
                <td><?php echo $row["Phone"] ?></td>
                <td><?php echo $row["Address"] ?></td>
                <td><?php echo $row["PayMethod"] ?></td>
                <td><?php echo number_format($row["Total"], 0, ',', '.') . '₫'  //echo $row["Total"] ?></td>
                <?php
                    $hvc=$row['HangVanChuyen'];
                    $nameHVC="Chưa";
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
                    onclick='location.href="index.php?action=orderdetail&orderid=<?php echo $row[0]?>"'>Chi Tiết</button>
                
                <?php 
                        switch($row['Status']){
                            case "STA6":
                    
                    ?>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?id=2&position=top&Act=STA7&orderid=<?php echo $row[0]?>"'>Trả hàng</button>
                <?php 
                        break;
                        case "STA1":
                    
                    

                ?>
                <button type='button' class='btn button' 
                   
                    onclick='location.href="index.php?id=2&position=top&Act=STA9&orderid=<?php echo $row[0]?>"'>Hủy</button>
                
                
                </td>
                <?php 
                        break;
                        
                    }
                    

                ?>
                </div>
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
        <th scope="col">Ngày Lập</th>
        <th scope="col">SĐT</th>
        <th scope="col">Đia Chỉ</th>
		<th scope="col">Thanh Toán</th>
		<th scope="col">Tổng Tiền</th>
        <th scope="col">HVC</th>
        <th scope="col">Trạng Thái</th>
		<th scope="col">Hành Động</th>
        
    </tr>
	</thead>
	<tbody>
    <?php   
        if($result=order::getOrderByStatusAndCustomer($statusID,$cusid)){;
        while($row=$result->fetch_array()){
        ?>
            <tr id="<?php echo $row[0] ?>">
                <td><?php echo $row[0] ?></td>
                <td><?php echo $row["Recipient"] ?></td>
                <td><?php echo $row["Date"] ?></td>
                <td><?php echo $row["Phone"] ?></td>
                <td><?php echo $row["Address"] ?></td>
                <td><?php echo $row["PayMethod"] ?></td>
                <td><?php echo $row["Total"] ?></td>
                <?php
                    $hvc=$row['HangVanChuyen'];
                    $nameHVC="Chưa";
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
                    onclick='location.href="index.php?action=orderdetail&orderid=<?php echo $row[0]?>"'>Chi Tiết</button>
                    <?php 
                        switch($row['Status']){
                            case "STA6":
                    
                    ?>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?id=2&position=top&Act=STA7&orderid=<?php echo $row[0]?>"'>Trả hàng</button>
                    <?php 
                        break;
                        case "STA1":
                    ?>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=orderdetail&orderid=<?php echo $row[0]?>"'>Chi Tiết</button>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?id=2&position=top&Act=STA9&orderid=<?php echo $row[0]?>"'>Hủy</button>
                
                
                </td>
                <?php 
                        break;
                        
                    }
                    

                ?>
                
                </div>
                
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
    ?>
  </div>
</div>

<script>

    $(document).ready(function(){
        $("button#vc").on("click",function(e){
            
            e.preventDefault();
            var id=$(this).parent().attr("id");
            document.getElementById("m"+id).style.display="block";

        })

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