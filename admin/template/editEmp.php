<!DOCTYPE html>
<head>
    <title>JG Game Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/user.css">
    
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    
    <style>
        
        .formCate{
            display: flex;
            justify-content: center;
        }
        .formCate form{
            width: 700px;
        }

        .formCate form select{
            width: 250px;
            text-align: center;
            border-radius: 20px;
        }

        .formCate div{
            margin-top: 1rem;
            
        }
        .formCate label{
            font-size: 18px;
            margin-right: 0.5rem;
        }
        .formCate input[type="text"], .formCate input[type="number"], .formCate input[type="password"]{
            border: 0;
            outline: 0;
            border-bottom: 1px solid white;
            background-color: #2a4a67;
            width: 100%;
            color:white;
        }
        .formCate input[type="text"]:focus, .formCate input[type="number"]:focus, .formCate input[type="password"]:focus {
            outline: none;
        }
        .formCate .addBtn{
            text-align: right;
        }
        .formCate .button{
            margin-top: 0;
            margin-left: 1rem;
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
        
        fieldset.new {
            width: 100%;
            border: 2px solid white !important;
            padding: 0 1.4em 1.4em 1.4em;
            margin: 0 0 1.5em 0;
            
        }
    </style>
</head>
<body>
    <?php 
        if(isset($_GET['id'])){
            include_once("class/employee.php");
            $result=employee::getByID($_GET['id']);
            while($row=$result->fetch_array()){
                $id=$row['EmpID'];
                $name=$row['EmpName'];
                $username=$row['UserName'];
                $pass=$row['Password'];
                $email=$row['Email'];
                $phone=$row['Phone'];
                $address=$row['Address'];
                $image=$row["Image"];
                $priv=$row['PrivID'];
            }
        }
    
    ?>
    <div class="container">
    <div class="block-title mb-3"><h3><span>Nhân Viên</span></h3></div>
    <div class="formCate">
        <form action="./template/actEmp.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data" onsubmit="return formValidation();">
            <fieldset class="new">
                <legend class="w-auto">Cập Nhật Tài Khoản Nhân Viên</legend>
                <div>
                    <label for="name">Tên Nhân Viên</label>
                    <input type="text" id="name" name="name" value="<?php if(isset($name)) echo $name ?>">
                </div>
                <div>
                    <label for="username">Tên Đăng Nhập</label>
                    <input type="text" id="username" name="username" value="<?php if(isset($username)) echo $username ?>">
                </div>
                <div class="error" id="usernameErr"></div>
                <div>
                    <label for="pass">Mật Khẩu</label>
                    <input type="password" id="pass" name="pass" value="<?php if(isset($pass)) echo $pass ?>">
                </div>
                <div class="error" id="passErr"></div>
                <div>
                    <label for="passConfirm">Xác Nhận Mật Khẩu</label>
                    <input type="password" id="passConfirm" name="passConfirm" value="<?php if(isset($pass)) echo $pass ?>">
                </div>
                <div class="error" id="passConfirmErr"></div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php if(isset($email)) echo $email ?>">
                </div>
                <div>
                    <label for="phone">Số Điện Thoại</label>
                    <input type="text" id="phone" name="phone" value="<?php if(isset($phone)) echo $phone ?>">
                </div>
                <div>
                    <label for="address">Địa Chỉ</label>
                    <input type="text" id="address" name="address" value="<?php if(isset($address)) echo $address ?>">
                </div>
                <div>
                    <label for="priv">Quyền Hạn</label>
                    <select id="priv" name="priv">
                        <?php 
                            include_once("class/privilege.php");
                            $result=privilege::getAll();
                            while($row=$result->fetch_array()){
                        
                        ?>
                            <option value="<?php echo $row[0]?>" <?php if(isset($priv)&&$priv==$row[0]) echo "selected"?>>
                            <?php echo $row[1]?></option>
                        <?php
                            }
                        ?>
                    </select>
                            
                </div>
                <div style="margin-top: 2rem;">
                    <label for="images">Hình Ảnh</label>
                    <input type="file" name="images" id="images" onchange="loadFile(event)" class="hidden">
                    <label for="images" class="labelButton" style="font-size: 16px; font-weight: normal">Chọn Tệp</label>
                    <div id="divOutput">
                        <img id="output" class="img" src="<?php if(isset($image)) echo "../images/employee/$image"?>">
                    </div>
                </div>
                <div class="addBtn"><input type="submit" class="btn button" name="edit" value="Xác Nhận"></div>
            </fieldset>
        </form>

    </div>
    
    </div>
</body>
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

        var username=document.getElementById("username");
        var passwordConfirm=document.getElementById("passConfirm");
        var password=document.getElementById("pass");
        
        
        var usernameErr=document.getElementById("usernameErr");
        var passwordErr=document.getElementById("passErr");
        var passwordConfirmErr=document.getElementById("passConfirmErr");
			
			
		function formValidation(){
			//if(!nameValidation()||!userValidation()||!passValidation()||!emailValidation()||
			//!phoneValidation()||!addressValidation()||!cityValidation())
			if(!userValidation()||!passValidation()||!passConfirmValidation())
				return false;
			return true;
		}
		
		function userValidation(){

			var usercheck=/^[A-Za-z]+([A-za-z]|\d)+$/;
			var error="";
			var length=username.value.length;
			if(length==0){
				error="Hãy điền tên đăng nhập"
			}
			else if(!(length>=4&&length<=20)){
				error="Tên đăng nhập phải từ "+4+" đến "+20 + " ký tự";
			}
			else if(!username.value.match(usercheck)){
				error="Tên đăng nhập không được bắt đầu bằng ký tự đặc biệt"
			}
			
			usernameErr.innerHTML=error;
			if(error!=""){
				username.focus();
				return false;
			}

			return true;
		}

		function passValidation(){
			var error="";
			var length=password.value.length;
			if(length==0){
				error="Hãy nhập mật khẩu";
			}
			passwordErr.innerHTML=error;
			if(error!=""){
				password.focus();
				return false;
			}
			return true;
		}
		function passConfirmValidation(){
			var error="";
			var length = passwordConfirm.value.length;
			if(length==0){
				error="Hãy nhập mật khẩu";
			}
			else if(password.value != passwordConfirm.value){
				error="Sai mật khẩu";
			}
			passwordConfirmErr.innerHTML=error;
			if(error!=""){
				passwordConfirmErr.focus();
				return false;
			}
			return true;
		}



</script>