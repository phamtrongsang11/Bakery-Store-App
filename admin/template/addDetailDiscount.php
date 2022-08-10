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

        .formCate select{
            padding: 5px;
            border-radius: 5px;
        }

        .formCate form{
            display: flex;
            flex-direction: column;
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
?>
<body>
    <?php 
        if(isset($_GET['discountid'])){
            $discountid = $_GET['discountid'];
    ?>
    
    <div class="container">
    <div class="block-title mb-3"><h3><span>Chi Tiết Khuyến Mãi</span></h3></div>
            
            <?php

            //unset($_SESSION['receive']);
            if(isset($_GET['act'])&&$_GET['act'] == "add"){
                
                $id=isset($_GET['id'])?$_GET['id']:'';
                $discountid = isset($_GET['discountid'])?$_GET['discountid']:'';

                //echo $discountid;
                
                if(isset($_GET['percent'])){
                    if(isset($_SESSION['discount'][$id])){
                    
                        $_SESSION['discount'][$id]['percent'] = $_GET['percent'];
                        
                    }
                    else{
                        $_SESSION['discount'][$id] = array("percent"=>$_GET['percent']);
                    }
                }
                   
            }
            if(isset($_GET['iddel'])){
                
                unset($_SESSION['discount'][$_GET['iddel']]);
            }

            /*
            if(isset($_SESSION['discount'])){
                foreach($_SESSION['discount'] as $key=>$val){

                    echo "<br>".$key." ".$val['percent'];
                }
            }
            */
            
            
        ?>
        <div class="invoice">
        <div class="formCate">
            
            <fieldset class="new">
                    <legend class="w-auto">Thêm Sản Phẩm Khuyến Mãi</legend>
                    <div>
                        <label for="name">Tên Sản Phẩm</label>
                        <select  id="name" name='name'>
                            <?php 
                            
                               
                                if($result = product::getAll()){
                                while($row = $result->fetch_array()){
                            
                            ?>
                                <option value='<?php echo $row[0]?>'>
                                <?php echo $row['ProductName']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="percent">Phần Trăm Khuyến Mãi</label>
                        <input type='number' id="percent"  name='percent'>
                    </div>
                    
                    <div class="addBtn"> <button type="button" style="margin-top: 10px" class="btn button addline">Thêm Sản Phẩm</button><div>
                    
                </fieldset>

                <form action="index.php?action=discount&idAct=5" method="post">
                    <input type="hidden" name="discountid" id="discountid" value=<?php if(isset($discountid)) echo $discountid ?>>
                    
                    <div class="addBtn"><input type="submit" class="btn button" name="add" value="Xác Nhận"></div>
                    
                </form>

        </div>
        <table class="table" style="text-align: center;">
            <thead>
            <tr>
            <th scope="col">ID</th>
                <th scope="col" style="width: 30%">Tên Sản Phẩm</th>
                <th scope="col">Phần Trăm Khuyến Mãi</th>
                <th scope="col">Hành Động</th>
            </tr>
            </thead>
            <tbody id="bodytable">
                <?php 
                if(isset($_SESSION['discount'])&&isset($discountid)){
                   
                    
                    foreach($_SESSION['discount'] as $key=>$val){
                        if($result = product::getByID($key))
                            if($row = $result->fetch_array()){
                            
                ?>
                    <tr>
                        <td><?php echo $key?></td>   
                        <td><?php echo $row['ProductName'] ?></td>      
                        <td><?php echo $val['percent'] ?></td>     
                        <td><button type='button' class='btn button' 
                        onclick='location.href="index.php?action=discount&discountid=<?php echo $discountid?>&idAct=4&iddel=<?php echo $row[0]?>"'>Xóa</button>
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
<?php 

    }
?>
</body>
<script>
        
        $(document).ready(function(){
            $(".addline").on("click",function(e){
                
                var act="add";
                var id = document.getElementById("name").value;
                var percent = document.getElementById("percent").value;
                var discountid = document.getElementById("discountid").value;
                
               
                //window.location = "index.php?action=receivenote&idAct=2&act="+act+"&id="+id+"&qty="+qty;
                e.preventDefault();
                $.ajax({
                url: "index.php?action=discount&idAct=4",
                type: "GET",
                data: {
                    act: act,
                    percent: percent,
                    id: id,
                    discountid: discountid
                    
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
