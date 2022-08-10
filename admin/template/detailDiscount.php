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
    .labelButton{
        text-decoration: none;
        background-color: #0075d9;
        border: 1px solid white;
        padding: 2px;
        font-size: 16px;
        color: white;
    }
    .labelButton:hover{
        background-color: #005b88;
    }
    .img{
        max-width: 100%;
        height: 200px;
    }
    .hidden{
        display: none;
    }
    #divOutput{
        display: none;
    }
</style>

<?php 
    include_once("class/product.php");
    include_once("class/discount.php");
    if(isset($_GET['id'])&&isset($_GET['idproduct'])&&isset($_GET['act'])&&$_GET['act']=="delete"){
        $result=discount::deleteDetail($_GET['id'],$_GET['idproduct']);
    }
    /*
    else if(isset($_GET['id'])&&isset($_GET['act'])&&$_GET['act']=="add"){
        $id=$_GET['id'];
        $idproduct=$_GET['idproduct'];
        $per=$_GET['percent'];
        $result=discount::insertDetail($id,$idproduct,$per);
    }
    */

    if(isset($_GET['id'])){
        $id=$_GET['id'];
?>
<div>
    <div class="block-title mb-3"><h3><span>Chi Tiết Khuyến Mãi</span></h3></div>

    <div class="formCate">
        <form action="index.php?action=discount&act=add&idAct=4&discountid=<?php echo $id?>" method="post">
            
            <input type="submit" class="btn button" name="add" value="Thêm Sản Phẩm">
        </form>
    </div>

	<table class="table"style="text-align: center; margin-top: 10px;">
	<thead>
    <tr>
		<th scope="col" style="width:5%">#</th>
        <th scope="col">ID</th>
        <th scope="col" style="width:15%">Hình Ảnh</th>
        <th scope="col">Tên Sản Phẩm</th>
        <th scope="col">Phần Trăm Khuyến Mãi</th>
        <th scope="col">Hành Động</th>
    </tr>
	</thead>
	<tbody>
    <?php   
        $i=0;
        if($result=discount::getDetail($id)){
            
        while($row=$result->fetch_array()){
            $i++;
        ?>
            <tr id='<?php echo $row['DiscountID'] ?>'>
                <td><?php echo $i ?></td>
                <td><?php echo $row['DiscountID'] ?></td>
                <?php 
                    if($reProd=product::getByID($row['ProductID'])){
                        $rowProd=$reProd->fetch_array();
                
                ?>
                <td><img src=<?php echo "../$rowProd[Image]"?> alt="<?php echo $row['ProductName'] ?>" 
                class="img-fluid rounded"></td>

                <td><?php echo $rowProd['ProductName'] ?></td>
                <?php 
                    }
                ?>
                
                <td><?php echo $row['Percent'] ?></td>
                
                <td>
                <div class='btn-group'>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=discount&idAct=3&act=delete&id=<?php echo $row[0]?>&idproduct=<?php echo $row[1]?>"'>
                    Xóa</button>
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
<?php 
    }
?>
