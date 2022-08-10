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
    include_once("class/customer.php");
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
    <div class="block-title mb-3"><h3><span>Thành Viên</span></h3></div>
	<table class="table"style="text-align: center;">
	<thead>
    <tr>
		<th scope="col" style="width:4%">ID</th>
        <th scope="col">Hình Ảnh</th>
		<th scope="col">Tên Đăng Nhập</th>
        <th scope="col">Họ Tên</th>
        <th scope="col">Email</th>
        <th scope="col">SĐT</th>
        <th scope="col">Địa Chỉ</th>
        <th scope="col">Thành Phố</th>
        <!--<th scope="col" style="width:8%">Trạng Thái</th>-->
        <th scope="col">Hành Động</th>
    </tr>
	</thead>
	<tbody>
    <?php   
        $result=customer::getAll();
        if($result){
        while($row=$result->fetch_array()){
        ?>
            <tr id='<?php echo $row['CustomerID'] ?>'>
                <td><?php echo $row['CustomerID'] ?></td>
                <td><img src=<?php echo "../Images/Customer/$row[Image]"?> alt="<?php echo $row['Fullname'] ?>" 
                class="img-fluid rounded"></td>
                <td><?php echo $row["UserName"] ?></td>
                <td><?php echo $row["Fullname"] ?></td>
                <td><?php echo $row["Email"] ?></td>
                <td><?php echo $row["Phone"] ?></td>
                <td><?php echo $row["Address"] ?></td>
                <td><?php echo $row["City"] ?></td>
                <!--<td><?php //echo $row["Status"] ?></td>-->
                <td>
                <div class='btn-group'>
                    <?php 
                        if($row['Status']==1){
                    ?>

                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=customer&idAct=1&id=<?php echo $row[0]?>"'>Khóa</button>
                    <?php 
                        }
                        else{
                    ?>
                    
                     <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=customer&idAct=2&id=<?php echo $row[0]?>"'>Mở Khóa</button>
                    <?php 
                        }
                    ?>
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
