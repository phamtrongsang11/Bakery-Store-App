<style>

.blockUser form{
    width: 100%;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.blockInfo{
    width: 90%;
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

.blockInfo .bidding{
    display:flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
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
.blockInfo input[type="text"], .formCate input[type="number"], .formCate input[type="date"]{
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

form select{
    padding: 5px;
    border-radius: 5px;
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
    width: 40%;
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
    text-align: center;
    padding: 5px;
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
.error{
    color: #f74343;
    font-size: 14px;
    margin: 0;
}



    
</style>
<div class="container">
    <div class="block-title mb-3"><h3><span>THANH TOÁN</span></h3></div>
    <div class="leftcolumn">
        <?php
            include_once("../class/customer.php");
            include_once("../class/banking.php");
            include_once("../class/order.php");
            if(isset($_SESSION['CusID'])&&isset($_GET['bind'])){

            //$result=customer::getByID($_SESSION['CusID']);
            
            if($row=customer::getByID($_SESSION['CusID'])->fetch_array()){
                    $name=$row['Fullname'];
                    $phone=$row['Phone'];
                    $address=$row['Address'];
                }
            }
        ?>
        <div class="blockUser">
        <form class="form-horizontal" action="index.php?action=saveorder" onsubmit="return formValidation();" method="post">

            <div class="blockInfo">
                    <div class="bidding">
                        <div  style="height:fit-content; width:fit-content"><input type="checkbox" name="bind" 
                        value="bind" <?php if(isset($_GET['bind'])) echo "checked" ?>></div>
                        
                        <label for="bind" style="margin-left: 5px">Thông tin giao hàng như thông tin tài khoản người dùng</label>

                    </div>
                    <div>
                        <label for="name">Tên người nhận</label>
                        <input id="name" name="name" type="text" value="<?php if(isset($name)) echo $name?>">
                    </div>
                
                    <div>
                        <label for="date">Ngày nhận</label>
                        <input id="date" name="date" type="date">
                    </div>
                    <div class="error" id="dateErr"></div>
                   

                    <div>
                        <label for="phone">Số điện thoại</label>
                        <input id="phone" name="phone" type="text" value="<?php if(isset($phone)) echo $phone?>">
                    </div>
                    <div class="error" id="phoneErr"></div>
                    
                    <div>
                        <label for="address">Địa chỉ</label>
                        <input id="address" name="address" type="text" value="<?php if(isset($address)) echo $address?>">
                    </div>
                    <div class="error" id="addressErr"></div>
                    <div>
                        <label for="note">Ghi chú giao hàng</label>
                    </div>
                    <div>
                        <textarea type="text" id="note" name="note"rows='5' cols="50" class="form-control"></textarea>
                    </div>
                    <div>
                        <label for="hvc">Hãng vận chuyển</label>
                        <select id="hvc" name="hvc">
                            <?php 
                                
                                if($resultHVC = order::getAllHangVC())
                                    while($rowHVC = $resultHVC->fetch_array()){
                                
                            
                            ?>
                                <option value="<?php echo $rowHVC[0]?>"><?php echo $rowHVC[1]?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="method">Phương thức thanh toán</label>
                        <div class="method_field">
                            <div>
                                <label for="method">Thẻ ghi nợ</label>
                                <input type="radio" name="method" value="Thẻ ghi nợ">

                            </div>
                            <div>
                                <label for="method">Tín dụng</label>
                                <input type="radio" name="method" value="Tín dụng" >

                            </div>
                            <div>
                                <label for="method">Tiền mặt</label>
                                <input type="radio" name="method" value="Tiền mặt" checked>

                            </div>
                        </div>
                    </div>
                    <div class="bank" id="bank">
                        <?php 
                            if($result=banking::getAll()){
                            while($rowB=$result->fetch_array()){
                        
                        ?>
                        <div>
                            <input type="radio" name="bank" value="<?php echo $rowB[0]?>">
                            <label for="bank"><?php echo $rowB[1]?></label>
                            
                        </div>
                        <?php 
                            }
                        }
                        ?>
                    </div>
                    <div class="card_method" id="credit">
                        <div>
                            <label for="cardname">Tên thẻ</label>
                            <input id="cardname" name="cardname" type="text" value="<?php if(isset($name)) echo $name?>">
                        </div>
                        <div class="error" id="fullnameErr"></div>

                        <div>
                            <label for="cardnumber">Số thẻ</label>
                            <input id="cardnumber" name="cardnumber" type="text" value="<?php if(isset($phone)) echo $phone?>">
                        </div>
                        <div class="error" id="phoneErr"></div>
                    </div>
    
                   


                
            </div>
            <div class="right" style="display: block">
                    <input type="submit" style="padding: 10px; margin-top: 1.5rem" name="order" value="Đặt hàng">
                </div>
            </form>
        </div>


        </div>
        <div class="rightcolumn">
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
                    <div class="price-box">
                        <?php echo $row['ProductName'] ?>
                    </div>
                    <div class="price-box"><?php echo $qty?></div>
                    <div class="price-box"><?php echo number_format($subtotal, 0, ',', '.') . '₫'; //echo "$$subtotal"?></div>
                </div>

                <?php 
                        }
                ?>
                <div class="order-info__partial">
                    <span>Tổng Số Lượng</span>
                    <div class="price-box"><?php echo $totalamount ?></div>
                </div>
                <div class="order-info__partial">
                    <span>Tổng Tiền</span>
                    <div class="price-box"><?php echo number_format($totalprice, 0, ',', '.') . '₫'; //echo "$".$totalprice ?></div>
                </div>
            </div>
        </div>

        
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
				document.location.href="index.php?action=delivery_info";
			}
			else{

				alert("Please login before process to checkout");
				document.location.href="index.php?id=4&position=top";

			}
		})
        
	});
	
    $('input[type=radio][name=method]').change(function() {
    if (this.value == 'Thẻ ghi nợ') {
        document.getElementById("bank").style.display="block";
        document.getElementById("credit").style.display="none";
        
    }
    else if (this.value == 'Tín dụng') {
        document.getElementById("credit").style.display="block";
        document.getElementById("bank").style.display="none";
    }
    else if (this.value == 'Tiền mặt') {
        document.getElementById("credit").style.display="none";
        document.getElementById("bank").style.display="none";
    }
    });
    $('input[type=checkbox][name=bind]').change(function(){
       
        document.location.href="index.php?action=payment&bind=true";
    });

            var date=document.getElementById("date");
			
			var address=document.getElementById("address");

			var phone=document.getElementById("phone");

			var dateErr=document.getElementById("dateErr");

			var addressErr=document.getElementById("addressErr");

			var phoneErr=document.getElementById("phoneErr");
				
			
		
		function formValidation(){
			if(!dateValidation()||!phoneValidation()||!addressValidation())
				return false;
			return true;
		}
		
		
		
		function phoneValidation(){
			var error="";
			var phonecheck=/^0[3,5,7,9](\d{8}|\d{9})/;

			if(phone.value.length==0){
				error="Bạn chưa nhập số điện thoại";
			}
			else if(!phone.value.match(phonecheck)){
				error="Số điện thoại không hợp lệ";
			}
			phoneErr.innerHTML=error;
			if(error!=""){
				phone.focus();
				return false;
			}
			return true;
		}

        function addressValidation(){
			var error="";
			var length=address.value.length;
			if(length==0){
				error="Xin hãy nhập địa chỉ";
			}
			addressErr.innerHTML=error;
			if(error!=""){
				address.focus();
				return false;
			}
			return true;
		}
		
        function dateValidation(){
			var error="";
			var length = date.value.length;
			if(length == 0){
				error="Xin hãy chọn ngày nhận hàng";
			}
			dateErr.innerHTML=error;
			if(error!=""){
				date.focus();
				return false;
			}
			return true;
		}

</script>