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
        
        .formCate form{
            display: flex;
            justify-content: center;
        }

        .formCate div{
            margin-top: 1rem;
            
        }

        .formCate form select{
            width: 250px;
            text-align: center;
            border-radius: 20px;
        }

        .formCate label{
            font-size: 18px;
            margin-right: 0.5rem;
        }
        .formCate input[type="text"], .formCate input[type="number"]{
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
            width: 80%;
            border: 2px solid white !important;
            padding: 0 1.4em 1.4em 1.4em;
            margin: 0 0 1.5em 0;
            
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="block-title mb-3"><h3><span>Nhà Sản Xuất</span></h3></div>
    <div class="formCate">
        <form action="./template/actProducer.php" method="post" enctype="multipart/form-data">
            <fieldset class="new">
                <legend class="w-auto">Thêm Nhà Sản Xuất</legend>
                <div>
                    <label for="name">Tên Nhà Sản Xuất</label>
                    <input type="text" id="name" name="name">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email">
                </div>
                <div>
                    <label for="phone">Số Điện Thoại</label>
                    <input type="text" id="phone" name="phone">
                </div>
                <div>
                    <label for="address">Địa Chỉ</label>
                    <input type="text" id="address" name="address">
                </div>
                <div class="addBtn"><input type="submit" class="btn button" name="add" value="Xác Nhận"></div>
            </fieldset>
        </form>

    </div>
    
    </div>
</body>
