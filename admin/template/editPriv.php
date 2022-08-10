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
            margin-top: 20px;
        }
        .formCate form{
            display: flex;
            justify-content: center;
        }
        .formCate div{
            margin-left: 2rem;
            
        }
        .formCate label{
            font-size: 18px;
            margin-right: 0.5rem;
        }
        .formCate input[type="text"]{
            border: 0;
            outline: 0;
            border-bottom: 1px solid white;
            background-color: #2a4a67;
            color:white;
        }
        .formCate input[type="text"]:focus{
            outline: none;
        }

        .formCate .button{
            margin-top: 0;
            margin-left: 1rem;
        }

        .formCate .addBtn{
            text-align: right;
        }


        .block_priv{
            margin-left: 0;
            display: flex;
            flex-direction: column;
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
        .row_priv{
            margin-bottom: 10px;
            display: flex;
            flex-direction: row;
        }
        .item_priv{
            padding: 10px;
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
    <?php 
        
        if(isset($_GET['id'])){
            include_once("class/privilege.php");
            $result=privilege::getbyID($_GET['id']);
            if($row=$result->fetch_array()){
                $id=$row[0];
                $name=$row[1];
            }
        }
    ?>
    <div class="container">
    <div class="block-title mb-3"><h3><span>Quyền</span></h3></div>
    <div class="formCate">
        <form  action="template/actPriv.php?id=<?php echo $id ?>" method="post">
        <fieldset class="new">
                <legend class="w-auto">Cập Nhật Quyền</legend>
            <div style="margin-left: 0; margin-bottom: 20px">
                <label for="name">Tên Quyền</label>
                <input type="text" id="name" name="name" value="<?php if(isset($name)) echo $name ?>">
            </div>
            <div style="margin-left: 0; margin-bottom: 20px" class="block_priv">
            <label>Danh Mục Chức Năng Thao Tác</label>
                <?php 
                    include_once("class/catalogue.php");
                    $result=catalogue::getAll();
                    
                    
                    if($result){
                    $num = ceil(($result->num_rows)/5);
                    for($i = 0; $i < $num; $i++){
                        $count = 0; 
                        echo "<div class='row_priv'>";
                    while($row=$result->fetch_array()){
                        $check = privilege::checkPriv($id,$row[0]);
                        $count++;
                ?>
                <div class="item_priv">
                    <input type="checkbox" class="custom-control-input" id="<?php echo $row[1] ?>" <?php if($check) echo "checked"?> name="cata[]" value="<?php echo $row[0] ?>">
                    <label class="custom-control-label" for="<?php echo $row[1] ?>"><?php echo $row[1] ?></label>
                </div>
                <?php 
                    if($count==5)
                        break;
                    }
                    echo "</div>";
                    }
                    }
                ?>
            </div>
            <div class="addBtn"><input style="margin-left: 0" type="submit" class="btn button " name="edit" value="Xác Nhận"></div>
        </fieldset>
        </form>
        

    </div>

    

    </div>
</body>