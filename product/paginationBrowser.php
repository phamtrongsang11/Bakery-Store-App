<style>
    .noProduct{
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        color: white;
    }

</style>

<?php


    include_once("../class/product.php");
    
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else{
        $page=1;
    }

    $limit=6;
    $start_from=($page-1)*$limit;
    

	if(isset($_GET['pricemin'])&&$_GET['pricemin']!=""){
		
        if($_GET['pricemin'] != ""){
            $min=$_GET['pricemin'];
            $max=$_GET['pricemax'];
        }
        else {
            $min = 0;
            $max = 500000;
        }

        if(isset($_GET['producer'])&&$_GET['producer']!=0){
            $producer=$_GET['producer'];
            $result=product::select_prod_price_pagination($producer,$min,$max,$start_from,$limit);
            if(isset($_GET['cate'])&&$_GET['cate']!=0){
                $cate=$_GET['cate'];
                
                $result=product::select_cate_prod_price_pagination($cate,$producer,$min,$max,$start_from,$limit);
            }
        }
        else if(isset($_GET['cate'])&&$_GET['cate']!=0){
            $cate=$_GET['cate'];
           
            $result=product::select_cate_price_pagination($cate,$min,$max,$start_from,$limit);

        }
        else 
            $result=product::select_price_pagination($min,$max,$start_from,$limit);

	}
    
    else if(isset($_GET['idtag'])&&$_GET['idtag']!=""){
        $idtag=$_GET['idtag'];
        $result=product::getListByCateID_pagination($idtag,$start_from,$limit);
    }

    else if(isset($_GET['idProd'])&&$_GET['idProd']!=""){
        $idProd=$_GET['idProd'];
        $result=product::getByProducer_pagination($idProd,$start_from,$limit);
    }

	else if(isset($_GET['name'])&&$_GET['name']!=""){
        
        $name = $_GET['name'];
        $nameclear = preg_replace('/,+/', ' ', $name);
        $result=product::getByName_pagination($nameclear,$start_from,$limit);
    }
    else if(isset($_GET['idDiscount'])&&$_GET['idDiscount']!=""){
        $idDiscount = $_GET['idDiscount'];
        $result = product::select_discount_pagination($idDiscount, $start_from, $limit);
    }
    
    else{
       
        $result=product::select_pagination($start_from,$limit);
    }
    $numrow=ceil($limit/3);
    //echo $numrow;

    if($result && $numrow > 0 )
    for($i=0;$i<$numrow;$i++){
		$count=0;

?>
    
	<div class="row row_br" style="margin-top: 2rem">

		<?php while($row=$result->fetch_array()){ 
			$count++;
			
		?>
		<div class="col-sm-4">
			<div class="card">
                
				<a href="index.php?action=detail&id=<?php echo $row[0]?>" title="<?php echo $row['ProductName'] ?>">
					<img class="card-img-top" src=<?php echo "../$row[Image]"?> alt="<?php echo $row['ProductName'] ?>">
				</a>
				<!--<div class="new-product-label">NEW</div>-->
				<div class="card-body">
					<a href="index.php?action=detail&id=<?php echo $row[0]?>"><h5><?php echo $row['ProductName']?></h5></a>
                    <?php 
                        if(isset($_SESSION['cart'][$row[0]])&&
                        product::getAmount($row[0])<=$_SESSION['cart'][$row[0]]['qty']){
                        
                    ?>
                        <div class="price">SOLD OUT</div>
                    <?php 
                        }else{
                    ?>
					<div class="combo-box">
						<button type="button" id="<?php echo $row[0] ?>" class="button-cart" onclick="display()" title="Add to card">
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
                            <?php 
                                
                                

                                
                                
                            ?>
                            
							<span class="original_price">
                                    <?php  echo number_format($priceUp, 0, ',', '.') . '₫'; //echo '$'.$priceUp ?>
                               
                            
                            </span>
                            <?php 
                            
                                }
                            ?>
                            <span id="<?php echo 'p'.$row[0]  ?>" value="<?php echo $price?>">
                                <?php  echo number_format($price, 0, ',', '.') . '₫';  //echo '$'.$price ?>
                                

                            </span>
						</div>
					</div>
                    <?php
                        }
                    ?>
                    <div id="<?php echo "m".$row[0] ?>" class="modal">
                        <form class="modal-content" action="">
                            <div class="modal-container">
                                <h4 style="text-align: center;">Bánh đã được thêm vào giỏ hàng của bạn</h4>
                                <div class="product-cart">
                                    <img src=<?php echo "../$row[Image]"?> alt="<?php echo $row['ProductName'] ?>">
                                    <div class="product-title">
                                        <h5><?php echo $row['ProductName'] ?></h5>
                                        <h5><?php echo number_format($price, 0, ',', '.') . '₫';    //echo "$$price"?></h5>
                                    </div>
                                </div>
                                <div class="modal-btn">
                                    <button class="btn button ml-2" id="continue" type="button" onclick="">Tiếp tục mua sắm</button>
                                    <button class="btn button ml-2" id="delete" type="button" onclick="location.href='index.php?id=1&position=top'">Đến giỏ hàng</button>
                                </div>
                            </div>
                        </form>
                    </div>

				</div>	
                	
			</div>
        </div>
		<?php 
		if($count==3)
			break;
		}?>
	</div>

	<?php }
        else{
    
    ?>
    <div class="noProduct" style="text-align: center">
        <p>Cửa hàng không tìm thấy sản phẩm nào thỏa yêu cầu của bạn.</p>
        
    </div>
    <?php 
        }
    ?>

    <script>
        
        $(document).ready(function(){
            //$(".shop_item").load("index.php?action=add&id="+id);
            $(".button-cart i").on("click",function(e){
                
                e.preventDefault();
                var action="add";
                var id=$(this).parent().parent().attr("id");
                var price = document.getElementById("p"+id).getAttribute('value');
                //price = price.substring(1);
                
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
                    var result = $('<div />').append(dataResult).find("#browser").html();
                    $("#browser").html(result);
                    document.getElementById("m"+id).style.display="block";
                }
                });
            })
            $("div #continue").on("click",function(e){
                e.preventDefault();
                var cont=$(this).parent().parent().parent().parent().attr("id");
                document.getElementById(cont).style.display="none";
            })
            
        })

        
        
        
    </script>
    