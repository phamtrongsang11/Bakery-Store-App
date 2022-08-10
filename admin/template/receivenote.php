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
    include_once("class/ReceiveNote.php");
    include_once("class/employee.php");
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $result=ReceiveNote::deleteReceive($id);

    }
?>

<div>
    

<div class="block-title mb-3"><h3><span>Phiếu Nhập Kho</span></h3></div>
<div style="margin-bottom: 10px">
        <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=receivenote&idAct=2"'>Lập Phiếu Nhập</button>
    </div>
	<table class="table"style="text-align: center;">
	<thead>
    <tr>
		<th scope="col">ID</th>
        <th scope="col">Nhân Viên Lập</th>
		<th scope="col">Ngày Lập</th>
		<th scope="col">Tổng Số Lượng</th>
        <th scope="col">Tổng Tiền</th>
		<th scope="col">Hành Động</th>
    </tr>
	</thead>
	<tbody>
    <?php   
        if($result=ReceiveNote::getAll()){;
        while($row=$result->fetch_array()){
        ?>
            <tr id="<?php echo $row[0] ?>">
                <td><?php echo $row[0] ?></td>
                <td>
                    <?php
                        $name=employee::getName($row['EmployeeID']);
                        echo $name;
                    ?>
                </td>
                <td><?php echo $row["Date"] ?></td>
                <td><?php echo $row["TotalAmount"] ?></td>
                <td><?php echo number_format($row["TotalCost"], 0, ',', '.') . '₫'; //echo $row["TotalCost"] ?></td>
                <td>
                <div class='block'>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=receivenote&idAct=1&receiveid=<?php echo $row[0]?>"'>Chi Tiết</button>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=receivenote&id=<?php echo $row[0]?>"'>Xóa</button>
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