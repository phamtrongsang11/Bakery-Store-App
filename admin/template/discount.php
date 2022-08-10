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
    include_once("class/discount.php");
    if(isset($_GET['id'])){
        $result=discount::delete($_GET['id']);
    }

?>

<div>
    <div class="block-title mb-3"><h3><span>Chương Trình Khuyến Mãi</span></h3></div>
	<div style="margin-bottom: 10px">
    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=discount&idAct=1"'>Thêm Chương Trình</button>
    </div>
	<table class="table"style="text-align: center;">
	<thead>
    <tr>
		<th scope="col" style="width:5%">ID</th>
        <th scope="col">Hình Ảnh</th>
		<th scope="col">Tên Chương Trình</th>
        <th scope="col">Ngày Bắt Đầu</th>
		<th scope="col">Ngày Kết Thúc</th>
        <th scope="col">Hành Động</th>
    </tr>
	</thead>
	<tbody>
    <?php   
        $result=discount::getAll();
        if($result){
        while($row=$result->fetch_array()){
        ?>
            <tr id='<?php echo $row['DiscountID'] ?>'>
                <td><?php echo $row['DiscountID'] ?></td>
                <td><img src=<?php echo "../images/discount/$row[Image]"?> alt="<?php echo $row['DiscountName'] ?>" 
                class="img-fluid rounded"></td>
                <td><?php echo $row["DiscountName"] ?></td>
                <td><?php echo $row["DateFrom"] ?></td>
                <td><?php echo $row["DateTo"] ?></td>
                <td>
                <div class='btn-group'>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=discount&idAct=3&id=<?php echo $row[0]?>"'>Chi Tiết</button>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=discount&idAct=2&id=<?php echo $row[0]?>"'>Sửa</button>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=discount&id=<?php echo $row[0]?>"'>Xóa</button>
                </div>
                </td>
            </tr>
    <?php   
        }
    
    ?>
	</tbody>
    </table>
    <?php 
        }
    ?>
</div>
