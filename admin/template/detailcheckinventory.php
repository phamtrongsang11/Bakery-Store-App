<!DOCTYPE html>

<style>
    .table{
        color: white;
        background-color: #223f5a;
       
        word-wrap: break-word;
        width: 100%;
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

    
<div>
    
	<?php 
    if(isset($_GET['checkid'])){
        include_once("class/checkinventory.php");
        include_once("class/product.php");
        $id=$_GET['checkid'];
    
    ?>
    <div class="block-title mb-3"><h3><span>Chi Tiết Phiếu Kiểm Kho</span></h3></div>
    <h5>ID Phiếu: <?php echo $id ?></h5>
	<table class="table"style="text-align: center;">
	<thead>
    <tr>
		<th scope="col" style="width: 5%">#</th>
		<th scope="col">Sản Phẩm</th>
		<th scope="col" style="width: 15%">Hình Ảnh</th>
        <th scope="col">Đơn Giá</th>
        <th scope="col">Số Lượng Tồn</th>
        <th scope="col">Số Lượng Thực</th>
        
        <th scope="col">Số Lượng Sai Lệch</th>
        <th scope="col">Giá Trị Sai Lệch</th>
        <th scope="col">Trạng Thái</th>
        
        
    </tr>
	</thead>
	<tbody>
    <?php   
        if($result = checkinventory::getDetailCheck($id)){
            $totalQty = 0;
            $totalWrongQty = 0;
            $totalValue = 0;
            $i=1;
            while($row = $result->fetch_array()){
            
            
        
            if($rowProd=product::getByID($row['ProductID'])->fetch_array()){
            
                $totalQty += $row['Qty'];
                $totalWrongQty += abs($row['WrongQty']);
                $totalValue += abs($row['SubValue']);
               
        ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $rowProd['ProductName'] ?></td>
                
                <td><img src=<?php echo "../$rowProd[Image]"?> alt="<?php echo $rowProd[2] ?>" class="img-fluid rounded"></td>
                
                <td><?php echo $row['Price'] ?></td>
                <td><?php echo $rowProd['Amount'] ?></td>
                <td><?php echo $row['Qty'] ?></td>
                
                <td><?php echo $row['WrongQty'] ?></td>
                <td><?php echo number_format($row['SubValue'], 0, ',', '.') . '₫';    //echo $price?></td>
                <td>
                    <?php 
                        echo $row['StatusQty'];
                        
                    ?>
                </td>
                
            </tr>
    <?php   
                
            }
        }
    
    ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Tổng Cộng:</td>
                <td><?php echo $totalQty?></td>
                <td><?php echo $totalWrongQty?></td>
                <td><?php echo number_format($totalValue, 0, ',', '.') . '₫';     //echo $totalPrice?></td>
                <td></td>
            </tr>
	</tbody>
    </table>
    <?php 
        }
    }
    ?>
</div>
	
