<style>


.blockUser{
    width: 100%;
    margin-bottom: 30px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}

.blockInfo{
    width: 100%;
    padding: 20px;
    display:flex;
    flex-direction: column;
    background-color: #325575;
    align-items: flex-start;
    justify-content: flex-start;
    
}

.blockInfo div{
    width: 100%;
    display:flex;
    flex-direction: column;
}

.blockInfo .title{
    font-size: 20px;
    margin-bottom: 10px;
}

.billing div{
    text-align: center;
    margin-bottom: 10px;
}

.blockInfo .method{
    padding: 20px;
    display:flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}



div.method_field{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    font-size: 16;
}

.method_field div{
    display: flex;
    flex-direction: row;
    align-items: center;

}


div.card_method, div.bank{
    display: none;
}


div.bank div{
    display:flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
}

.blockInfo label{
    margin-top: 1rem;
    margin-bottom: 0.5rem;
    font-size: 18px;
}
.blockInfo input[type="text"], .formCate input[type="number"]{
    border: 0;
    outline: 0;
    border-bottom: 2px solid white;
    background-color: #325575;
    width: 100%;
    color:white;
}
.blockInfo input[type="text"]:focus{
    outline: none;
}

.blockInfo input[type="radio"]{
    width: 50%;
    height: 20px;
}

form input[type="submit"]{
    background-color: #0075d9;
    color: white;
    border: none;
    text-decoration: none;
    font-size: 18px;
    
}
form input[type="submit"]:hover{
    background-color: #005b88;
}
.labelButton{
    color: white;
    text-decoration: none;
    border: 2px solid #0075d9;
    padding: 2px;
    margin-top: 0.75rem;
    font-size: 16px;
}
.labelButton:hover{
    background-color: #0075d9;
}
.hidden{
    display: none;
}
.item-left a.link-left{
    font-size: 16px;
    color: white;
}
.item-left a.link-left:hover{
    color: #0075d9;
    text-decoration: none;
}
.block-content{
    display: flex;
    flex-direction: column;
    border-radius: 3px;
    background-image: linear-gradient(180deg,#223f5a,#17314a);
    overflow: hidden;
}

.order-info_img{
    width: 20%;
}
.order-info_img img{
	width: 100%;
	height: 100%;
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
	width: 60%;
}

.rightcolumn{
	float: left;
	width: 40%;
}



.containerr {
	padding: 16px;
	text-align: center;
}
.cancelbtn .deletebtn{
	float: left;
	width: 50%;
}
.modal{
	display: none;
	position: fixed;
	z-index: 1;
	left: 0;
	top: 0;
	width: 50%;
	height: 60%;
	overflow: auto;;
	margin-top: 10%;
	margin-left: 25%;
}
.modal-content{
	background-color: #fefefe;
	margin: 5% auto 15% auto;
	border: 1px solid #888;
	width: 80%;
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
	font-size: 20px;
    flex-direction: row;
}


.order-info__partial {
    display: flex;
    align-items: center;
    padding: 18px 0 13px;
    border-bottom: 1px solid #2a4a67;
	font-size: 18px;
    flex-direction: row;
}

.price-box {
    display: flex;
    align-items: center;
    margin-left: auto;
    font-size: 18px;
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



    
</style>
<div class="container">
    <div class="block-title mb-3"><h3><span>Xin Cảm Ơn Quý Khách Đã Mua Hàng</span></h3></div>
        <?php
            include_once("../class/order.php");
            
            if(isset($_GET['orderid'])){
            $id=$_GET['orderid'];
            
            if($row=order::getByID($id)->fetch_array()){

                    $phone=$row['Phone'];
                    $address=$row['Address'];
                    $method=$row['PayMethod'];
                    $total=$row['Total'];
                }
            }
        ?>
        <div class="blockUser">

            <div class="blockInfo" style="margin-right: 20px;">
                
                   <div class="title">Thông Tin Giao Hàng</div>
                   <div class="billing">
                        <div><?php if(isset($phone)) echo $phone ?></div>
                        <div><?php if(isset($address)) echo $address ?></div>
                    </div>


                
            </div>
            <div class="blockInfo">
                
                   <div class="title">Thông Tin Thanh Toán</div>
                   <div class="method">
                        <div><?php if(isset($method)) echo $method ?></div>
                        <div><?php if(isset($total)) echo number_format($total, 0, ',', '.') . '₫';  //echo "$".$total ?></div>
                    </div>


                
            </div>
        </div>



            <div class="btn-checkout">
                <div class="order-info__head">
                    <span>Tên Bánh</span>
                    <span>Tổng Phụ</span>
                </div>

                <?php 
                    include_once("../class/product.php");
                    $totalprice=0;
                    $totalamount=0;
                    if(isset($_SESSION['cart'])){
                        $listID="";
                        foreach($_SESSION['cart'] as $id=>$val){
                            $listID.="'".$id."'".",";
                        }
                        $listID=substr($listID,0,-1);
                        
                        $result=product::getListByID($listID);
                        while($row=$result->fetch_array()){
                            $qty=$_SESSION['cart'][$row['ProductID']]['qty'];
                            $price = $_SESSION['cart'][$row['ProductID']]['price'];
                            $subtotal=$qty*$price;
                            $totalprice+=$subtotal;
                            $totalamount+=$qty;
                    
                ?>

                <div class="order-info__partial">
                    <div class="order-info_img">
                        <img src=<?php echo "../$row[Image]"?> alt="<?php echo $row['ProductName'] ?>">
                    </div>
                    <div class="price-box" style="text-align: center;">
                        <?php echo $row['ProductName'] ?>
                    </div>
                    <div class="price-box"><?php echo $qty?></div>
                    <div class="price-box"><?php echo number_format($subtotal, 0, ',', '.') . '₫';  //echo "$$subtotal"?></div>
                </div>

                <?php 
                        }
                ?>
                <div class="order-info__partial">
                    <span>Tổng Số Lượng</span>
                    <div class="price-box"><?php echo $totalamount ?></div>
                </div>
                <div class="order-info__partial">
                    <span>Tông Tiền</span>
                    <div class="price-box"><?php echo number_format($totalprice, 0, ',', '.') . '₫';  //echo "$".$totalprice ?></div>
                </div>
            </div>

        
    </div>
 
<?php 
    unset($_SESSION['cart']);
    }
?>
</div>

