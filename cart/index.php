<style>
.tab{
	display: flex;
	flex-direction: column;
	flex-wrap: wrap;
	background-color: #223f5a;
	color: white;
	margin-top: 25px;
	border: 2px solid white;
}
.tab-item{
	display: flex;
	flex-direction: row;
	flex-wrap: nowrap;
	padding: 1%;
}
.tab-item:hover{
	background-color:#17314a;
}
.tab-item-img{
	width: 30%;	
}
.tab-item-img img{
	width: 100%;
	height: 100%;
}
.tab-item-title{
	width: 40%;
	margin-left: 2%;
}
.tab-item-price{
	display: flex;
	flex-direction: column;
	justify-content: flex-end;
	clear: both;
	width: 50%;
	color: white;

}

.tab-item-price input[type="number"]{
	width: 50%;
	font-size: 16px;
	border: 1px solid white;
	border-radius: 3px;
	text-align: right;
}
.discount{
	color: #f64400;
	margin-right: 2%;
	padding: 0 2% 0 2%;
}

.row{
	margin-top: 2.5%;
}

.leftcolumn{
	float: left;
	width: 70%;
}

.rightcolumn{
	float: left;
	width: 30%;
}

.leftcolumn .btn-group{
	width: 100%;
	margin-top: 2%;
}
.btn-group .button{
	display: flex;
	flex-direction: row;
	color: white;
	height: 100%;
	padding: .75rem;
	display: inline-block;
	cursor: pointer;
	font-size: .9rem;
	line-height: 1.2em;
	font-weight: bold;
}
.btn-group .block{
	width: 50%;
}
.btn-group .delete{
	width: 50%;
	display: flex;
	justify-content: flex-end;
}
.block .button{
	background-color: #2b8ae8;
}

.block .button:hover{
	background-color: #4095e8;
}

.delete .button{
	background-color: #db0404;
}

.delete .button:hover{
	background-color: #dc1e1e;
}

.cancelbtn .deletebtn{
	float: left;
	width: 50%;
}


.combo-box{
	width: 100%;
	display: flex;
}

.discount{
	border: 1px solid #f64400;
	color: #f64400;
	margin-right: 2%;
	padding: 0 2% 0 2%;
}

.price{
	display: flex;
	justify-content: flex-end;
	font-size: 20px;
	font-weight: bold;
	color: white;
	width: 100%;
	height: auto;
}
.remove{
	width: auto;
}
.btn-checkout{
	display: flex;
	flex-direction: column;
	justify-content: flex-end;
	clear: both;
	width: 100%;
	color: white;
    margin-top: 25px;
    padding: 30px 30px 26px;
    border-radius: 3px;
    background-image: linear-gradient(
180deg,#223f5a,#17314a);
}

.order-info__head {
    display: flex;
    justify-content: space-between;
    padding-bottom: 11px;
    border-bottom: 2px solid #0075d9;
	font-size: 22px;
}


.order-info__partial {
    display: flex;
    align-items: center;
    padding: 18px 0 13px;
    border-bottom: 1px solid #2a4a67;
	font-size: 20px;

}
.tab-item-price .order-info__partial{
	padding: 10px 0 5px;
	
}

.price-box {
    display: flex;
    align-items: center;
	justify-content: right;
    margin-left: auto;
    font-size: 20px;
    line-height: 1;
    text-align: right;
}


.btn-checkout button{
	font-weight: bold;
	color: white;
	background-color: #01c853;
	margin-top: 5%;
}
.btn-checkout button:hover{
	color: white;
	background-color: #03ec63;	
}
.checkout{
	display: flex;
	flex-direction: column;
	justify-content: flex-end;
	flex-wrap: wrap;
	width: 100%;
}
.checkout span{
	width: 100%;
}
.button-cart{
	width: auto;
	background-color: #223f5a;
	border: none;
	transition: all 0.5s cubic-bezier(.25,.8,.25,1);
}

button:focus{
	outline: none;
}

.button-cart i{
	position: relative;
	width: 100%;
	height: 100%;
	color: white;
}


.noProduct{
	text-align: center;
	font-size: 16px;
	font-weight: bold;
	color: white;
}

.price-box input[type = 'number']{
	padding: 5px;
	border-radius: 5px;
}

@media screen and (max-width: 800px){
.leftcolumn, .rightcolumn{
	width: 100%;
	padding: 0;
}
}
@media screen and (max-width: 800px){
.card-top {
	width: 100%;
	height: 200px;
}
}
@media screen and (max-width: 800px){
.card-top div{
	text-align: center;
	padding-top: 35%;
}
}
		
    
</style>
<div class="container">
    <div class="block-title mb-3"><h3><span>Giỏ Hàng Mua Sắm</span></h3></div>
        <?php 
            include_once("../class/product.php");
            //$product=new product();
            if(isset($_GET['deleteall'])){
                unset($_SESSION['cart']);
            }

			

            

			if(isset($_GET['qty'])&&isset($_GET['idChange'])&&isset($_SESSION['cart'])){
				$id=$_GET['idChange'];
				$qty=$_GET['qty'];
				$qty_ton=product::getAmount($id);
				if($qty_ton>=$qty){
					$_SESSION['cart'][$id]['qty']=$qty;
				}
				else
				
					echo "<script>alert('Sản phẩm trong kho chỉ còn $qty_ton. Vui lòng nhập số lượng khác')</script>";
			 
				
			}

            $totalprice=0;
			$totalamount=0;
            if(isset($_SESSION['cart'])){
                echo "<div class='leftcolumn pr-2'>";
                $listID="";
                foreach($_SESSION['cart'] as $id=>$val){
                    $listID.="'".$id."'".",";
                }
                $listID=substr($listID,0,-1);
				
				
                $result=product::getListByID($listID);
                while($row=$result->fetch_array()){
                    $qty = $_SESSION['cart'][$row['ProductID']]['qty'];
					$price = $_SESSION['cart'][$row['ProductID']]['price'];
                    $subtotal = $qty*$price;
                    $totalprice += $subtotal;
					$totalamount += $qty;
        ?>

        <div id="<?php echo $row[0] ?>" class="tab">
            <div class="tab-item">
                <div class="tab-item-img">
                    <img src=<?php echo "../$row[Image]"?> alt="<?php echo $row['ProductName'] ?>">
                </div>
                <div class="tab-item-title">
                    <h4><?php echo $row['ProductName'] ?></h>
                </div>
                <div class="tab-item-price">

					<div class="order-info__partial">
						<span>Đơn Giá</span>
						<div class="price-box"><?php echo number_format($price, 0, ',', '.') . '₫';	//echo "$".$_SESSION['cart'][$row['ProductID']]['price'] ?></div>
					</div>
					<div class="order-info__partial">
						<span>Số Lượng</span>
						<div class="price-box"> <input type="number" id="qty" value=<?php echo $qty ?>> </div>
					</div>
					<div class="order-info__partial">
						<span>Tổng Phụ</span>
						<div class="price-box"><?php  echo number_format($subtotal, 0, ',', '.') . '₫';	//echo "$$subtotal" ?></div>
					</div>
					
                </div>
                <button type="button" style="margin-bottom: 10%; height: 0;" title="delete product" class="button-cart" onclick="">
                    <div class="button-cart">
                        <a href="index.php?id=1&productID=<?php echo $row[0]?>&position=top&&action=delprocart"><i class="fa fa-trash"></i></a>
                    </div>
                </button>
            </div>
        </div>
        <?php 
            }
        ?>

        <div class="btn-group">
            <div class="block">
                <button type="button" class="btn button" onclick="location.href='index.php'">TIẾP TỤC MUA SẮM</button>
            </div>
            <div class="delete">
                <button type="button" class="btn button" onclick="document.getElementById('del').style.display='block'">XÓA GIỎ HÀNG</button>
                <div id="del" class="modal">
					<form class="modal-content" action="">
						<div class="modal-container" style="color:black; text-align:center">
						<h1>Xóa Giỏ Hàng</h1>
						<p>Bạn có chắc muốn xóa tất cả bánh trong giỏ</p>
						

						<div class="modal-btn">
							<button class="btn button ml-2" id="continue" type="button" onclick="document.getElementById('del').style.display='none'">Hủy</button>
							<button class="btn button ml-2" id="delete" type="button" onclick="location.href='index.php?id=1&position=top&deleteall'">Xác Nhận</button>
						</div>
						</div>
					</form>
                </div>
            </div>
        </div>
        
    </div>
    <div class="rightcolumn">
        <div class="btn-checkout">
            <div class="order-info__head">TÓM TẮT</div>
			<div class="order-info__partial">
				<span>Tổng Số Lượng</span>
				<div class="price-box"><?php echo $totalamount ?></div>
			</div>
			<div class="order-info__partial">
				<span>Tổng tiền</span>
				<div class="price-box"><?php echo number_format($totalprice, 0, ',', '.') . '₫';	//echo "$".$totalprice ?></div>
			</div>
            <button type="button" class="btn" id="checkout" onclick="" >TIẾN HÀNH THANH TOÁN</button>
        </div>
    </div>

<?php 
    }
    else{
?>
<div class="noProduct" style="text-align: center">
    <p>Bạn chưa có bánh nào trong giỏ hàng của mình cả!</p>
    <p>Nhấn <a href="index.php">vào đây</a> để tiến hành mua sắm.</p>
</div>
<?php 

    }
?>
</div>

<script>
	
	$(document).ready(function(){
		var cusid="<?php if(isset($_SESSION['CusID'])) echo $_SESSION['CusID']; else echo "" ?>"
		$("#checkout").on('click',function(){
			if(cusid!=""){
				document.location.href="index.php?action=payment";
			}
			else{

				alert("Quý khách vui lòng đăng nhập trước khi tiến hành thanh toán");
				document.location.href="index.php?id=4&position=top";

			}
		})

		$(".price-box #qty").on('change',function(){
			var qty = $(this).val();
			var id = $(this).parent().parent().parent().parent().parent().attr("id");
			var pattern = "^[1-9][0-9]*$" 
			if(qty.match(pattern))
				document.location.href="index.php?id=1&position=top&idChange="+id+"&qty="+qty;
			else
				alert("Số lượng bạn nhập vào không hợp lệ. Xin hãy nhập lại");

		})
	})
	
</script>