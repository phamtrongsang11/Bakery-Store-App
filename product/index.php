<html>
<?php
	session_start();
?>
	<head>
		<title>Market</title>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, width=device-width">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/user.css">
		<link rel="stylesheet" type="text/css" href="../css/cart.css">

		<script src="../js/jquery-3.5.1.min.js"></script>
		<script src="../js/popper.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>


		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  
		

		<style>
		body{
			font-family: "Poppins",‘Sans-Serif’;
		}
		.shop_item{
			position: relative;
		}
		.div_right{
			position: absolute;
			text-align: right;
			right: 10px;
			border: 2px solid #0075d9;
			padding: 8px 24px 6px;
    		border-radius: 3px;
		}
		.div_right a{
			color: white;
			list-style: none;
		}
		.div_right:hover{
			background-color: #0075d9;
		}
		div.container-fluid{
			width: 90%;
		}
		</style>
	</head>

	<body>
		<div class="wrap clearfix">

			<?php include_once("header.php")?>

			<div>
				<?php include_once("menu.php")?>
			</div>
			
			<div class="container-fluid clearfix">
			<?php

				if(isset($_GET['position'])&&$_GET['position']=='top'){
					$id=$_GET['id'];
					switch($id){
						case 1:
							include_once("../cart/index.php");
							break;
						case 2:
							include_once("../cart/history.php");
							break;
						case 3:
							include_once("../customer/logout.php");
							break;
                        case 4:
                            include_once("../customer/login.php");
                            break;
                        case 5:
                            include_once("../customer/register.php");
                            break;
						case 7:
							include_once("../product/infoCustomer.php");
                            break;
						case 6:
							include_once("../product/browser.php");
							break;

					}
				}

				else if(isset($_GET['action'])&&$_GET['action']=='saveorder'){
					
					include_once("../cart/saveorder.php");

				}
				else if(isset($_GET['action'])&&$_GET['action']=='payment'){
					
					include_once("../cart/payment.php");

				}
				else if(isset($_GET['action'])&&$_GET['action']=='orderdetail'){
					include_once("../cart/detail.php");

				}
				else if(isset($_GET['action'])&&$_GET['action']=='summary'){
					include_once("summary.php");

				}
				else if(isset($_GET['action'])&&$_GET['action']=='detail'&&isset($_GET['id'])){
					$id=$_GET['id'];
					include_once("detail.php");

				}
                else{
				
					include_once('carousel.php');
					include_once('category.php');
					include_once('carousel_multiple_item_card.php');
					
					//include_once('leftmenu.php');
				?>
					
				<div class="block-title">
					<h3><span>Bánh Mới Nhất</span></h3>
				</div>
				<div class="shop_item" id="target-content">


					<?php include_once('product.php'); ?>
				</div>
					
				<?php } ?>
				
				
			</div>
			
		</div>
		
		<footer class="footer">
			<?php include_once("footer.php")?>
		</footer>
		<?php 
			if(isset($_GET['action'])&&$_GET['action']=='ordersucessfull'){
				echo "<script>alert('You have made a successful order')</script>";
			}
		
		?>
	</body>
</html>