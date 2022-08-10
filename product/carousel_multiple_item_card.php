

<div class="block-title">
	<h3><span>Bánh Bán Chạy</span></h3>
</div>
<div id="carousel-multi" class="carousel slide carousel-multi-item" data-ride="carousel" style="margin-top: 0;">

    <div class="carousel-multi-inner" role="listbox" >
		<a class="carousel-multi-control-prev" href="#carousel-multi" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		</a>
		<?php 
			include_once("../class/product.php");
			if($result = product::getNew9()){
				$numrow = $result->num_rows/3;
				for($i = 0; $i<$numrow; $i++){
					$d = 0;
					if($i == 0){
		?>
		<div class="carousel-item active">
			<div class="item-bottom">
				<?php  
				
					while($row = $result->fetch_array()){
						$d++;
				?>
				<div class="item-bottom-detail">
					<div class="card">
						<a href="index.php?action=detail&id=<?php echo $row[0]?>" title="<?php echo $row['ProductName']?>">
							<img class="card-img-top" src="<?php echo "../$row[Image]"?>" alt="<?php echo $row['ProductName']?>">
						</a>
						<!--<div class="new-product-label">NEW</div>-->
						<div class="card-body">
							<a href="index.php?action=detail&id=<?php echo $row[0]?>"><h5><?php echo $row['ProductName']?></h5></a>
								<div class="combo-box">
									<button type="button" id="<?php echo $row[0] ?>" title="Add to card" class="button-cart" onclick="">
										<div class="button-cart"><i class="fa fa-cart-plus fa-fw fa-lg"></i></div>
									</button>
									
									<div class="price">
								<?php 
									$price = "$row[Price]";

									if($reDiscount = product::getDiscount($row[0]) )
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
									<span id="price">
											<?php echo number_format($price, 0, ',', '.') . '₫';	//echo '$'.$price ?>
									
									
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
		<?php
			}
			else{	
		?>
		<div class="carousel-item">
			<div class="item-bottom">
				<?php  
				
					while($row = $result->fetch_array()){
						$d++;
				?>
				<div class="item-bottom-detail">
					<div class="card">
						<a href="index.php?action=detail&id=<?php echo $row[0]?>" title="<?php echo $row[1]?>">
							<img class="card-img-top" src="<?php echo "../$row[Image]"?>" alt="<?php echo $row['ProductName']?>">
						</a>
						<!--<div class="new-product-label">NEW</div>-->
						<div class="card-body">
							<a href="index.php?action=detail&id=<?php echo $row[0]?>"><h5><?php echo $row['ProductName']?></h5></a>
								<div class="combo-box">
									<button type="button" id="<?php echo $row[0] ?>" title="Add to card" class="button-cart" onclick="">
										<div class="button-cart"><i class="fa fa-cart-plus fa-fw fa-lg"></i></div>
									</button>
									<div class="price">
								<?php 
									$price = "$row[Price]";
									if($reDiscount = product::getDiscount($row[0]) )
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
									<span id="price">
											<?php echo number_format($price, 0, ',', '.') . '₫';	//echo '$'.$price ?>
									
									
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
		<?php }}} ?>	
		<a class="carousel-multi-control-next" href="#carousel-multi" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>
	
    </div>
 </div>