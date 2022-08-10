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
        .checkinventory{
            width: 100%;
            display: flex;
            flex-direction: row; 
        }
        .formCate{
            width: 50%;
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
            padding: 5px;
            
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
            color: white;
            background-color: #223f5a;
            table-layout:fixed;
            word-wrap: break-word;
            width: 100%;
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
    include_once("class/employee.php");
?>
<body>
    <div class="container">
    <div class="block-title mb-3"><h3><span>Phiếu Kiểm Kho</span></h3></div>
            
            <?php

            //unset($_SESSION['check']);
            if(isset($_GET['act'])&&$_GET['act'] == "add"){
                
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    if($row = product::getByID($id)->fetch_array()){
                    
                    
                    $qtyWrong = $_GET['qty'] - $row['Amount'];


                    $subvalue = $qtyWrong * $row['Price'];                   
                        

                    
                        $_SESSION['check'][$id]=array("price"=>$row['Price'], "qty"=>$_GET['qty'], "wrongqty"=>$qtyWrong, "subvalue"=>$subvalue);
                    }
                    
                   
                }
            }
            if(isset($_GET['iddel'])){
                
                unset($_SESSION['check'][$_GET['iddel']]);
            }
            /*
            if(isset($_SESSION['check'])){
                foreach($_SESSION['check'] as $key=>$val){

                    echo "<br>".$key." ".$val['qty'];
                }
            }
            */
            

        ?>
        <div class="checkinventory">
        <div class="formCate">
            <form action="index.php?action=checkinventory&idAct=3" method="post">
                <fieldset class="new">
                    <legend class="w-auto">Lập Phiếu Kiểm Kho</legend>
                    <!--
                    <div>
                        <label for="empname">Người Lập</label>
                        <?php 
                            $name = employee::getName($_SESSION['EmpID']);
                        ?>
                        <input type="text"  value="<?php if(isset($name)) echo $name ?>" id="empname" name="empname" style="pointer-events:none;">
                    </div>
        -->

                    <?php 
                        $totalqty = 0;
                        $totalwrongqty = 0;
                        $totalvalue = 0;
                        if(isset($_SESSION['check'])){
                            foreach($_SESSION['check'] as $key=>$val){
                                $totalqty += $val['qty'];

                                $totalwrongqty += abs($val['wrongqty']);

                                if($price = product::getPrice($key)){

                                    $subtotal = $val['wrongqty']*$price;
                                    $totalvalue += abs($subtotal);
                                }
                            }
                        }
                    ?>
                    
                    <div>
                        <label for="totalqty">Tổng Số Lượng</label>
                        <input type="number" value="<?php echo $totalqty ?>" id="totalqty" name="totalqty" style="pointer-events:none;">
                    </div>
                    <div>
                        <label for="totalwrongqty">Tổng Số Lượng Sai Lệch</label>
                        <input type="number" value="<?php echo $totalwrongqty ?>" id="totalwrongqty" name="totalwrongqty" style="pointer-events:none;">
                    </div>
                    <div>
                        <label for="totalvalue">Tổng Giá Trị Sai Lệch</label>
                        <input type="number" value="<?php echo $totalvalue ?>" id="totalvalue" name="totalvalue" style="pointer-events:none;">
                    </div>
                    <div class="addBtn"><input type="submit" class="btn button" name="add" value="Lưu Phiếu"></div>
                    
                </fieldset>
            </form>
            <fieldset class="new">
                    <legend class="w-auto">Chi Tiết Phiếu</legend>
                    <div>
                        <label for="name">Sản Phẩm</label>
                        <select  id="name" name='name'>
                            <?php 
                                if($result = product::getAll())
                                    while($row=$result->fetch_array()){
                            
                            ?>
                                        <option value='<?php echo $row[0]?>'><?php echo $row['ProductName']?></option>
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
                
                <th scope="col">Tên</th>
                <th scope="col">Đơn Giá</th>
                <th scope="col">Số Lượng Thực Tế</th>
                <th scope="col">Số Lượng Tồn</th>
                <th scope="col">Số Lượng Sai Lệch</th>
                <th scope="col">Giá Trị Sai Lệch</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody id="bodytable">
                <?php 
                if(isset($_SESSION['check'])){
                    foreach($_SESSION['check'] as $key=>$val){
                        if($row=product::getByID($key)->fetch_array()){
                            
                ?>
                    <tr>
                        <td><?php echo $row['ProductName'] ?></td>      
                        <td><?php echo number_format($val['price'], 0, ',', '.') . '₫';  //echo $row['Price'] ?></td> 
                        <td><?php echo $val['qty'] ?></td>
                        <td><?php echo $row['Amount'] ?></td>     
                        <td><?php echo $val['wrongqty'] ?></td>
                        <td><?php echo number_format($val['subvalue'], 0, ',', '.') . '₫'; //echo $val['subvalue'] ?></td>
                        <td>
                            <?php 
                                $qtyWrong = $val['wrongqty'];

                                if($qtyWrong > 0)
                                   $status = "Thừa";
                                    
                                else if($qtyWrong == 0)
                                    $status = "Khớp";
                                else 
                                    $status = "Thiếu";

                               $_SESSION['check'][$key]['status'] = $status; 
                               echo $status;

                            
                            ?>
                        </td>  
                        <td><button type='button' class='btn button' 
                        onclick='location.href="index.php?action=checkinventory&&idAct=2&iddel=<?php echo $row[0]?>"'>Xóa</button>
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
                
                var act="add";
                var id=document.getElementById("name").value;
                var qty=document.getElementById("quanity").value;
               
                //window.location = "index.php?action=checknote&idAct=2&act="+act+"&id="+id+"&qty="+qty;
                e.preventDefault();
                $.ajax({
                url: "index.php?action=checkinventory&idAct=2",
                type: "GET",
                data: {
                    act: act,
                    qty: qty,
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
        

    </script>
