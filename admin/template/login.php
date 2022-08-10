<!DOCTYPE html>
<html lang="en" style="height: auto;">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/user.css">
		<link rel="stylesheet" type="text/css" href="../css/register.css">

	</head>
	<style>
		.card_form{
			margin-top: auto;
			margin-bottom: auto;
			width: 400px;
			background-color: #223f5a;
			position: relative;
			display: flex;
			flex-flow: column wrap;
			min-width: 0;
			background-clip: border-box;
			width: auto;
		}
	</style>
	<body>
		
		<div class="wrap clearfix">
			<div class="container_form clearfix" style="margin-top: 50px;">
			<div class="user_form" style="margin-bottom: 50px;">
				<div class="card_form" style="height: auto;">
					<div class="card-header">
						<h3>ĐĂNG NHẬP QUẢN LÝ HỆ THỐNG</h3>
					</div>
					<div class="card-body">
						<form class="form-horizontal" action="checkLogin.php" onsubmit="return formValidation();" method="post">
							<div class="row_form"> 

							<div class="form_field">
								<input class="balloon" id="username" name="username" type="text">
								<label for="username">Tên đăng nhập</label>
							</div>
							<div class="error" id="usernameErr"></div>

							<div class="form_field">
								<input class="balloon" id="password" name="password" type="password">
								<label for="password">Mật khẩu</label> 
							</div>
							<div class="error" id="passwordErr"></div>


							<div class="float-right" style="margin-right: 20px; margin-top: 20px;">
								<input type="submit" value="Đăng Nhập" name="lohin" class="btn regis_btn">
							</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			</div>
		</div>
	</body>
	<?php if(isset($_GET['login'])&&$_GET['login']=="false")
			echo "<script>alert('Nhập sai passowrd hoặc Không tìm thấy tài khoản')</script>";
	?>
	<script>
			var username=document.getElementById("username");
			var password=document.getElementById("password");

			var usernameErr=document.getElementById("usernameErr");
			var passwordErr=document.getElementById("passwordErr");	
			
		
		function formValidation(){
			if(!userValidation()||!passValidation())
				return false;
			return true;
		}
		
		function userValidation(){

			var usercheck=/^[A-Za-z]+([A-za-z]|\d)+$/;
			var error="";
			var length=username.value.length;
			if(length==0){
				error="Please enter your user name"
			}
			else if(!(length>=4&&length<=20)){
				error="User names length should be between "+4+" to "+20;
			}
			else if(!username.value.match(usercheck)){
				error="User name must begin with letters and not using special characters"
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
				error="Please enter your password";
			}
			passwordErr.innerHTML=error;
			if(error!=""){
				password.focus();
				return false;
			}

			return true;

		}
