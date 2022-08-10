<!DOCTYPE html>
<head>
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
    .table{
        color: white;
        background-color: #223f5a;
        table-layout:fixed;
        word-wrap: break-word;
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
    include_once("class/category.php");
    if(isset($_GET['id'])){
        category::delete($_GET['id']);
    }

?>
<body>
    <div class="container">
    <div class="block-title mb-3"><h3><span>Loại Sản Phẩm</span></h3></div>
    <button type='button' class='btn button mb-3' 
                    onclick='location.href="index.php?action=category&idAct=1"'>Thêm Loại</button>
    </div>
    <div>
        <table class="table" style="text-align: center;">
        <thead>
        <tr>
            <th scope="col" style="width: 5%">ID</th>
            <th scope="col">Hình Ảnh</th>
            <th scope="col">Tên Loại</th>
            <th scope="col">Mô Tả</th>
            <th scope="col">Hành Động</th>
        </tr>
        </thead>
        <tbody>
        <?php   
            include_once("class/category.php");
            $result=category::getAll();
            if($result){
            while($row=$result->fetch_array()){
            ?>
                <tr>
                    <td><?php echo $row[0] ?></td>
                    <td><img src=<?php echo "../images/category/$row[Image]"?> alt="<?php echo $row['Name'] ?>" 
                class="img-fluid rounded"></td>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td>
                    <div class='btn-group'>
                        <button type='button' class='btn button' 
                        onclick='location.href="index.php?action=category&idAct=2&id=<?php echo $row[0]?>"'>Sửa</button>
                        <button type='button' class='btn button' 
                        onclick='location.href="index.php?action=category&id=<?php echo $row[0]?>"'>Xóa</button>
                    </div>
                    </td>
                </tr>
        <?php   
            }
        
        ?>
        </tbody>
        </table>
    </div>
    <?php 
        }
    
    ?>
    </div>

</body>