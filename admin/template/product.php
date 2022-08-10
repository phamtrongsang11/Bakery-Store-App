<!DOCTYPE html>

<style>
    .table{
        color: white;
        background-color: #223f5a;
        display: block;
        overflow-x: auto;
        white-space: nowrap;
        
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
    .cancelbtn .deletebtn{
        float: left;
        width: 50%;
    }

    .modal {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        transform: scale(1.1);
    }
    
    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 1rem 1.5rem;
        width: fit-content;
        border-radius: 0.5rem;
    }

    .modal-container {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        padding: 16px;
    }

    .show-modal {
        display: block;
        transform: scale(1.0);
        transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
    }


    .modal-container h4 {
        color: black;
    }

    .modal-btn {
        text-align: center;
        margin-top: 10px;
    }

    div#stat1, div#stat2, div#stat3, div#stat4{
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        border: 1px solid white;
    }

    div#stat1{
        
        background-color: darkcyan;
        
    }

    div#stat2{
        
        background-color: orange;
        
    }
    div#stat3{
      
        background-color: red;
       
    }
    

</style>

<?php 
    include_once("class/product.php");
    include_once("class/category.php");
    include_once("class/producer.php");
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $row=product::checkKey($id);
        if($row[0]==0){
            $result=product::delete($_GET['id']);
        }
        else
            echo '<script type="text/JavaScript">alert("Sản Phẩm đã được có trong đơn hàng nên không thể xóa");</script>';
        
    }

?>

<div>
    <div class="block-title mb-3"><h3><span>Sản Phẩm</span></h3></div>
	<div style="margin-bottom: 10px">
    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=product&idAct=1"'>Thêm Sản Phẩm</button>
    </div>
    
	<table class="table"style="text-align: center;">
	<thead>
    <tr>
		<th scope="col" style="width:3%">ID</th>
        <th scope="col" >Hình Ảnh</th>
		<th scope="col">Tên</th>
		<th scope="col">Loai</th>
        <th scope="col">Nhà Sản Xuất</th>
        <th scope="col">Khối Lượng</th>
        <th scope="col">Phần</th>
        <th scope="col">Calo</th>
        <th scope="col">Số Lượng</th>
        <th scope="col">Giá gốc</th>
        <th scope="col">Lợi Nhuận</th>
        <th scope="col">Đơn Giá</th>
        <th scope="col">Trạng Thái</th>
        <th scope="col" style="width:5%">Hành Động</th>
    </tr>
	</thead>
	<tbody>
    <?php   
        $result=product::getAll();

        if($result){
        while($row = $result->fetch_array()){
        ?>
            <tr id='<?php echo $row["ProductID"] ?>'>
                <td><?php echo $row["ProductID"] ?></td>

                <td><img src=<?php echo "../$row[Image]"?> alt="<?php echo $row['ProductName'] ?>" 
                class="img-fluid rounded"></td>

                <td><?php echo $row["ProductName"] ?></td>
                <?php 
                    $reCate=category::getName($row["CategoryID"]);
                    if($rowCate=$reCate->fetch_array())
                ?>
                <td><?php echo $rowCate["Name"] ?></td>
                <?php 
                    if($reProd=producer::getByID($row['ProducerID'])){
                    if($rowProd=$reProd->fetch_array())
                ?>
                <td><?php echo $rowProd["ProducerName"] ?></td>
                <?php }?>
                <td><?php echo $row["Weight"] ?></td>
                <td><?php echo $row["Serving"] ?></td>
                <td><?php echo $row["Calory"] ?></td>
                <?php 
                    $amount=$row["Amount"];
                    product::updateStatus($row['ProductID'],$amount);
                
                ?>
                <td><?php echo $amount ?></td>
                <td><?php echo number_format($row["Cost"], 0, ',', '.') . '₫'; //echo $row["Cost"] ?></td>
                <td><?php echo $row["Profit"]."%" ?></td>
                <td><?php echo number_format($row["Price"], 0, ',', '.') . '₫'; //echo $row["Price"] ?></td>
                <td>
                
                <?php 
                $statid=product::getIDStatus($row['ProductID']);
                $statName=product::getNameStatus($statid);
                
                ?>

                <div id="<?php echo "stat".$statid ?>">
                    <?php echo $statName; ?>
                </div>
                </td>

                <td>
                <div class='btn-group' id="<?php echo $row[0]?>">
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=product&idAct=3&id=<?php echo $row[0]?>"'>Chi Tiết</button>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=product&idAct=2&id=<?php echo $row[0]?>"'>Sửa</button>
                    <button type='button' class='btn button' id="btnDelete">Xóa</button>
                </div>
                <div id="<?php echo "m".$row[0] ?>" class="modal">
                    <form class="modal-content" action="" style="padding: 20px">
                        <div class="modal-container">
                            <h4 style="text-align: center;">Bạn có chắc có muốn xóa sản phẩm này?</h4>
                            <div><h4 style="text-align: center;"><?php echo $row['ProductName'] ?><h4></div>
                            <div style="text-align: center;">
                                <button class="btn button ml-2" id="continue" type="button" onclick="">Từ chối</button>
                                <button class="btn button ml-2" id="delete" type="button" onclick='location.href="index.php?action=product&id=<?php echo $row[0]?>"'>Xác nhận</button>
                            </div>
                        </div>
                    </form>
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
<script>
        
        $(document).ready(function(){
            $("button#btnDelete").on("click",function(e){
                
                e.preventDefault();
                var id=$(this).parent().attr("id");
                //document.getElementById("m"+id).style.display="block";
                document.getElementById("m"+id).classList.add("show-modal");

            })

            $("div #continue").on("click",function(e){
                e.preventDefault();
                var cont=$(this).parent().parent().parent().parent().attr("id");
                document.getElementById(cont).classList.remove("show-modal");
            })
            
        })

    </script>