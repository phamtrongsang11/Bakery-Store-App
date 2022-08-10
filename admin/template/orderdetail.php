<!DOCTYPE html>

<style>
    .table{
        color: white;
        background-color: #223f5a;
        table-layout:fixed;
        word-wrap: break-word;
    }
    .table td{
        overflow: hidden;
        padding-right: 0.2rem;
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
</style>

<?php 
    include_once("class/order.php");
    if(isset($_GET['idAct'])&&isset($_GET['id'])){
        if($_GET['idAct']==1){
            $satus=0;
            $result=customer::update_status($satus,$_GET['id']);
        }
        else{
            $satus=1;
            $result=customer::update_status($satus,$_GET['id']);
        }
    }

?>
    
<div>
    
	<?php 
    if(isset($_GET['orderid'])){
        include_once("class/order.php");
        include_once("class/product.php");
        $orderid=$_GET['orderid'];
    
    ?>
    <div class="block-title mb-3"><h3><span>Chi Tiết Đơn Hàng</span></h3></div>
	<h5>ID Đơn Hàng: <?php echo $orderid ?></h5>
	<table class="table"style="text-align: center;">
	<thead>
    <tr>
		<th scope="col" style="width: 5%">#</th>
		<th scope="col" style="width: 15%">Tên Sản Phẩm</th>
		<th scope="col">Hình Ảnh</th>
	
        <th scope="col">Đơn Giá</th>
        <th scope="col">Số Lượng</th>
        <th scope="col">Tổng Phụ</th>
        
    </tr>
	</thead>
	<tbody>
    <?php   
        if($result=order::getOrderDetail($orderid)){
        $i=1;
        $amount=0;
        $total=0;
        while($row=$result->fetch_array()){
            if($resultVeg=product::getByID($row['ProductID'])){
            
            if($rowVeg=$resultVeg->fetch_array()){
                $amount+=$row["Quantity"];
                $total+=$row["SubPrice"];
        ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $rowVeg['ProductName'] ?></td>
                
                <td><img src=<?php echo "../$rowVeg[Image]"?> alt="<?php echo $rowVeg[2] ?>" class="img-fluid rounded"></td>
                
                <td><?php echo number_format($row["Price"], 0, ',', '.') . '₫'; //echo $row["Price"] ?></td>
                <td><?php echo $row["Quantity"] ?></td>
                <td><?php echo number_format($row["SubPrice"], 0, ',', '.') . '₫'; //echo $row["SubPrice"] ?></td>
            </tr>
    <?php   
                }
            }
        }
    }
    ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Tổng Cộng:</td>
                <td><?php echo $amount?></td>
                <td><?php echo number_format($total, 0, ',', '.') . '₫';  //echo $total?></td>
            </tr>
	</tbody>
    </table>
    <?php 
        }
    ?>
</div>
	
