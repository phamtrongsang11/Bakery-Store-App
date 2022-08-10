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
</style>

<?php 
    include_once("class/deliverynote.php");
    include_once("class/employee.php");
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $result=deliverynote::deleteDelivery($id);
        
    }
?>

<div>
    

<div class="block-title mb-3"><h3><span>Phiếu Xuất Kho</span></h3></div>
	<table class="table"style="text-align: center;">
	<thead>
    <tr>
		<th scope="col">ID</th>
        <th scope="col">ID Đơn Hàng</th>
        <th scope="col">Nhân Viên Lập</th>
		<th scope="col">Ngày Lập</th>
		<th scope="col">Tổng Số Lượng</th>
		<th scope="col">Hành Động</th>
    </tr>
	</thead>
	<tbody>
    <?php   
        if($result=DeliveryNote::getAll()){;
        while($row=$result->fetch_array()){
        ?>
            <tr id="<?php echo $row[0] ?>">
                <td><?php echo $row[0] ?></td>
                <td>
                    <?php echo $row["OrderID"] ?>
                </td>
                <td>
                    <?php
                        $name=employee::getName($row['EmployeeID']);
                        echo $name;
                    ?>
                </td>
                <td><?php echo $row["Date"] ?></td>
                <td><?php echo $row["TotalAmount"] ?></td>
                <td>
                <div class='block'>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=deliverynote&idAct=1&deliveryid=<?php echo $row[0]?>"'>Chi Tiết</button>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=deliverynote&id=<?php echo $row[0]?>"'>Xóa</button>
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