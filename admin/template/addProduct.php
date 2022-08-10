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
        
        .formCate{
            display: flex;
            justify-content: center;
        }
        .formCate form{
            width: 700px;
        }
        .formCate form select{
            width: 250px;
            text-align: center;
            border-radius: 20px;
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
            background-color: #0075d9;
            border: 1px solid white;
            padding: 0.375rem 0.75rem;
            font-size: 16px;
            color: white;
        }
        .labelButton:hover{
            background-color: #005b88;
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
            width: 100%;
            border: 2px solid white !important;
            padding: 0 1.4em 1.4em 1.4em;
            margin: 0 0 1.5em 0;
            
        }
    </style>
</head>
<?php 
    
?>
<body>
    <div class="container">
    <div class="block-title mb-3"><h3><span>Sản Phẩm</span></h3></div>
    <div class="formCate">
        <form action="./template/actAddProduct.php" method="post" enctype="multipart/form-data">
            <fieldset class="new">
                <legend class="w-auto">Thêm Sản Phẩm</legend>
                <div>
                    <label for="name">Tên Sản Phẩm</label>
                    <input type="text" id="name" name="name" >
                </div>
                <div>
                    <label for="cate">Loại Sản Phẩm</label>
                    <select id="cate" name="cate">
                        <?php
                            include_once("class/category.php");
                            $result=category::getAll();
                            while($row=$result->fetch_array()){
                        
                        ?>
                            <option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="prod">Nhà Sản Xuất</label>
                    <select id="prod" name="prod">
                        <?php
                            include_once("class/producer.php");
                            $result=producer::selectAll();
                            while($row=$result->fetch_array()){
                        
                        ?>
                            <option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="weight">Khối Lượng</label>
                    <input type="number" id="weight" name="weight">
                </div>
                <div>
                    <label for="ser">Khẩu Phần</label>
                    <input type="number" id="ser" name="ser">
                </div>
                <div>
                    <label for="calory">Calo</label>
                    <input type="number" id="calory" name="calory">
                </div>
                <div>
                    <label for="ing">Thành Phần</label>
                </div>
                <div>
                    <textarea type="text" class="form-control" id="ing" name="ing"rows='6' cols="70" ></textarea>
                </div>
                <div>
                    <label for="des">Mô Tả</label>
                </div>
                <div>
                    <textarea type="text" class="form-control" id="des" name="des"rows='6' cols="70" ></textarea>
                </div>
                        
                <div>
                    <label for="amount">Số Lượng</label>
                    <input type="number" id="amount" name="amount">
                </div>
                        
                <div>
                    <label for="cost">Giá Gốc</label>
                    <input type="number" step="0.01" id="cost" name="cost">
                </div>
                <div>
                    <label for="profit">Phần Trăm Lợi Nhuận</label>
                    <input type="number" step="0.01" id="profit" name="profit" onblur="calculateCost()">
                </div>
                <div>
                    <label for="price">Đơn Giá</label>
                    <input type="number" step="0.01" id="price" name="price" readonly>
                </div>
                <div style="margin-top: 2rem;">
                    <label for="images">Hình Ảnh</label>
                    <input type="file" name="images" id="images" onchange="loadFile(event)" class="hidden">
                    <label for="images" class="labelButton" style="font-size: 16px; font-weight: normal">Chọn Tệp</label>
                    <div id="divOutput">
                        <img id="output" class="img">
                    </div>
                </div>
                <div class="addBtn"><input type="submit" class="btn button" name="add" value="Xác Nhận"></div>
            </fieldset>
        </form>

    </div>
    
    </div>
</body>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        document.getElementById('divOutput').style.display="block";
        output.style.height='200px';
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src);
        }
    };
    function calculateCost() {
        var cost = document.getElementById('cost');
        var profit = document.getElementById('profit');
        document.getElementById('price').value = parseFloat(cost.value) + 
        (parseFloat(cost.value) * parseFloat(profit.value)) / 100;
    }


</script>