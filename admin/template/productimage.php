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
        padding: 0.375rem 0.75rem;
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
    if(isset($_GET['id'])&&isset($_GET['idimg'])&&isset($_GET['act'])&&$_GET['act']=="delete"){
        $result=product::deleteImg($_GET['idimg'],$_GET['id']);
    }
    else if(isset($_GET['id'])&&isset($_GET['act'])&&$_GET['act']=="add"){
        $id=$_GET['id'];
        $filename=$_FILES["images"]["name"];
        $tempname=$_FILES["images"]["tmp_name"];
        $folder="/dashboard/bakery/images/detail/$filename";
        
        $maxsize=16777216;
        $allowtypes=array('jpg','png');
        $filetype=pathinfo($folder,PATHINFO_EXTENSION);
        $allow=1;
        if (!in_array($filetype,$allowtypes))
        {
            echo "your's type file must be jpg, png";
            $allow=0;
        }

        if($_FILES["images"]["size"]>=$maxsize){
            echo "can't upload file larger than 2mb";
            $allow=0;
        }

        $fname="";
        if($allow==1){
            if (!move_uploaded_file($tempname, $_SERVER['DOCUMENT_ROOT'].$folder)){
                echo "Failed to upload image";
            }
            else{
                $fname=$filename;
                $result=product::addImg($id,$fname);
            }
        }
        
    }


    if(isset($_GET['id'])){
        $id=$_GET['id'];
        if($result=product::getByID($id))
            if($row=$result->fetch_array())
                $proname=$row['ProductName']
                
?>
<div>
    <div class="block-title mb-3"><h3><span><?php if(isset($proname)) echo $proname ?></span></h3></div>
    
	<div style="margin-bottom: 10px">
    <div class="formCate">
        <form action="index.php?action=product&idAct=3&act=add&id=<?php echo $id?>" method="post" enctype="multipart/form-data">
            <div style="margin-top: 2rem;">
                <label for="images">Hình Ảnh: </label>
                <input type="file" name="images" id="images" onchange="loadFile(event)" class="hidden">
                <label for="images" class="labelButton" style="font-size: 16px; font-weight: normal">Chọn Tệp</label>
                <div id="divOutput">
                    <img id="output" class="img">
                </div>
            </div>
            <input style="margin-top: 2rem;" type="submit" class="btn button" name="add" value="Thêm">
        </form>
    </div>
	<table class="table"style="text-align: center; margin-top: 2rem;">
	<thead>
    <tr>
		<th scope="col" style="width:5%">#</th>
        <th scope="col">ID Sản Phẩm</th>
        <th scope="col" style="width:20%" >Hình Ảnh</th>
        <th scope="col">Hành Động</th>
    </tr>
	</thead>
	<tbody>
    <?php   
        if($result=product::getAllImg($id)){
            $i=0;
        while($row=$result->fetch_array()){
        ?>
            <tr id='<?php echo $row['ProductID'] ?>'>
                <td><?php echo $i++ ?></td>
                <td><?php echo $row['ProductID'] ?></td>

                <td><img src=<?php echo "../images/detail/$row[Image]"?> alt="<?php echo $row[1] ?>" 
                class="img-fluid rounded"></td>
                <td>
                <div class='btn-group'>
                    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=product&idAct=3&act=delete&id=<?php echo $row[1]?>&idimg=<?php echo $row[0]?>"'>
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
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        document.getElementById('divOutput').style.display="block";
        output.style.height='200px';
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src);
        }
    };



</script>