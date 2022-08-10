<style>
	.carousel-indicators{
		position: relative;
		margin-top: 10px;
	}
	.carousel-item h5{
		color: white;
	}
</style>

			
			<div id="demo" class="carousel slide" data-ride="carousel" style="margin-bottom: 30px;">
			
				<div class="carousel-inner">
					<?php 
						
						include_once("../class/discount.php");
						$result=discount::getAll();
						$t=0;
						while($row=$result->fetch_array()){
							if($t==0){
								$t++;
					?>		
						<div class="carousel-item active">
							<a href="index.php?position=top&id=6&idDiscount=<?php echo "$row[0]" ?>"><img src="<?php echo "../images/discount/$row[Image]" ?>" alt="<?php echo $row['DiscountName']?>"></a>
							<div class="carousel-caption d-none d-md-block">
								<h5><?php echo $row['DiscountName']?></h5>
								
							</div>
						</div>
					<?php 
						}
						else{
						
					?>
						<div class="carousel-item ">
							<a href="index.php?position=top&id=6&idDiscount=<?php echo "$row[0]" ?>"><img src="<?php echo "../images/discount/$row[Image]" ?>" alt="<?php echo $row['DiscountName']?>"></a>
							<div class="carousel-caption d-none d-md-block">
								<h5><?php echo $row['DiscountName']?></h5>
								
							</div>
						</div>
					<?php }} ?>
						
					
				</div>
				
				<div>
					<ul class="carousel-indicators">
						<li data-target="#demo" data-slide-to="0" class="active"></li>
						<?php 
							if($result)
								$num = $result->num_rows;
							$i = 1;
							while($i < $num){
						
						?>
						<li data-target="#demo" data-slide-to="<?php echo $i ?>"></li>
						<?php 
							$i++;
							}
						?>
				
						
					</ul>
				</div>
				<a class="carousel-control-prev" href="#demo" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#demo" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</div>