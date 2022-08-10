
<div>
	<?php 
    if(isset($_GET['orderid'])){
        include_once("../class/order.php");
        include_once("../class//product.php");
        $orderid=$_GET['orderid'];
    
    ?>
    <div class="block-title mb-3"><h3><span>Chi Tiết Đơn Hàng</span></h3></div>
	
	<table class="table"style="text-align: center;">
	<thead>
    <tr>
		<th scope="col">#</th>
		<th scope="col">Tên Sản Phẩm</th>
		<th scope="col">Hình Ảnh</th>
        <th scope="col">Đơn Giá</th>
        <th scope="col">Số Lượng</th>
        <th scope="col">Tổng Phụ</th>
    </tr>
	</thead>
	<tbody>
    <?php   
        $result=order::getOrderDetail($orderid);
        $i=1;
        $amount=0;
        $total=0;
        while($row=$result->fetch_array()){
            $resultVeg=product::getByID($row[1]);
            
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
                <td><?php echo number_format($row["SubPrice"], 0, ',', '.') . '₫';//echo $row["SubPrice"] ?></td>
            </tr>
    <?php   
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
    
</div>
	