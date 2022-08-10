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
        .invoice{
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
        .formCate input[type="date"]{
            padding: 5px;
        
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
    include_once("class/employee.php");
?>
<body>
    <div class="container">
    <div class="block-title mb-3"><h3><span>Phiếu Nhập Kho</span></h3></div>
            
            <?php
            if(isset($_GET['producerid'])){
                $producerid=$_GET['producerid'];
                //echo $producerid;
            }

            //unset($_SESSION['receive']);
            if(isset($_GET['act'])&&$_GET['act']=="add"){
                
                $id=isset($_GET['id'])?$_GET['id']:'';
                $producerid=isset($_GET['producerid'])?$_GET['producerid']:'';
                if(isset($_SESSION['receive'][$id])){
                    $_SESSION['receive'][$id]['qty']+=$_GET['qty'];
                    
                }
                else{
                    $_SESSION['receive'][$id]=array("qty"=>$_GET['qty'],"cost"=>$_GET['cost'],"expiration"=>$_GET['expiration']);
                }
                   
            }
            if(isset($_GET['iddel'])){
                
                unset($_SESSION['receive'][$_GET['iddel']]);
            }
            /*
            if(isset($_SESSION['receive'])){
                foreach($_SESSION['receive'] as $key=>$val){

                    echo "<br>".$key." ".$val['qty'];
                }
            }
            */
            

        ?>
        <div class="invoice">
        <div class="formCate">
            <form action="index.php?action=receivenote&idAct=3" method="post">
                <fieldset class="new">
                    <legend class="w-auto">Lập Phiếu Nhập</legend>
                    <div>
                        <label for="producername">Tên Nhà Sản Xuất</label>
                        <select id="producername" name="producername">
                            <?php 
                                include_once("class/producer.php");
                                $result=producer::selectAll();
                                while($row=$result->fetch_array()){
                            
                            ?>
                                <option value="<?php echo $row[0]?>" <?php if(isset($producerid)&&$producerid==$row[0]) echo "selected"?>><?php echo $row[1]?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <?php 
                        $totalqty=0;
                        $totalcost=0;
                        if(isset($_SESSION['receive'])){
                            foreach($_SESSION['receive'] as $key=>$val){
                                $totalqty+=$val['qty'];
                                $subtotal=$val['qty']*$val['cost'];
                                $totalcost+=$subtotal;
                            }
                        }
                    ?>
                    
                    <div>
                        <label for="totalqty">Tổng Số Lượng</label>
                        <input type="number" value="<?php echo $totalqty ?>" id="totalqty" name="totalqty" style="pointer-events:none;">
                    </div>
                    <div>
                        <label for="totalcost">Tổng Tiền</label>
                        <input type="number" value="<?php echo $totalcost ?>" id="totalcost" name="totalcost" style="pointer-events:none;">
                    </div>
                    <div class="addBtn"><input type="submit" class="btn button" name="add" value="Lưu Phiếu"></div>
                    
                </fieldset>
            </form>
            <fieldset class="new">
                    <legend class="w-auto">Lập Chi Tiết Phiếu Nhập</legend>
                    <div>
                        <label for="name">Product Name</label>
                        <select  id="name" name='name'>
                            <?php 
                            
                                if(isset($producerid)&&$result=product::getByProducerID($producerid))
                                    $check=1;
                                else
                                    $result=product::getAll();
                                while($row=$result->fetch_array()){
                            
                            ?>
                                <option value='<?php echo $row[0]?>'>
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
                    <div>
                        <label for="cost">Đơn Giá</label>
                        <input type='number' id="cost"  name='cost'>
                    </div>
                    <div>
                        <label for="expiration">Hạn Sử Dụng</label>
                        <input type='date' id="expiration"  name='expiration'>
                    </div>
                    
                    <div class="addBtn"> <button type="button" style="margin-top: 10px" class="btn button addline">Thêm Sản Phẩm</button><div>
                    
                </fieldset>


        </div>
        <table class="table" style="text-align: center;">
            <thead>
            <tr>
                
                <th scope="col">Tên</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Đơn Giá</th>
                <th scope="col" style="width: 20%">Hạn Sử Dụng</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody id="bodytable">
                <?php 
                 if(isset($_SESSION['receive'])){
                    foreach($_SESSION['receive'] as $key=>$val){
                        if($row=product::getByID($key)->fetch_array()){
                            
                ?>
                    <tr>
                        <td><?php echo $row['ProductName'] ?></td>      
                        <td><?php echo $val['qty'] ?></td>     
                        <td><?php echo $val['cost'] ?></td>     
                        <td><?php echo $val['expiration'] ?></td>   
                        <td><button type='button' class='btn button' 
                        onclick='location.href="index.php?action=receivenote&&idAct=2&iddel=<?php echo $row[0]?>"'>Xóa</button>
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
                var cost=document.getElementById("cost").value;
                var expiration=document.getElementById("expiration").value;
                var producerid=document.getElementById("producername").value;
                
                //window.location = "index.php?action=receivenote&idAct=2&act="+act+"&id="+id+"&qty="+qty;
                e.preventDefault();
                $.ajax({
                url: "index.php?action=receivenote&idAct=2",
                type: "GET",
                data: {
                    act: act,
                    qty: qty,
                    cost: cost,
                    expiration: expiration,
                    producerid: producerid,
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
        $("div #producername").change(function(){
        var id=$(this).val()
        window.location = "index.php?action=receivenote&idAct=2&producerid="+id;
    })

    </script>
