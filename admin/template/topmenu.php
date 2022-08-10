<style>
    .nav-item img{
        height: 40px;
        width: auto;
    }

</style>
<?php include_once("class/employee.php"); ?>
<nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <?php 
                        if(isset($_SESSION['EmpID'])&&$result=employee::getByID($_SESSION['EmpID'])){
                            $row=$result->fetch_array();
                            $img=$row['Image'];
                            $name=$row['EmpName'];
                        }
                    ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <img src="<?php if(isset($img)) echo '../images/employee/'.$img?>">
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><?php if(isset($name)) echo $name ?></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=logout">Đăng Xuất</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>