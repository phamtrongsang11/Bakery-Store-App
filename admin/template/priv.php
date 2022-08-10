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
            flex-direction: row;
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
        .button{
            background-color: #0075d9;
            color: white;
            border: 1px solid white;
        }
        .button:hover{
            background-color: #005b88;
            color: white;
        }
    </style>
</head>
<?php 
    include_once("class/privilege.php");

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        privilege::delete($id);
        privilege::deletePriv_Cata($id);
    }
    

?>
<body>
    <div class="container">
    <div class="block-title mb-3"><h3><span>Quyền</span></h3></div>
    <div style="margin-bottom: 10px">
    <button type='button' class='btn button' 
                    onclick='location.href="index.php?action=privilege&idAct=1"'>Thêm Quyền</button>
    </div>
    <div>
        <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên Quyền</th>
            <th scope="col">Hành Động</th>
        </tr>
        </thead>
        <tbody>
        <?php   
            $result=privilege::getAll();
            if($result){
            while($row=$result->fetch_array()){
            ?>
                <tr>
                    <td><?php echo $row[0] ?></td>
                    <td><?php echo $row[1] ?></td>
                    <td>
                    <div class='btn-group'>
                    <button type='button' class='btn button' 
                        onclick='location.href="index.php?action=privilege&idAct=0&id=<?php echo $row[0]?>"'>Chi Tiết</button>
                        <button type='button' class='btn button' 
                        onclick='location.href="index.php?action=privilege&idAct=2&id=<?php echo $row[0]?>"'>Sửa</button>
                        <button type='button' class='btn button' 
                        onclick='location.href="index.php?action=privilege&id=<?php echo $row[0]?>"'>Xóa</button>
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