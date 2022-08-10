<style>
*{
			box-sizing: border-box;
		}
		
		.header{
			border-bottom: 2px solid rgba(128,132,144,1);
			color: white;
			margin-top: 7.5%;
			margin-bottom: 12%;
		}

		.left_br{
			float: left;
			width: 25%;
			color: #a9d8ff;
		}
		
		.right_br{
			float: left;
			width: 75%;
			position: relative;
			
		}
		

		div.right_br{
			padding-left: 0.7rem;

		}

		.mld{
			display: flex;
			flex-flow: row wrap;
			align-items: strectch;
			margin: 0 auto 0 auto;
		}

		.sort{
			color: white;
			font-weight: bold;
			background-color: #0075d9;
		}
		.sort:hover{
			color: white;
			text-decoration: underline;
		}
		.dropdown-menu a:hover{
			color: white;
			background-color: #0075d9;
		}
		.dropdown-menu.show{
			width: 10%;
		}

		.listing-filters{
			display: flex;
			flex-direction: column;
			border-radius: 3px;
    		background-image: linear-gradient(180deg,#223f5a,#17314a);
    		overflow: hidden;
		}
		.listing-filters__head {
			width: 100%;
			margin-bottom: 20px;
			padding: 20px;
			background-color: #17314a;
			font-size: 20px;
			line-height: 1;
		}

		.filter-cate{
			width: 100%;
    		padding: 14px 0 17px;
    		border-top: 1px solid #2a4a67;
		}
		.filter-cate-title{
			margin-bottom: 11px;
			color: #c5e4ff;
			font-size: 20px;
			padding: 10px;
		}

		.producer{
			padding-left: 20px;
			color: white;
		}
		
		.filter-item{
			display: flex;
			align-items: center;
			width: 100%;
			margin-top: 10px;
			cursor: pointer;
			overflow: hidden;
		}

		
		@keyframes click-wave {
		0% {
			height: 20px;
			width: 20px;
			opacity: 0.5;
			position: relative;
		}

		100% {
			height: 100px;
			width: 100px;
			margin-left: -40px;
			margin-top: -40px;
			opacity: 0;
		}
		}

		.option-input {
			-webkit-appearance: none;
			-moz-appearance: none;
			-ms-appearance: none;
			-o-appearance: none;
			appearance: none;
			position: relative;
			right: 0;
			bottom: 0;
			left:	0;
			height: 20px;
			width: 20px;
			transition: all 0.15s ease-out 0s;
			background: #223f5a;
			border: 2px solid #c5e4ff;
			color: #fff;
			cursor: pointer;
			display: inline-block;
			margin-right: 0.5rem;
			outline: none;
			position: relative;
			z-index: 1;
		}

		.option-input:hover {
			background: #9faab7
		}

		.option-input:checked {
			background: blue;
		}

		.option-input:checked::before {
			height: 20px;
			width: 20px;
			position: absolute;
			font-weight: 900;
			content: "\f00c";
			font-family: "Font Awesome 5 Free";
			display: inline-block;
			font-size: 16px;
			text-align: center;
			line-height: 17px;
		}

		.option-input:checked::after {
			-webkit-animation: click-wave 1s;
			-moz-animation: click-wave 0.5s;
			animation: click-wave 0.5s;
			background: #0075d9;
			content: '';
			display: block;
			position: relative;
			z-index: 100;
		}

		.option-input.radio {
			border-radius: 50%;
		}

		.option-input.radio::after {
			border-radius: 50%;
		}
		
		div.search{
			text-align: center;
			margin-bottom: 20px;
		}
		.pagination {
			text-align: center;
			display: inline-block;
			margin-top: 20px;
		}
		.pagination a{
				
			float: left;
			padding: 8px 16px;
			text-decoration: none;
			border: 2px solid #5d8ab4;
			color: White;
			margin: 0 4px;
		}

		.pagination a:hover:not(.active){
			border: 2px solid #0083f3;
		}

		.pagination a.active{
			border: 2px solid #0083f3;
			background: #0083f3;
		}
		.button{
			background-color: #17314a;
			color: white;
			border: 1px solid white;
		}
		.button:hover{
			background-color: #0075d9;
			color: white;
		}
			
		.product-title h5{
			color: black;
			font-weight: bold;
    	}
		.tab_sort a{
			color: white;
		}
		.label{
			color: #c5e4ff;
			font-size: 15px;
			font-weight: 400;
			line-height: 1.5;
			letter-spacing: .05em;
		}
		.controll{
			box-sizing: border-box;
			clear: both;
			font-size: 1rem;
			position: relative;
			text-align: inherit;
		
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
			width: 100%;
		}
		.range_price{
			display: flex;
			flex-direction: rows;
			flex-wrap: nowrap;
			
		}
		.range_price .field{
			width: 50%;
			margin: 10px;
			
		}
		
		
</style>
<?php 
	include_once("../class/category.php");
	include_once("../class/producer.php");
	include_once("../class/product.php");
?>


		
		<?php 
			if(isset($_GET['idAction'])){
				$id=$_GET['idAction'];
				if($result=category::getbyID($_GET['idAction'])){
				
					$row=$result->fetch_array();
					$re=$row[1];
					

				}
			}
			else if(isset($_GET['idProd'])){
				$idProd=$_GET['idProd'];
				if($result=producer::getByID($idProd)){
				
					$row=$result->fetch_array();
					$re=$row[1];
				}
			}
		
		?>
		<div class="block-title">
			<?php if(!isset($re)) 
					$re="Mới Nhất";
			?>
			<h3><span><?php echo $re ?></span></h3>
		</div>
		
	
	<div class="left_br">
		
		<div class="listing-filters">
			<div class="listing-filters__head ">
				<span>Lọc Nâng Cao</span>
			</div>
			<form id="searchAdvanded">
				<div class="filter-cate">
					<div class="filter-cate-title">
						<span>Khoảng Giá</span>
						<div class="range_price">
							<div class="field">
								<label class="label">Từ</label>
								<div class="controll">
									<input type = 'number' name = 'pricemin' value="">
								</div>
							</div>
							<div class="field">
								<label class="label">Đến</label>
								<div class="controll">
									<input type = 'number' name = 'pricemax' value="">
								</div>
							</div>
						</div>
					</div>
				
				</div>
				
				<div class="filter-cate">
					<div class="filter-cate-title">
						<span>Nhà Sản Xuất</span>
					</div>
					<div class="producer">
						<?php
							
							$result=producer::selectAll();
							while($row=$result->fetch_array()){
						
						?>
						<div class="d-flex filter-item">
						
							<input type="checkbox" class="option-input checkbox" id="<?php echo $row['ProducerID']?>" name="producer[]" value=<?php echo $row['ProducerID']?>>
							<label class="custom-control-label label" for="<?php echo $row['ProducerID'] ?>"><?php echo $row['ProducerName'] ?></label>
							
						</div>
						<?php } ?>
					</div>
				</div>

				<div class="filter-cate">
					<div class="filter-cate-title">
						<span>Loại bánh</span>
					</div>
					<div class="producer">
						<?php
							
							$result=category::getAll();
							while($row=$result->fetch_array()){
						
						?>
						<div class="d-flex filter-item">
						
							<input type="checkbox" class="option-input checkbox" id="<?php echo $row['CategoryID']?>" name="cate[]" value=<?php echo $row['CategoryID']?>>
							<label class="custom-control-label label" for="<?php echo $row['CategoryID'] ?>"><?php echo $row['Name'] ?></label>
							
						</div>
						<?php } ?>
					</div>
				</div>

				
				<div class="search ">

					<input type="submit" class="btn button" name="submit" value="Tìm Kiếm">
				
				</div>
			</form>
		</div>
		

	</div>

	<div class="right_br" id="list_product">
		<!--
	<div class="tab_sort">
			<button type="button" class="btn dropdown-toggle sort" data-toggle="dropdown">Sort</button>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#">Newest</a>
				<a class="dropdown-item" href="#">Name</a>
				<a class="dropdown-item" href="#">Best seller</a>
			</div>
		</div>
							-->
		<?php 
			if(isset($_POST['pricemin'])){
				if($_POST['pricemin'] != ""){
					$min=$_POST['pricemin'];
					$max=$_POST['pricemax'];
				}
				else {
					$min = 0;
					$max = 500000;
				}
				if(isset($_POST['producer'])){
					$producer="";

					foreach($_POST['producer'] as $key=>$value){
						$producer.=$value.",";
					}

					$producer=substr($producer,0,-1);

					$result=product::select_prod_price($producer,$min,$max);
					if(isset($_POST['cate'])){
						$cate="";
						
						foreach($_POST['cate'] as $key=>$value){
							$cate.=$value.",";
						}

						$cate=substr($cate,0,-1);

						$result=product::select_cate_prod_price($cate,$producer,$min,$max);
					}
				}
				else if(isset($_POST['cate'])){
					$cate="";
						
						foreach($_POST['cate'] as $key=>$value){
							$cate.=$value.",";
						}
						
						$cate=substr($cate,0,-1);
						echo $cate;
						$result=product::select_cate_price($cate,$min,$max);

				}
				else 
					$result=product::select_price($min,$max);
			}

			else if(isset($_POST['term'])){
				$name=$_POST['term'];
				$result=product::getByName($name);
			}
			
			else if(isset($_GET['idAction'])){
				$id=$_GET['idAction'];
				$result=product::getListByCateID($id);
			}

			else if(isset($_GET['idProd'])){
				$idProd=$_GET['idProd'];
				$result=product::getByProducer($idProd);
			}
			else if(isset($_GET['idDiscount'])){
				$idDiscount=$_GET['idDiscount'];
				$result=product::select_discount($idDiscount);
			}


			else
				$result=product::getAll();
			

			if($result){
				$totalrecord=$result->num_rows;

				$limit=6;

				$numpage=ceil($totalrecord/$limit);

			
		
		?>
		<div id="content">   
			<div id="browser"></div>
		
			<div class="center" id="<?php if(isset($producer)) echo $producer; else echo 0; ?>">
				<div class="pagination" id="<?php if(isset($cate)) echo $cate; else echo 0; ?>">
				<?php 

				if(!empty($numpage)&&$numpage>1){
					for($i=1;$i<=$numpage;$i++){
						if($i==1){ 
				?>
							<a href="JavaScript:Void(0)" class="link active" id="<?php echo $i?>" ><?php echo $i ?></a>
							
						<?php 
						}
						else{
						?>
							<a href="JavaScript:Void(0)" class="link" id="<?php echo $i?>" ><?php echo $i ?></a>

						<?php 
						}
						}
					}
					
						?>


				</div>
				
			</div>

			<script>
			$(document).ready(function(){
				
				var idtag="<?php echo isset($_GET['idAction'])?$_GET['idAction']:"" ?>";
				var idProd="<?php echo isset($_GET['idProd'])?$_GET['idProd']:"" ?>";
				
				var min="<?php echo isset($min)?$min:"" ?>";
				var max="<?php echo isset($max)?$max:"" ?>";
				
				var name="<?php echo isset($_POST['term'])?$_POST['term']:"" ?>";
				var nameclear=name.replace(/\s/g, ',');

				var producer=$(".center").attr("id");
				var cate=$(".pagination").attr("id");
				var idDiscount="<?php echo isset($_GET['idDiscount'])?$_GET['idDiscount']:"" ?>";
				//alert(idDiscount);
				
				if(min!=""&&max!=""){

					$("#browser").load("paginationBrowser.php?page=1&pricemin="+min+"&pricemax="+max+"&producer="+producer+"&cate="+cate);

				}
				else if(name!=""){
					
					$("#browser").load("paginationBrowser.php?page=1&name="+nameclear);

				}

				else if(idtag!=""){

					$("#browser").load("paginationBrowser.php?page=1&idtag="+idtag);
				}
				else if(idDiscount!=""){
					$("#browser").load("paginationBrowser.php?page=1&idDiscount="+idDiscount);
				}
				else 
					$("#browser").load("paginationBrowser.php?page=1&idProd="+idProd);					

				$(".pagination a").click(function(e){
					
					e.preventDefault();

					var id=$(this).attr("id");
					//var idpage=$(this).attr("idpage");
					$.ajax({
						
						url: "paginationBrowser.php",
						type: "GET",
						data: {
							page:id,
							idtag:idtag,
							idProd:idProd,
							
							pricemin:min,
							pricemax:max,
							producer:producer,
							cate:cate,
							name:name,
							idDiscount:idDiscount,
						},
						cache: false,
						success: function(dataResult){

							$("#browser").html(dataResult);
							
							$(".pagination a").removeClass("active");

							$("#"+id+".link").addClass("active");

							document.getElementById("list_product").scrollIntoView();
						}
					});
					
					
				});
				
				$('#searchAdvanded').on('submit',function(e){
					e.preventDefault();
					$.ajax({
						url: "browser.php",
						type: "post",
						data: $('#searchAdvanded').serialize(),
						success: function(dataResult){
							var result = $('<div />').append(dataResult).find("#content").html();
							$("#content").html(result);
							document.getElementById("list_product").scrollIntoView();
						}

					})
				})
			})

			</script>

		</div>
		<?php 
			}
	
		?>
		
	</div>
	

