<style>
    .button{
        background-color: #0075d9;
        color: white;
        border: 1px solid white;
    }
    .button:hover{
        background-color: #005b88;
        color: white;
    }
    .product-title h5{
        color: black;
        font-weight: bold;
    }
    
    div .price{
        font-size: 20px;
    }

    img.card-img-top{
        height: 60%;
    }
    .original_price{
        text-decoration: line-through;
        margin-right: 4px;
        margin-left: 4px;
        font-size: 18px;
    }

</style>

<?php
    include_once("../class/product.php");
    /*
    if(isset($_GET['action'])&&$_GET['action']=="add"){
        
		$id=isset($_GET['id'])?$_GET['id']:'';
		$price=isset($_GET['price'])?$_GET['price']:'';
        

		if(isset($_SESSION['cart'][$id])){

            
			$_SESSION['cart'][$id]['qty']+=1;
		}

		else if($row=product::getByID($id)->fetch_array()){
				$_SESSION['cart'][$row['ProductID']]=array("qty"=>1,"price"=>$price);
			}
			else
				$message="This product is invalid!"; 
        
        //echo $id." ".$_SESSION['cart'][$id]['qty'];

                
    }
    */

    if(isset($_GET['filter'])&&isset($_GET['cate'])){
        $cateList="";

        foreach($_GET['cate'] as $key=>$value){
            $cateList.="'".$value."'".",";
        }

        $cateList=substr($cateList,0,-1);

        $result=product::getListByCateIDs($cateList);
        
    }
    else
        /*
        $re=special::getAll();
        $numSpec=$re->num_rows;
        
        $j=0;
        while($rowSpec=$re->fetch_array()){
            $j++;
            echo "<div class='block-title mb-3'><h3><span>$rowSpec[SpecialName]</span></h3></div>";
        */
            $result=product::getAll();
            $numrow=3;
            //$numrow=ceil(($result->num_rows)/4);

?>

<?php 
    for($i=0;$i<$numrow;$i++){
		$count=0; 
	?>
    
	<div class="row">
		<?php 
            
            while($result && $row=$result->fetch_array()){ 
			$count++;
		?>
		<div class="col-sm-3">
			<div class="card">
                <div class="img-item">
				<a href="index.php?action=detail&id=<?php echo $row[0]?>" title="<?php echo $row['ProductName'] ?>">
                    <?php if($resultDe=product::getAllImg($row[0]))
                            if($rowDe=$resultDe->fetch_array())
                    ?>
					
                    <img class="card-img-top" src=<?php echo "../$row[Image]"?> alt="<?php echo $row['ProductName'] ?>"/>
                    
                </a>
            </div>
				<!--<div class="new-product-label">NEW</div>-->
                
				<div class="card-body">
					<a href="index.php?action=detail&id=<?php echo $row[0]?>"><h5><?php echo $row['ProductName']?></h5></a>
                    <?php 
                        
                        if(isset($_SESSION['cart'][$row[0]])&&
                            product::getAmount($row[0])<=$_SESSION['cart'][$row[0]]['qty']||product::getAmount($row[0])<=0){
                        
                    ?>
                        <div class="price">Hết Hàng</div>
                    <?php 
                        }else{
                    ?>
					<div class="combo-box">
						<button type="button" id="<?php echo $row[0] ?>" class="button-cart" onclick="display()" title="Add to card">
							<div class="button-cart main"><i class="fa fa-cart-plus fa-fw fa-lg"></i></div>
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
                                        <h5><?php echo number_format($price, 0, ',', '.') . '₫'; //"$".$price?></h5>
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
            if($count==4)
                break;
            }
        ?>
	</div>

	<?php }
    /*
        if($j==$numSpec)
            break;
        }
        */

    ?>	
    <?php
        if($result && ceil(($result->num_rows)/4)>$numrow){
    
    ?>
    <div class="div_right">
        <a class="link" href="index.php?position=top&id=6">
            Xem Tất Cả Bánh
        </a>
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
                //price = price.substr(1);
                //alert(price)
                
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
                    //alert(dataResult);

                    var result = $('<div />').append(dataResult).find("#target-content").html();
                    var menu = $('<div />').append(dataResult).find("#menu-top").html();
                    $("#target-content").html(result);
                    
                    //alert(menu);
                    
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
            
        })

    </script>

<!-- <img class="card-img-top" src=<?php //echo "../$row[Image]"?> onmouseover="this.src='<?php //echo '../images/detail/'.$rowDe['Image'] ?>';" onmouseout="this.src='<?php echo '../'.$row['Image']?>' ;" alt="<?php //echo $row['ProductName'] ?>"/>-->