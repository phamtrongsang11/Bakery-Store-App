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
    include_once("class/product.php");
    if(isset($_GET['id'])){
        $result=producer::delete($_GET['id']);
    }

?>

<div>
    <div class="block-title mb-3"><h3><span>Hạn Sử Dụng</span></h3></div>
	<div style="margin-bottom: 10px">
    </div>
	<table class="table"style="text-align: center;">
	<thead>
    <tr>
		<th scope="col" style="width:5%">ID</th>
		<th scope="col">Tên Sản Phẩm</th>
		<th scope="col">Hạn Sử Dụng</th>
        <th scope="col">Số Ngày Còn Lại</th>
        <th scope="col">Số Lượng Còn Lại</th>
    </tr>
	</thead>
	<tbody>
    <?php   
        $result=product::getExpirationDatAll();
        if($result){
        while($row=$result->fetch_array()){
        ?>
            <tr id='<?php echo $row['ReceiveID'] ?>'>
                <td><?php echo $row['ProductID'] ?></td>
                <td><?php echo $row["ProductName"] ?></td>

                <td><?php echo $row["ExpirationDate"] ?></td>
                <?php 
                    $d1 = new DateTime($row["ExpirationDate"]);
                    $d2 = new DateTime();
                    $diff = $d1->diff($d2)->format("%a");
                    $remain = intval($diff);
                ?>
                <td><?php echo $remain ?></td>
                <td><?php echo product::getAmount($row["ProductID"]) ?></td>

                
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
