<style>
		.carousel-inner{
			width: 100%;
			height: 85%;
		}

		.carousel-inner img{
			width: 100%;
			height: 100%;
		}


		.carousel{
			width: 70%;
			margin: 0;
		}

		.carousel-indicators{
			position: none;
			margin-top: 15px;
			

		}

		.carousel-indicators li{
			
			width: 128px;
			height: 96px;
			border-radius: 3px;
			position: relative;
			border: 2px solid white;
			background-color: transparent;
		}
		
		.carousel-indicators li.active{
			border: 2px solid rgba(117,208,199);
		}
		
		.carousel-indicators li:hover{
			
			background-color: white;
		}
		
		.carousel-indicators img{
			position: absolute;
			height: 100%;
			width: 100%;
			top: 0;
			left: 0;
		}

		.item-head{
			display: flex;
			flex-direction: row;
			flex-wrap: nowrap;
			
		}

		.item-head-left{
			display: flex;
			flex-direction: column;
			flex-wrap: nowrap;
			width: 65%;
			
		}

		.item-head-left div.carousel{
			width: 100%;
			background-color: #223f5a;
			padding: 20px;
			border-radius: 3px;
			background-image: linear-gradient(180deg,#223f5a,#17314a);
			height: 65%;
		}

		.item-detail{
			
			background-color: #223f5a;
			width: 100%;
			margin-bottom: 30px;
			padding: 20px;
			border-radius: 3px;
			background-image: linear-gradient(180deg,#223f5a,#17314a);
		}
		.img .item-detail{
			width: fit-content;
			height: fit-content;	
		}
		
		.item-right{
			width: 33%;
			height: auto;
			margin-left: 2%;
		}
		

		.item-img{
			width: fit-content;
			height: fit-content;
		}
		
		.item-img img{
			width: 100%;
			height: 100%;
		}
		
		.item-infomation{
			font-weight: 15px;
			color: white;
			
		}

		.item-infomation a{
			background-color: #0075d9;
			padding: 0 .4em;
			color: white;
			font-weight: bold;
		}
	
		.item-detail .btn{
			color: white;
			font-weight: bold;
			border-radius: 50px;
			padding: 17px 46px 15px;
			box-shadow: 0 3px 6px 0 rgb(0 0 0 / 8%);
			background-color: #0075d9;
			margin-top: 20px;
		
		}

		.btn_cart button:hover{
			background-color: rgb(0,90,186);
		}

		.description{
			white-space: pre-line;
			color: rgb(199,207,215);
			font-size: 18px;
			line-height: 36px;
			
		}
		
		.required{
			display: flex;
			flex-direction: row;
			
			font-size: 18px;
			color: white;
		}
		
		.required p{
			font-weight: bold;
			margin: 5px 0 0 0;
			line-height: 30px;
		}
		
		.required span{
			background-color: rgba(106,120,133);
			padding: 0 .4em;
			color: white;
			font-weight: bold;
		}
		
		.item-bottom{
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			width: 100%;

			height: auto;
			margin-right: 16px;
			border-radius: 3px;
			box-shadow: 0 3px 6px 0 rgb(0 0 0 / 16%);
			background-color: rgb(50,85,117);
			padding: 25px;
			overflow: hidden;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			transition: background-color .3s ease;
		}
		
		.item-bottom-detail{
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			width: 32%;
			padding: 20px;
		}

		.item-bottom-detail-img{
			width: 100%;
			height: 60%;
		}
		
		.item-bottom-detail-img img{
			width: 100%;
			height: 100%;
		}
		
		.title a h4, .title a h5{
			color: white;
		}
		
		.title a:hover{
			text-decoration: none;
		}
		
		.containerr{
			display: flex;
			flex-direction: column;
			flex-wrap: wrap;
			padding: 16px;
		}
		.product-cart{
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			width: 80%;
			height: 100%;
			border-bottom: 1px solid rgba(117,208,199);
			border-top: 1px solid rgba(117,208,199);
			margin-left: 10%;
		}
		.product-cart img{
			width: 50%;
			height: 100%;
			padding-top: 10px;
			padding-bottom: 10px;
		}
		.product-title{
			width: 50%;
			height: 100%;
			font-weight: bold;
			padding-left: 3%;
			padding-top: 10px;
			padding-bottom: 10px;
		}
		.cancelbtn .deletebtn{
			float: left;
			width: 50%;
		}
		.card .carousel-inner .carousel-item {
			transition: -webkit-transform 0s ease;
			transition: transform 0s ease;
			transition: transform 0 ease, -webkit-transform 0 ease;
		}



		.header{
			border-bottom: 2px solid rgba(128,132,144,1);
			color: white;
			margin-top: 7.5%;
			margin-bottom: 12%;
			margin: 2.5% 0 2% 0;
		}
		
		.center{
				text-align: center;
		}
		.block-title.product_name span{
			text-shadow: 0 2px 5px rgb(0 0 0 / 30%);
			font-size: 40px;
		}
		.info-row {
			display: flex;
			align-items: flex-start;
			border-bottom: 1px solid #2a4a67;
		}

		.info-row .original_price{
			padding: 17px 0 13px;
			overflow: hidden;
			display: flex;
			flex-direction: row-reverse;
			font-size: 22px;
		}

		.info-row_label {
			width: 135px;
			margin-right: 16px;
			padding: 17px 0 13px;
			color: #abd8ff;
			font-size: 14px;
			letter-spacing: .05em;
			text-transform: uppercase;
		}
		.info-row_value {
			width: calc(100% - 141px);
			padding: 17px 0 13px;
			overflow: hidden;
			display: flex;
			flex-direction: row-reverse;
		}
		.info-row_value_price {
			width: calc(100% - 141px);
			padding: 17px 0 13px;
			overflow: hidden;
			display: flex;
			font-size: 28px;
		}

		.info-row_value_name {
			width: calc(100% - 141px);
			padding: 17px 0 13px;
			overflow: hidden;
			display: flex;
			
			font-size: 20px;
		}

		.item-title{
			color: #fff;
			font-size: 20px;
			letter-spacing: .1em;
			text-align: center;
			text-transform: uppercase;
		}
		.info-row_value a {
			display: inline-flex;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			padding: 5px 10px 2px;
			border-radius: 3px;
			box-shadow: 0 3px 6px 0 rgb(0 0 0 / 8%);
			border: 1px solid #0083f3;
    		background-color: #0075d9;
		}

		.info-row_value a:hover{
			background-color: rgb(0,90,186);
			text-decoration: none;
			color: white;
			font-weight: bold;
		}

		
		.btn_cart{
			text-align: center;
		}

		.description_head {
			display: flex;
			position: relative;
			margin-bottom: 10px;
			border-bottom: 3px solid #3a5f81;
		}
		.head-bullet {
			position: relative;
			padding: 10px 20px 15px;
			width: auto;
			height: auto;
			border-radius: 0;
			background-color: transparent;
			cursor: pointer;
			opacity: 1;
			color: #abd8ff;
			font-size: 20px;
			transition: color .3s ease;
		}
		.description_head::after{
			
			content: "";
			position: absolute;
			top: 100%;
			right: 0;
			left: 0;
			height: 3px;
			background-color: #58b2ff;
			transition: opacity .3s ease,visibility .3s ease;
			
		}

		.description_head_chosen{
			color: white;
		}

		.info_product{
			width: 100%;
			margin-top: 20px;
		}

		.progress-label-left{
			float: left;
			margin-right: 0.5em;
			line-height: 1em;
		}

		.progress-label-right{
			float: right;
			margin-left: 0.3em;
			line-height: 1em;
		}

		.star-light{
			color:#e9ecef;
		}
		.progress{
			width: 70%;
		}

		.star_review{
			display: flex;
			flex-direction: row;
			margin-top: 15px;
			width: 100%;
			height: fit-content;
		}
		.review{
			display: block;
			width: 100%;
			background-color: #0075d9;
		}

		.user_review{
			display: flex;
			flex-direction: row;
			flex-wrap: nowrap;
			width: fit-content;
			width: 100%;
			color: rgb(199,207,215);
			
		}

		.user_review .user_img{
			width: 7%;
			height: 7%;
		}

		.user_review .user_img img{
			width: 100%;
			height: 100%;
		}

		.user_comment{
			display: flex;
			flex-direction: column;
			flex-wrap: nowrap;
			width: 90%;
			border: 2px solid #3a5f81;
			font-size: 15px;
			margin-left: 20px;
			padding: 0px 20px 20px 20px;
		}
		.user_comment .comment{
			padding-top: 10px;
			color: white;
		}
		.user_name{
			font-style: italic;
			font-size: 14px;
		}
		

		
		

</style>
<?php 

	$cusid="";
	if(isset($_SESSION["CusID"])){
		$cusid = $_SESSION["CusID"];
	}

?>
<?php if(isset($_GET['id'])){

    include_once("../class/product.php");
    include_once("../class/producer.php");
    include_once("../class/category.php");
	include_once("../class/customer.php");
	include_once("../class/review.php");


	if(isset($_GET["action"])&&$_GET["action"]=="review"){
        

		$id = isset($_GET['id'])?$_GET['id']:"";
		$idcustomer = isset($_GET['idcustomer'])?$_GET['idcustomer']:"";
		$rating = isset($_GET['rating_data'])?$_GET['rating_data']:"";
		$comment = isset($_GET['user_review'])?$_GET['user_review']:"";
        $time = date('Y-m-d H:i:s');
        
		review::addReview($idcustomer, $id, $rating, $comment, $time);

	}

    if($result=product::getByID($id)){
        $row=$result->fetch_array();
        

?>
	<div class="block-title product_name" id="<?php echo $cusid ?>">
		<h3><span><?php echo $row['ProductName'] ?></span></h3>
	</div>
		<div class="item-head">
			<div class="item-head-left">
				<div id="demo" class="carousel slide" data-ride="carousel">
					
					<div class="carousel-inner">
					<?php 	
							if($resultDe=product::getAllImg($id)){
							$t=0;
							while($rowDe=$resultDe->fetch_array()){
								if($t==0){
									$t++;
						?>		
							<div class="carousel-item active">
								<a href="#"><img src="<?php echo "../images/detail/$rowDe[Image]" ?>" 
								alt="<?php echo $row['ProductName']?>"></a>
							</div>
						<?php 
							}
							else{
							
						?>
							<div class="carousel-item">
							<a href="#"><img src="<?php echo "../images/detail/$rowDe[Image]" ?>" 
							alt="<?php echo $row['ProductName']?>"></a>
							</div>
						<?php }}} ?>
					</div>
					
					<a class="carousel-control-prev" href="#demo" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next" href="#demo" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					</a>
					
					<ul class="carousel-indicators">
						<?php 
							if($resultDe=product::getAllImg($row[0])){
							$i=0;
							$t=0;
							while($rowDe=$resultDe->fetch_array()){
								
								if($t=0){
									$t++;
						
						?>
						<li data-target="#demo" data-slide-to="<?php echo $i ?>" class="active"><img src="<?php echo "../images/detail/$rowDe[Image]" ?>"
						alt="<?php echo $row['ProductName'] ?>"></li>
					
						<?php 
							}
							else{
						
						?>
						<li data-target="#demo" data-slide-to="<?php echo $i ?>"><img src="<?php echo "../images/detail/$rowDe[Image]" ?>" 
						alt="<?php echo $row['ProductName'] ?>"></li>
						<?php 
							}
							$i++;
						}
						}
						
						?>
					</ul>
				</div>
				
				<div class="info_product">
					<div class="description_head">
						<span class="head-bullet description_head_chosen" id="01">Mô Tả</span>
						<span class="head-bullet" id="02">Thành Phần</span>
						
					</div>
					<div id="des" class="description">
						<p><?php echo $row['Description'] ?></p>
					</div>
					<div id="ing" style="display: none"  class="description">
						<p><?php echo $row['Ingredient'] ?></p>
					</div>
					
				</div>
				
			</div>
			<div class="item-right">
				<div class="img item-detail">
					<div class="item-img">
						<img src="<?php echo "../$row[Image]" ?>" alt="<?php echo $row['ProductName']?>">
					</div>
					
					

					<div class="info-row" id="<?php echo $row['ProductID'] ?>">
					<?php 
						$price = "$row[Price]";
						
						if($reDiscount = product::getDiscount($row[0]) )
							if(mysqli_num_rows($reDiscount) > 0)

							if($rowDiscount = $reDiscount->fetch_array()){
								$percent = $rowDiscount[0];
								$priceUp = $price;
								$price = round(($priceUp-$priceUp*$percent/100),2);
					?>
					
						<div class="original_price">
							<?php echo number_format($priceUp, 0, ',', '.') . '₫';	//echo '$'.$priceUp ?>
					
						</div>
						
					<?php 
						}
						
					?>
						<div class="info-row_value_price" id="price" value=<?php echo $price?>><?php echo number_format($price, 0, ',', '.') . '₫';	//echo "$".$price ?></div>
					</div>

					<div class="item-infomation" >
						
						<div class="info-row">
							<span class="info-row_label">Nhà Sản Xuất</span>
							<div class="info-row_value">
								
								<a href="#">
								<?php  
									if($resultProd=producer::getByID($row['ProducerID'])){ 
										$rowProd=$resultProd->fetch_array();
										echo $rowProd['ProducerName'];
									}
								?>
								</a>
						
							</div>
						</div>
						
						<div class="info-row">
							<span class="info-row_label">Loại Bánh</span>
							<div class="info-row_value">
								
								<a href="#">
									<?php  
										if($resultProd=category::getByID($row['CategoryID'])){ 
											$rowProd=$resultProd->fetch_array();
											echo $rowProd['Name'];
										}
									?>
								</a>
						
							</div>
							
						</div>
						
						
						
					</div>
					<div class="btn_cart" id="<?php echo $row[0] ?>" >
						<button type="button" class="btn cart" onclick="display()" id="addcart">THÊM VÀO GIỎ</button>

					</div>

					
				</div>
				<div id="<?php echo "m".$row[0] ?>" class="modal">
                        <form class="modal-content" action="">
                            <div class="modal-container">
                                <h4 style="text-align: center;">Bánh đã được thêm vào giỏ hàng của bạn</h4>
                                <div class="product-cart">
                                    <img src=<?php echo "../$row[Image]"?> alt="<?php echo $row['ProductName'] ?>">
                                    <div class="product-title">
                                        <h5><?php echo $row['ProductName'] ?></h5>
                                        <h5><?php echo number_format($price, 0, ',', '.') . '₫';	//echo "$".$price?></h5>
                                    </div>
                                </div>
                                <div class="modal-btn">
                                    <button class="btn button ml-2" id="continue" type="button" onclick="">Tiếp tục mua sắm</button>
                                    <button class="btn button ml-2" id="delete" type="button" onclick="location.href='index.php?id=1&position=top'">Đến giỏ hàng</button>
                                </div>
                            </div>
                        </form>
                    </div>
				<div class="item-detail" style="margin-top: 10px">
					<div class="item-title">
						<h3>THÔNG TIN BÁNH</h3>
					</div>
					<div class="info-row">
						<span class="info-row_label">Số Phần</span>
						<div class="info-row_value"><?php echo $row['Serving'] ?></div>

					</div>
					<div class="info-row">
						<span class="info-row_label">Calo</span>
						<div class="info-row_value"><?php echo $row['Calory'] ?></div>

					</div>
					<div class="info-row">
						<span class="info-row_label">Khối Lượng</span>
						<div class="info-row_value"><?php echo $row['Weight'].'g' ?></div>

					</div>
					<div class="info-row">
						<span class="info-row_label">Hạn Sử Dụng</span>
						<?php 
							$expirationDate = "";
							if($reExp = product::getExpirationDatByID($row['ProductID']))
								if($rowExp = $reExp->fetch_array())
									$expirationDate = $rowExp[0];
							
								
						
						?>
						<div class="info-row_value"><?php echo $expirationDate ?></div>

					</div>
			
				</div>
			</div>
		</div>



<div id="block_review">
		<div class="card" >
    		<div class="card-header">XẾP HẠNG & ĐÁNH GIÁ</div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
						<?php 
							$avgRating = round(review::avgRating($row['ProductID']), 2);
						?>
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating"><?php echo $avgRating ?> / 5</span></b>
    					</h1>
    					<div class="mb-3">
							
							<?php
								

								for($star = 1; $star <= 5; $star++){

									if($avgRating >= $star)

										echo "<i class='fas fa-star main_star text-warning mr-1'></i>";
									else

										echo "<i class='fas fa-star main_star star-light mr-1'></i>";
		
							
							?>

							<?php 
									
								}
							?>

    						
	    				</div>
						<?php 
							$totalReview = review::sumReview($row['ProductID']);
						?>
    					<h4><span id="total_review"><?php echo $totalReview  ?></span> Đánh Giá</h4>
    				</div>
    				<div class="col-sm-4">
						<?php 
							for($star = 5; $star > 0; $star--){
								$numStar = review::getNumberStar($row['ProductID'], $star);

								if($totalReview > 0)
									$avgNumStar = $numStar/$totalReview*100;
						
						?>
    					<div class="star_review">
                            <div class="progress-label-left"><b><?php echo $star ?></b> <i class="fas fa-star text-warning"></i></div>

                            
                            <div class="progress">
                                <div style="width:<?php echo $avgNumStar ?>%" class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="<?php echo $star ?>_star_progress"></div>
                            </div>
							<div class="progress-label-right">(<span id="total_five_star_review"><?php echo $numStar ?></span>)</div>
						</div>


						
						<?php 
							}
						?>
    				</div>
    				<div class="col-sm-4 text-center">
    					<h3 class="mt-4 mb-3">Viết Đánh Giá Tại Đây</h3>
    					<button type="button" name="add_review" id="add_review" class="btn btn-primary">Đánh Giá</button>
    				</div>
    			</div>
    		</div>
    	</div>


		
		<div id="review_modal" class="modal" >
			
				<div class="modal-content" style="width: 80%">
					
					<div class="modal-container">
						<h4 class="text-center mt-2 mb-4">
							<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
							<i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
							<i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
							<i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
							<i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
						</h4>
						<!--
						<div class="form-group">
							<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
						</div>
						-->
						<div class="form-group">
							<textarea name="user_review" id="user_review" class="form-control" rows="10" placeholder="Type Review Here"></textarea>
						</div>
						
						<div class="modal-btn">
							<button class="btn button ml-2" id="close" type="button">Đóng</button>
							<button class="btn button ml-2" id="save_review" type="button">Gửi</button>
						</div>
					</div>
				</div>
			
		</div>

		<div class="card" style="margin-top: 25px" id="">
			<div class="card-header">
				Danh Sách Đánh Giá
			</div>
			<?php
				if($resultReview = review::getByIDProduct($row['ProductID'])){
					while($rowReview = $resultReview->fetch_array()){
						if($resultCus = customer::getByID($rowReview['CustomerID']))
							if($rowCus = $resultCus->fetch_array()){
			?>
			<div class="card-body">
				<div class="user_review">
					<div class="user_img">
						<img src="../images/customer/<?php echo $rowCus["Image"] ?>">
					</div>
					
					<div class="user_comment">
						
						
						<span class="user_name"><?php echo $rowCus['Fullname'] ?></span>
						<span class="user_name"><?php echo $rowReview['Time'] ?></span>
						<span class="user_name">
							<?php
								$rating = $rowReview['Rating'];

								for($star = 1; $star <= 5; $star++){

									if($rating >= $star)

										echo "<i class='fas fa-star text-warning mr-1'></i>";
									else

										echo "<i class='fas fa-star star-light mr-1'></i>";
		
							
							?>

							<?php 
									
								}
							?>
						</span>
						<div class="comment">
							<?php echo $rowReview['Comment']?>
						</div>
						
					</div>

				</div>
			</div>
			
			
			<?php 
						}
					}
				}
				else
				 	echo "<div style='padding: 20px; text-align: center'>Bánh này chưa được viết đánh giá!<br> Nếu bạn đã thử rồi hãy viết đánh giá về bánh này nhé.</div>"
				
			?>
			

		</div>
	</div>

		<!--
		<div class="row mb-3">
			<div class="col-sm-1">
				<div class="rounded-circle bg-danger text-white pt-2 pb-2">
					<h5 class="text-center"></h5>
				</div>
			</div>
			<div class="col-sm-11">
				<div class="card">
					<div class="card-header">
						abv
					</div>


				</div>
			</div>


		</div>
		-->



		
		
		<div class="block-title">
			<h3><span>Các Loại Bánh Tương Tự</span></h3>
		</div>

		<div id="carousel-multi" class="carousel slide carousel-multi-item" data-ride="carousel">

		<div class="carousel-multi-inner" role="listbox">
			<a class="carousel-multi-control-prev" href="#carousel-multi" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<?php 
				if($resultProd = product::getByProducer($row['ProducerID'])){
					$numrow = $resultProd->num_rows/3;
					
					for($i = 0; $i < $numrow; $i++){
						
						$d = 0;
						
						if($i == 0){	
			?>
			<div class="carousel-item active">

					
				<div class="item-bottom">
					<?php  
						
					
						while($rowProd = $resultProd->fetch_array()){
							$d++;
					?>
					
					<div class="item-bottom-detail ml-2">
						<div class="card">
							
							<a href="index.php?action=detail&id=<?php echo $rowProd[0]?>" title="<?php echo $rowProd['ProductName']?>">
								<img class="card-img-top" src="<?php echo "../$rowProd[Image]"?>" alt="<?php echo $rowProd['ProductName']?>">
							</a>

							<!--<div class="new-product-label">NEW</div>-->
							
							<div class="card-body">
								<a href="index.php?action=detail&id=<?php echo $rowProd[0]?>"><h5><?php echo $rowProd['ProductName']?></h5></a>
									<div class="combo-box">
										
										<button type="button" id="<?php echo $rowProd[0] ?>" title="Add to card" class="button-cart" onclick="">
											<div class="button-cart"><i class="fa fa-cart-plus fa-fw fa-lg"></i></div>
										</button>

										<div class="price">
										<?php 
											$price = "$rowProd[Price]";
											
											if($reDiscount = product::getDiscount($rowProd[0]) )
												if(mysqli_num_rows($reDiscount) > 0)

												if($rowDiscount = $reDiscount->fetch_array()){
													$percent = $rowDiscount[0];
										?>
											<div class="discount">
												<span><?php if(isset($percent)) echo $percent.'%' ?></span>
											</div>
											
										<?php 
													
											$priceUp = $price;
											$price = round(($priceUp-$priceUp*$percent/100),2);
												
												
										?>
											<span class="original_price">
												<?php echo number_format($priceUp, 0, ',', '.') . '₫';	//echo '$'.$priceUp ?>
										
										
											</span>
										<?php 
											}
											
										?>
											
											<span id="<?php echo 'p'.$rowProd[0]  ?>" value="<?php echo $price?>">
												<?php echo number_format($price, 0, ',', '.') . '₫';	//echo '$'.$price ?>
												

											</span>
										</div>


										
									
									</div>
							</div>				
						
						</div>
					</div>
							
					<?php 
					
					if($d == 3) break;
						
						}

					?>
				</div>
			</div>
			<?php
				}
				else{	
			?>
			<div class="carousel-item">
					<div class="item-bottom">
					<?php  
					while($rowProd = $resultProd->fetch_array()){
						$d++;
					?>
					
					<div class="item-bottom-detail ml-2">
					<div class="card">
						<a href="index.php?action=detail&id=<?php echo $rowProd[0]?>" title="<?php echo $rowProd['ProductName']?>">
							<img class="card-img-top" src="<?php echo "../$rowProd[Image]"?>" alt="<?php echo $rrowProdow['ProductName']?>">
						</a>
						<!--<div class="new-product-label">NEW</div>-->
						<div class="card-body">
							<a href="index.php?action=detail&id=<?php echo $rowProd[0]?>"><h5><?php echo $rowProd['ProductName']?></h5></a>
								<div class="combo-box">
									<button type="button" id="<?php echo $rowProd[0] ?>" title="Add to card" class="button-cart" onclick="">
										<div class="button-cart"><i class="fa fa-cart-plus fa-fw fa-lg"></i></div>
									</button>
									<div class="price">
										<?php 
											$price = "$rowProd[Price]";
											
											if($reDiscount = product::getDiscount($rowProd[0]) )
												if(mysqli_num_rows($reDiscount) > 0)

												if($rowDiscount = $reDiscount->fetch_array()){
													$percent = $rowDiscount[0];
										?>
											<div class="discount">
												<span><?php if(isset($percent)) echo $percent.'%' ?></span>
											</div>
											
										<?php 
													
											$priceUp = $price;
											$price = round(($priceUp-$priceUp*$percent/100),2);
												
												
										?>
											<span class="original_price">
												<?php echo number_format($price, 0, ',', '.') . '₫';	//echo '$'.$priceUp ?>
										
										
											</span>
										<?php 
											}
											
										?>
											
											<span id="<?php echo 'p'.$rowProd[0]  ?>" value="<?php echo $price?>">
												<?php  echo number_format($price, 0, ',', '.') . '₫';	//echo '$'.$price ?>
												

											</span>
										</div>
								</div>
						</div>				
					</div>
					</div>
					
				
				

					<?php if($d == 3) break;
							
						}

					?>
				</div>
			</div>
			<?php }
			
				}
			} 
			?>	
			<a class="carousel-multi-control-next" href="#carousel-multi" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		
		</div>
	</div>
		

<?php 
	}
    }
?>
<script>
        
        $(document).ready(function(){
			rating_data = 0;
            //$(".shop_item").load("index.php?action=add&id="+id);
			$("span.head-bullet").on("click",function(e){
				
				if (this.id == '01') {
					document.getElementById("des").style.display="block";
					document.getElementById("ing").style.display="none";
					$(this).addClass("description_head_chosen");
					$(document.getElementById("02")).removeClass("description_head_chosen")
				}
				if (this.id == '02') {
					document.getElementById("ing").style.display="block";
					document.getElementById("des").style.display="none";
					$(this).addClass("description_head_chosen");
				
					$(document.getElementById("01")).removeClass("description_head_chosen");
				}
			})
            $("button#addcart").on("click",function(e){
                
                e.preventDefault();
                var action="add";
                var id=$(this).parent().attr("id");
				var price = document.getElementById("price").getAttribute("value");
				//price = price.substr(1);
				//alert(id);

                $.ajax({
                url: "index.php",
                type: "GET",
                data: {
                    action: action,
                    id: id,
					price: price
                },
                cache: false,
                success: function(dataResult){
                    var result = $('<div />').append(dataResult).find("#target-content").html();
					var menu = $('<div />').append(dataResult).find("#menu-top").html();
					
                    $("#target-content").html(result);
					
                    $("#menu-top").html(menu);
                    
                    document.getElementById("m"+id).classList.add("show-modal");
                }
                });
				
            })
            $("div #continue").on("click",function(e){
                e.preventDefault();
                var cont=$(this).parent().parent().parent().parent().attr("id");
                document.getElementById(cont).classList.remove("show-modal");
            })

			$("#close").click(function(){
				$('#review_modal').removeClass("show-modal");
			});

			$('#add_review').click(function(){

				$('#review_modal').addClass("show-modal");
				document.getElementById("block_review").scrollIntoView();

			});

			$(document).on('mouseenter', '.submit_star', function(){

				var rating = $(this).data('rating');

				reset_background();

				for(var count = 1; count <= rating; count++)
				{

					$('#submit_star_'+count).addClass('text-warning');

				}

			});

			function reset_background(){
				for(var count = 1; count <= 5; count++){

					$('#submit_star_'+count).addClass('star-light');

					$('#submit_star_'+count).removeClass('text-warning');

				}
			}

			$(document).on('mouseleave', '.submit_star', function(){

				reset_background();

				for(var count = 1; count <= rating_data; count++)
				{

					$('#submit_star_'+count).removeClass('star-light');

					$('#submit_star_'+count).addClass('text-warning');
				}

			});

			$(document).on('click', '.submit_star', function(){

				rating_data = $(this).data('rating');

			});

			$("button#save_review").on("click",function(e){
                
                e.preventDefault();

				var id=$(".info-row").attr("id");
				var idcustomer=$(".block-title").attr("id");
				

				var user_review = $('#user_review').val();
				var act = "review";

				if(user_review == ''){
					alert("Please write your review before submit");
					return false;
				}
				if(idcustomer == ''){
					alert("Please login before write any comment");
					return false;
				}

				action = "review";
				

                $.ajax({
                url: "detail.php",
                type: "GET",
                data: {
                    action:action,

					idcustomer:idcustomer,

					id:id,

					rating_data:rating_data, 
					
					user_review:user_review,

                },
                cache: false,
                success: function(dataResult){
					
					//alert(dataResult);

                    var result = $('<div />').append(dataResult).find("#block_review").html();
					
                    $("#block_review").html(result);
					
					$('#review_modal').removeClass("show-modal");
                    
                }
                });
				
            })

		
            
        })
</script>