
<!DOCTYPE html>
<html lang="en" style="height: auto;">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
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
		.card_form h3{
			color: rgb(142, 216, 255);
		}
	</style>
	<body>
		
		<div class="wrap clearfix">
			<div class="container_form clearfix" style="margin-top: 50px;">
			<div class="user_form" style="margin-bottom: 50px;">
				<div class="card_form" style="height: auto;">
					<div class="card-header">
						<h3>ĐĂNG KÝ</h3>
					</div>
					<div class="card-body">
						<form class="form-horizontal" action="../customer/saveRegister.php" onsubmit="return formValidation();" method="post">
							<div class="row_form"> 
							<!--
							<div class="form_field">
								<input class="balloon" id="fullname" name="fullname" type="text">
								<label for="fullname">Họ và tên</label> 
								<span class="compulsory">(*)</span>
							</div>
							
							<div class="error" id="fullnameErr"></div>
							-->

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

							<div class="form_field">
								<input class="balloon" id="passwordConfirm" name="passwordConfirm" type="password">
								<label for="passwordConfirm">Xác nhận mật khẩu</label> 
								
							</div>
							<div class="error" id="passwordConfirmErr"></div>
							<!--
							<div class="form_field">
								<input class="balloon" id="email" name="email" type="text">
								<label for="email">Email</label>
								<span class="compulsory">(*)</span>
							</div>
							
							<div class="error" id="emailErr"></div>
							-->
							
							<div class="form_field">
								<input class="balloon" id="phone" name="phone" type="text">
								<label for="phone">Số điện thoại</label>
								
							</div>
							<div class="error" id="phoneErr"></div>
							<!--

							<div class="form_field">
								<input class="balloon" id="address" name="address" type="text">
								<label for="address">Địa chỉ</label>
							</div>
                            <div class="error" id="addressErr"></div>

                            <div class="form_field">
								<input class="balloon" id="city" name="city" type="text">
								<label for="city">Thành phố</label>
							</div>
                            <div class="error" id="cityErr"></div>
	-->
							<div class="float-right" style="margin-right: 20px; margin-top: 20px;">
								<input type="submit" name="register" value="Đăng ký" class="btn regis_btn">
							</div>
							
							</div>
						</form>
					</div>
				</div>
			</div>
			</div>
		</div>
	</body>
	<script>
			var fullname=document.getElementById("fullname");
			var username=document.getElementById("username");
			var passwordConfirm=document.getElementById("passwordConfirm");
			var password=document.getElementById("password");
			var address=document.getElementById("address");
            var city=document.getElementById("city");
			var email=document.getElementById("email");
			var phone=document.getElementById("phone");
			

			var fullnameErr=document.getElementById("fullnameErr");
			var usernameErr=document.getElementById("usernameErr");
			var passwordErr=document.getElementById("passwordErr");
			var passwordConfirmErr=document.getElementById("passwordConfirmErr");
			var addressErr=document.getElementById("addressErr");
            var cityErr=document.getElementById("cityErr");
			var emailErr=document.getElementById("emailErr");
			var phoneErr=document.getElementById("phoneErr");
				
			
		
		function formValidation(){
			//if(!nameValidation()||!userValidation()||!passValidation()||!emailValidation()||
			//!phoneValidation()||!addressValidation()||!cityValidation())
			if(!userValidation()||!passValidation()||!passConfirmValidation()||!phoneValidation())
				return false;
			return true;
		}
		
		function nameValidation(){
			var letters=/^[A-Za-z]+$/;
			var error="";
			if(fullname.value.length==0){
				error="Please enter your's name";
			}
			else if(!fullname.value.match(letters)){
				error="Your's name should be letters";
			}
			fullnameErr.innerHTML=error;
			if(error!=""){
				fullname.focus();
				return false;
			}
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

		function emailValidation(){

			var error="";
			var emailcheck=/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
			
			if(email.value.length==0){
				error="Please enter your email";
			}
			else if(!email.value.match(emailcheck)){
				error="Your email is invalid";
			}
			emailErr.innerHTML=error;
			if(error!=""){
				emailErr.focus();
				return false;
			}
			return true;
		}
		function phoneValidation(){
			var error="";
			var phonecheck=/^0[3,5,7,9](\d{8}|\d{9})/;

			if(phone.value.length==0){
				error="Xn hãy nhập số điện thoại";
			}
			else if(!phone.value.match(phonecheck)){
				error="Số điện thoại không hợp lệ";
			}
			phoneErr.innerHTML=error;
			if(error!=""){
				phone.focus();
				return false;
			}
			return true;
		}

        function addressValidation(){
			var error="";
			var length=address.value.length;
			if(length==0){
				error="Please enter your's address";
			}
			addressErr.innerHTML=error;
			if(error!=""){
				address.focus();
				return false;
			}
			return true;
		}
		
        function cityValidation(){
			var error="";
			var length=city.value.length;
			if(length==0){
				error="Please enter your's city";
			}
			cityErr.innerHTML=error;
			if(error!=""){
				city.focus();
				return false;
			}
			return true;
		}

		
	</script>
</html>