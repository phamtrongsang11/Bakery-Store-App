<style>
.jumbotron{
		margin-bottom: 0;
		color: white;
		background-image: url("../images/jumbo_bakery.jpg");
		background-position: bottom;
		background-repeat: no-repeat;
		background-size: cover;	
		position: relative;
}
.user{
	position: absolute;
	right: 0;
	top:10px;
	margin-right: 20px;
	text-align: center;
}
a.username{
	text-decoration: none;
	color: rgb(221, 37, 245);
	font-weight: bold;
}

a.username:hover{
	color: rgb(164, 0, 186);
}


</style>

<div class="jumbotron">

		<?php
		/*
			include_once("../class/customer.php");
			if(isset($_SESSION['CusID'])){
				$result=customer::getByID($_SESSION['CusID']);
				$row=$result->fetch_array();
				$name=$row['Fullname'];
		?>
		<div class="user"> 
				<div>Welcome to the JG Shop</div>
				<span><a class="username"><?php echo $name ?></a></span>
				
		</div>
		<?php		
			}
*/
		?>

	
	<div class="text-center">
		<h1>MUN BAKERY</h1>
	</div>
</div>