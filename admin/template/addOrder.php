<!DOCTYPE html>
<head>
    <title>JG Game Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/user.css">
    
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    
    <style>
        .order{
            width: 100%;
            display: flex;
            flex-direction: row; 
        }
        .formCate{
            width: 80%;
        }
        .formCate form{
            display: flex;
            flex-direction: column;
        }
        .formCate select{
            padding: 5px;
            border-radius: 5px;
        }
        .formCate div{
            margin-top: 1rem;
            
        }
        .formCate label{
            font-size: 18px;
            margin-right: 0.5rem;
        }
        .formCate input[type="text"], .formCate input[type="number"], .formCate input[type="password"]{
            border: 0;
            outline: 0;
            border-bottom: 1px solid white;
            background-color: #2a4a67;
            width: 100%;
            color:white;
        }
        
        .formCate input[type="number"]:disabled{
            color: white;
        }
        .formCate input[type="text"]:focus{
            outline: none;
        }
        .formCate .addBtn{
            text-align: right;
        }
        .formCate .button{
            margin-top: 0;
            margin-left: 1rem;
        }

        .labelButton{
            text-decoration: none;
            background-color: blue;
            border: 1px solid white;
            padding: 2px;
            font-size: 16px;
            color: white;
        }
        .labelButton:hover{
            background-color: #17314a;
        }
        .img{
            max-width: 100%;
            height: 200px;
        }
        .hidden{
            display: none;
        }
        #divOutput{
            display: none;
        }
        fieldset.new {

            border: 2px solid white !important;
            padding: 0 1.4em 1.4em 1.4em;
            margin: 0 0 1.5em 0;
            
        }


        .table{
            margin-left: 20px;
            margin-right: 20px;
            color: white;
            background-color: #223f5a;
            table-layout:fixed;
            word-wrap: break-word;
            width: 80%;
        }

        .table td{
            overflow: hidden;
            padding-right: 0.2rem;
        }

        .table tbody tr:hover{
            color: white;
            background-color: #2b4f70;
        }
        tr:nth-child(even){
            background-color: #17314a;
        }
        .button{
            background-color: #0075d9;
            color: white;
            border: 1px solid white;
        }
        .button:hover{
            background-color: #005b88;
            color: white;
        }
        .block-title{
            position: relative;
        }
        .block-title:before{
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            border-bottom: #e0e0e0 1px solid;
            content:"";
        }
        .block-title h3{
            position: relative;
            color: white;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        .block-title h3 span{
            background-color: #2a4a67;
            padding: 0 1em 0 0;
        }

    </style>
</head>
<?php 
    include_once("class/product.php");
    include_once("class/order.php");
    include_once("class/customer.php");
?>
<body>
    <div class="container">
    <div class="block-title mb-3"><h3><span>Đơn Hàng</span></h3></div>

            <?php
            //unset($_SESSION['order']);
            if(isset($_GET['act'])&&$_GET['act']=="add"){
                
                $id=isset($_GET['id'])?$_GET['id']:'';

                $cusid=isset($_GET['cusid'])?$_GET['cusid']:'';
                

                $qty_ton = product::getAmount($id);
                

                if($qty_ton < $_GET['qty']){
					echo "Chú Ý: Sản phẩm bạn vừa nhập trong kho chỉ còn $qty_ton. Vui lòng nhập số lượng khác";
				}

				else if($row=product::getByID($id)->fetch_array()){
                    if(isset($_SESSION['order'][$id]))
                        $_SESSION['order'][$id]['qty']+=$_GET['qty'];
                    else
                    $_SESSION['order'][$row['ProductID']]=array("qty"=>$_GET['qty'],"price"=>$row['Price']);
                }
                   
            }
            if(isset($_GET['iddel'])){
                
                unset($_SESSION['order'][$_GET['iddel']]);
            }
            /*
            if(isset($_SESSION['order'])){
                foreach($_SESSION['order'] as $key=>$val){

                    echo "<br>".$key." ".$val['qty']." ".$val['price'];
                }
            }
            */
            if(isset($_GET['customerid'])){
                $cusid = $_GET['customerid'];
            }
            
            if(isset($cusid))
                if($row = customer::getByID($cusid)->fetch_array()){
                    $name=$row['Fullname'];
                    $phone=$row['Phone'];
                    $address=$row['Address'];
                }
                

            

        ?>
        <div class="order">
        <div class="formCate">
            <form action="index.php?action=order&idAct=3" method="post">
                <fieldset class="new">
                    <legend class="w-auto">Thêm Đơn Hàng</legend>
                    <div>
                        <label for="customer">Tên Khách Hàng</label>
                        <select id="customer" name="customer">
                            <?php 
                                include_once("class/customer.php");
                                $result=customer::getAll();
                                while($row=$result->fetch_array()){
                            
                            ?>
                                <option value="<?php echo $row[0]?>" <?php if(isset($cusid)&&$cusid==$row[0]) echo "selected"?>><?php echo $row['Fullname']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <?php 
                        $total = 0;
                        $totalQty = 0;
                        if(isset($_SESSION['order'])){
                            foreach($_SESSION['order'] as $key=>$val){
                                $totalQty += $val['qty'];
                                $subtotal = $val['qty']*$val['price'];
                                $total += $subtotal;
                            }
                        }
                    ?>
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

                    <div>
                        <label for="note">Ghi chú giao hàng</label>
                    </div>
                    <div>
                        <textarea type="text" id="note" name="note"rows='5' cols="50" class="form-control"></textarea>
                    </div>
                    <div>
                        <label for="method">Thanh toán</label>
                        <select id="method" name="method">
                    
                                <option value="Tiền mặt" selected>Tiền mặt</option>
                                <option value="Thẻ ghi nợ">Thẻ ghi nợ</option>
                                <option value="Tín dụng">Tín dụng</option>

                            <?php
                                
                            ?>
                        </select>
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
                        <label for="totalqty">Tổng Số Lượng</label>
                        <input type="number" value="<?php echo $totalQty ?>" id="totalqty" name="totalqty" style="pointer-events:none;">
                    </div>

                    <div>
                        <label for="total">Tổng Tiền</label>
                        <input type="number" value="<?php echo $total ?>" id="total" name="total" style="pointer-events:none;">
                    </div>
                    <div class="addBtn"><input type="submit" class="btn button" name="add" value="Xác Nhận"></div>
                    
                </fieldset>
            </form>
            <fieldset class="new">
                    <legend class="w-auto">Thêm Chi Tiết Đơn Hàng</legend>
                    <div>
                        <label for="productname">Tên Sản Phẩm</label>
                        <select  id="productname" name='productname' onchange="mySelect()">
                            <?php 
                                $result=product::getAll();
                                while($row=$result->fetch_array()){
                            
                            ?>
                                <option value='<?php echo $row[0]?>' id="<?php echo $row['Price']?>">
                                <?php echo $row['ProductName']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                            
                    

                    <div>
                        <label for="quanity">Số Lượng</label>
                        <input type='number' id="quanity"  name='quanity'>
                    </div>
                    
                    <div class="addBtn"> <button type="button" style="margin-top: 10px" class="btn button addline">Thêm Sản Phẩm</button><div>
                    
                </fieldset>


        </div>
        <table class="table" style="text-align: center;">
            <thead>
            <tr>
                
                <th scope="col" style="width: 20%">Tên</th>
                <th scope="col">Đơn Giá</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Tổng phụ</th>
                <th scope="col">Hành Động</th>
            </tr>
            </thead>
            <tbody id="bodytable">
                <?php 
                if(isset($_SESSION['order'])){
                    
                    foreach($_SESSION['order'] as $key=>$val){
                        if($row=product::getByID($key)->fetch_array()){
                            
                ?>
                    <tr>
                        <td><?php echo $row['ProductName'] ?></td>     
                        <td><?php echo number_format($val['price'], 0, ',', '.') . '₫'; //echo $val['price'] ?></td>     
                        <td><?php echo $val['qty'] ?></td>     
                        <td><?php echo number_format($val['qty']*$val['price'], 0, ',', '.') . '₫'; //echo $val['qty']*$val['price'] ?></td> 
                        <td><button type='button' class='btn button' 
                        onclick='location.href="index.php?action=order&&idAct=2&iddel=<?php echo $row[0]?>"'>Xóa</button>
                        </td>
                    </tr>
                <?php 
                        }
                    }
                }
                ?>
            


                
            </tbody>
        </table>   
        </div> 
    
</div>
</body>
<script>
        
        $(document).ready(function(){
            $(".addline").on("click",function(e){
                
                e.preventDefault();
                
                
                var act="add";
                var id=document.getElementById("productname").value;
                var qty=document.getElementById("quanity").value;
                var cusid=document.getElementById("customer").value;


                //window.location = "index.php?action=order&idAct=2&act="+act+"&id="+id+"&qty="+qty+"&cusid"+cusid;
                
                
                $.ajax({
                url: "index.php?action=order&idAct=2",
                type: "GET",
                data: {
                    act: act,
                    qty: qty,
                    cusid: cusid,
                    id: id
                    
                },
                cache: false,
                success: function(dataResult){
                    var result = $('<div />').append(dataResult).find("#target-content").html();
                    $("#target-content").html(result);
                }
                });
                
            
                
            })
            
        })
        $("#customer").change(function(){
        var id=$(this).val();
    
        window.location = "index.php?action=order&action=order&idAct=2&customerid="+id;
    })

    </script>
