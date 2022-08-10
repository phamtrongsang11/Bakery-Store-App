<style>
    .blockUser form{
        width: 100%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .blockImages{
        width: 40%;
        height: auto;
        text-align: center;
    }
    .blockImages img{
        border-radius: 25px;
        border: 1px solid white;
        max-width: 100%;
        height: auto;
    }
    
    .blockInfo{
        width: 80%;
        padding: 20px;
        display:flex;
        flex-direction: row;
        background-color: #325575;
        align-items: center;
        justify-content: center;
        
    }
    .itemInfo{
        display:flex;
        flex-direction: column;
        
    }
    
    .divInfo div{
        display:flex;
        flex-direction: column;
    }
    div .right{
        text-align: right;
    }
    .blockInfo label{
        margin-top: 1rem;
        margin-bottom: 0.5rem;
        font-size: 18px;
    }
    
    
    input{
        height: auto;
        padding: 7px 20px 8px;
        border: 3px solid transparent;
        border-radius: 4px;
        box-shadow: 0 3px 6px 0 rgba(0,0,0,.08);
        background-color: #c5e4ff;
        color: #001e53;
        font-size: 16px;
        font-weight: 500;
        transition: border-color .3s ease;
        width: 90%;
    }
    form input[type="submit"]{
        background-color: #0075d9;
        color: white;
        border: none;
        text-decoration: none;
        font-size: 16px;
        padding: 15px;
        margin-top: 1.5rem
        
    }
    form input[type="submit"]:hover{
        background-color: #005b88;
    }
    .labelButton{
        color: white;
        text-decoration: none;
        border: 2px solid #0075d9;
        padding: 10px;
        margin-top: 0.75rem;
        font-size: 16px;

    }
    .labelButton:hover{
        background-color: #0075d9;
    }
    .hidden{
        display: none;
    }
    .item-left a.link-left{
        font-size: 16px;
        color: white;
    }
    .item-left a.link-left:hover{
        color: #0075d9;
        text-decoration: none;
    }
    .block-content{
        display: flex;
        flex-direction: column;
        border-radius: 3px;
        background-image: linear-gradient(180deg,#223f5a,#17314a);
        overflow: hidden;
    }

</style>

<?php
    if(isset($_POST['update'])&&isset($_SESSION['CusID'])){
        include_once('../class/customer.php');
        $id=$_SESSION['CusID'];
        $username=$_POST['username'];
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $city=$_POST['city'];

        $filename=$_FILES["images"]["name"];
        $tempname=$_FILES["images"]["tmp_name"];

        $folder="/dashboard/bakery/images/customer/$filename";
        if($filename!=""){
            if (!move_uploaded_file($tempname, $_SERVER['DOCUMENT_ROOT'].$folder)){
                echo "Failed to upload image";
            }
            customer::update($username,$fullname,$email,$phone,$address,$city,$filename,$id);
        }
        else
            customer::updateWithoutImg($username,$fullname,$email,$phone,$address,$city,$id);
        
        
    }


?>


<div class="container clearfix">
<div class="block-title mb-3"><h3><span>Thông Tin Tài Khoản</span></h3></div>
    <div class='leftcolumn'>
        <div class="block-content">
                <div class='item-left'>
                    <a href="index.php?id=2&position=top" class="link-left">Lịch Sử Đơn Hàng</a>
                </div>
                <div class='item-left'>
                    <a href="index.php?id=2&position=top" class="link-left">Đổi Mật Khẩu</a>
                </div>
            
        </div>
    </div>
    <div class='rightcolumn'>
        <?php
            include_once("../class/customer.php");
            if(isset($_SESSION['CusID'])){
            $result=customer::getByID($_SESSION['CusID']);
            
            if($result->num_rows!=0){
        ?>
        <div class="blockUser">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
            <?php
                if($row=$result->fetch_array()){
            ?>
            <div class="blockImages">
                <img src="../images/customer/<?php echo $row['Image']?>" id="output">
                
                <input type="file" name="images" id="images" onchange="loadFile(event)" class="hidden">
                <label for="images" class="labelButton" style="font-size: 16px; font-weight: normal">Thay Đổi Ảnh Đại Diện</label>
            </div>
            <div class="blockInfo">
                <div class="itemInfo">
                    <div>
                        <label for="fullname">Tên</label>
                        <input id="fullname" name="fullname" type="text" value="<?php echo $row['Fullname']?>">
                    </div>
                    <div class="error" id="fullnameErr"></div>

                    <div>
                        <label for="email">Email</label>
                        <input id="email" name="email" type="text" value="<?php echo $row['Email']?>">
                    </div>
                    <div class="error" id="emailErr"></div>

                    <div>
                        <label for="address">Địa Chỉ</label>
                        <input id="address" name="address" type="text" value="<?php echo $row['Address']?>">
                    </div>
                    <div class="error" id="addressErr"></div>

                </div>
                
                <div class="itemInfo">
                    <div>
                        <label for="username">Tên Đăng Nhập</label>
                        <input id="username" name="username" type="text" value="<?php echo $row['UserName']?>">
                    </div>
                    <div class="error" id="usernameErr"></div>
                    
                    <div>
                        <label for="phone">SĐT</label>
                        <input id="phone" name="phone" type="text" value="<?php echo $row['Phone']?>">
                    </div>
                    <div class="error" id="phoneErr"></div>

                    <div>
                        <label for="city">Thành Phố</label>
                        <input id="city" name="city" type="text" value="<?php echo $row['City']?>">
                    </div>
                    <div class="error" id="cityErr"></div>
                </div>

                <div class="itemInfo">

                    
                </div>
                

                    
                <?php 
                    }
                ?>
                
            </div>
            <div class="right" style="display: block">
                    <input type="submit"  name="update" value="Cập Nhật">
                </div>
            </form>
        </div>
        <?php
            }
        }
        ?>
    </div>
</div>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src);
        }
    };

</script>