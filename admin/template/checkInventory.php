<!DOCTYPE html>

<style>
    .table{
        color: white;
        background-color: #223f5a;
        
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
    include_once("class/checkinventory.php");
    include_once("class/employee.php");
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $result = checkinventory::deleteCheck($id);

    }
?>

<div>
    

<div class="block-title mb-3"><h3><span>Phiếu Kiểm Kho</span></h3></div>
<div style="margin-bottom: 10px">
        <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=checkinventory&idAct=2"'>Lập Phiếu Kiểm Kho</button>
    </div>
	<table class="table"style="text-align: center;">
	<thead>
    <tr>
		<th scope="col" style="width: 4%">ID</th>
        <th scope="col">Nhân Viên Lập</th>
		<th scope="col">Ngày Lập</th>
		<th scope="col">Tổng Số Lượng</th>
        <th scope="col">Tổng Số Lượng Sai</th>
		<th scope="col">Tổng Giá Trị Sai</th>
        <th scope="col">Trạng Thái</th>
        <th scope="col">Hành Động</th>
    </tr>
	</thead>
	<tbody>
    <?php   
        if($result = checkinventory::getAllCheck()){;
        while($row = $result->fetch_array()){
        ?>
            <tr id="<?php echo $row[0] ?>">
                <td><?php echo $row[0] ?></td>
                <td><?php echo $row["EmpName"] ?></td>
                <td><?php echo $row["Date"] ?></td>
                <td><?php echo $row["TotalQty"] ?></td>
                <td><?php echo $row["TotalWrongQty"] ?></td>
                <td><?php echo number_format($row["TotalValue"], 0, ',', '.') . '₫'; ?></td>
                <td>
                    <?php 
                        if($row["Status"] == 0)
                            echo "Chưa Bù Trừ";
                        else    
                            echo "Đã Bù Trừ";
                            
                    ?>
                </td>
                <td>

                <div class='btn-group'>
                    <?php 
                        if($row["Status"] == 0){

                    ?>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=checkinventory&idAct=3&checkid=<?php echo $row[0]?>&updateqty=true"'>Bù Trừ</button>

                    <?php 
                        }
                    ?>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=checkinventory&idAct=1&checkid=<?php echo $row[0]?>"'>Chi Tiết</button>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=checkinventory&id=<?php echo $row[0]?>"'>Xóa</button>
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