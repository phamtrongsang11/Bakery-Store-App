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
    include_once("class/employee.php");
    include_once("class/privilege.php");
    if(isset($_GET['id'])){
        $result=employee::delete($_GET['id']);
    }

?>

<div>
    <div class="block-title mb-3"><h3><span>Nhân Viên</span></h3></div>
	<div style="margin-bottom: 10px">
    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=employee&idAct=1"'>Thêm Tài Khoản Nhân Viên</button>
    </div>
	<table class="table" style="text-align: center;">
	<thead>
    <tr>
		<th scope="col" style="width:4%">ID</th>
        <th scope="col">Hình Ảnh</th>
		<th scope="col">Tên</th>
        <th scope="col">Tên Đăng Nhập</th>
		<th scope="col">Email</th>
        <th scope="col">SĐT</th>
        <th scope="col">Địa Chỉ</th>
        <th scope="col">Quyền Hạn</th>
        <th scope="col">Hành Động</th>
    </tr>
	</thead>
	<tbody>
    <?php   
        $result=employee::getAll();
        if($result){
        while($row=$result->fetch_array()){
        ?>
            <tr id='<?php echo $row['EmpID'] ?>'>
                <td><?php echo $row['EmpID'] ?></td>
                <td><img src=<?php echo "../images/employee/$row[Image]"?> alt="<?php echo $row['EmpName'] ?>" 
                class="img-fluid rounded"></td>
                <td><?php echo $row["EmpName"] ?></td>
                <td><?php echo $row["UserName"] ?></td>
                <td><?php echo $row["Email"] ?></td>
                <td><?php echo $row["Phone"] ?></td>
                <td><?php echo $row["Address"] ?></td>
                <?php 
                    if($name=privilege::getNameNew($row['PrivID'])){
                        
                ?>
                <td><?php echo $name ?></td>
                <?php }
                
                ?>
                <td>
                <div class='btn-group'>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=employee&idAct=2&id=<?php echo $row[0]?>"'>Sửa</button>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=employee&id=<?php echo $row[0]?>"'>Xóa</button>
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
