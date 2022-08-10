

<head>

      
      <script>
        /*
        $(function() {
            
            $( "#nameSearch" ).autocomplete({
                source: '../class/ajax-db-search.php',
            });
         });
         

        $(document).ready(function(){
      
            $('#nameSearch').autocomplete({
                source: "../class/ajax-db-search.php.php",
                minLength: 1,
                select: function(event, ui)
                {
                    $('#nameSearch').val(ui.item.value);
                },
                html: true,
                open: function(event, ui) {
                    $(".ui-autocomplete").css("z-index", 1000);

                }
                
            })
            
            .data('ui-autocomplete')._renderItem = function(ul, item){
                return $("<li class='ui-autocomplete-row'></li>")
                .data(item)
                .append(item.label)
                .appendTo(ul);
            };
    
        });
        */
         
      </script>
   </head>
<style>
    
    .ui-autocomplete{
        background-color: rgb(41, 73, 102);
        max-height: 500px;
        overflow-y: auto;
        overflow-x: hidden;
        width: fit-content;
        padding: 10px;
        
        
    }
    .ui-autocomplete-row{
        width: 100%;
        background-color: rgb(41, 73, 102);
        color: white;
        display: flex;
        padding: 15px;
        border-bottom: 1px solid #3a5f81;
        transition: background-color .3s ease;
        
    }
   

    .ui-autocomplete-row:hover{
        background-color: rgb(23, 49, 74);
    }

    .dropdown-menu div{
        
        width: auto;
    }
    .nav_item .dropdown-menu li:hover{
        width: 100%;
        background-color: #212d3d;
    }
    form{
        margin-block-end: 0em;
    }
    .dropdown-tab{
        display: flex;
        flex-direction: row;
        width:100%;
    }
    .link_cart{
        display: flex;
        align-items: center;
        position: relative;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color .3s ease;
    }
    .header-controls__count {
        position: absolute;
        top: 3px;
        right: 0;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        border: 1px solid #e16565;
        box-shadow: 0 3px 6px 0 rgb(0 0 0 / 8%);
        background-color: #c24343;
        color: #fff;
        font-size: 14px;
        line-height: 25px;
        text-align: center;
    }

    .form-inline input{
        margin-right: 5px;
        width: 50%;
    }

    .input-group{
        width: 40%;
    }
    .btn_search{
        background-color: rgb(50,85,117);;
        color: white;
    }

    .form_search{
        display:flex;
        flex-direction:  row;
        width: 100%;
    }
    .form_search .btn_search{
        color: white;
    }
    .btn_search:hover{
        background-color: blue;
    }
    
</style>
<?php 
    include_once("../class/product.php");
    include_once("../class/review.php");
    include_once("../class/customer.php");

    if(isset($_GET['productID']) && isset($_GET['action']) && $_GET['action'] == "delprocart"){
        unset($_SESSION['cart'][$_GET['productID']]);
        
        $count=0;
        if(isset($_SESSION['cart']))
            foreach($_SESSION['cart'] as $key=>$val)
                $count++;

        if($count==0)
            unset($_SESSION['cart']);
    }
    if(isset($_GET['action'])&&$_GET['action']=="add"){
        
		$id=isset($_GET['id'])?$_GET['id']:'';
		$price=isset($_GET['price'])?$_GET['price']:'';
        

		if(isset($_SESSION['cart'][$id])){

            
			$_SESSION['cart'][$id]['qty']+=1;
		}

		else if($row=product::getByID($id)->fetch_array()){
				$_SESSION['cart'][$row['ProductID']]=array("qty"=>1,"price"=>$price);
			}
			else
				$message="This product is invalid!"; 
        
        //echo $id." ".$_SESSION['cart'][$id]['qty'];

                
    }
    /*
    if(isset($_GET["action"])&&$_GET["action"]=="review"){
        

		$id = isset($_GET['id'])?$_GET['id']:"";
		$idcustomer = isset($_GET['idcustomer'])?$_GET['idcustomer']:"";
		$rating = isset($_GET['rating_data'])?$_GET['rating_data']:"";
		$comment = isset($_GET['user_review'])?$_GET['user_review']:"";
        $time = date('Y-m-d H:i:s');
        
		review::addReview($idcustomer, $id, $rating, $comment, $time);

	}
    */

?>
<nav class="navbar navbar-expand-md">
    <div class="navbar-brand">
        <a href="index.php" style="color: white">MUN BAKERY</a>
    </div>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarCollapse" class="collapse navbar-collapse" >
        <ul class="nav navbar-nav">
            <li class="nav_item">
                <a href="index.php" class="nav-link">Trang Chủ</a>
            </li>	
            
            <li class="nav_item dropdown">
                <a href="#" class="nav-link dropdown-toggle">Danh Mục</a>
                <div class="dropdown-menu" style="width: fit-content">
                    <div class="dropdown-tab">
                        <div  class="dropdown-tab-menu">
                            <h1 class="dropdown-header">Loại Bánh</h1>
                            <ul class="dropdown_block">
                                
                            <?php
                                include_once("../class/category.php");
                                
                                if($result=category::getAll()){
                                    while($row=$result->fetch_array()){
                                        echo "<li><a href='index.php?position=top&id=6&idAction=$row[CategoryID]' 
                                        class='dropdown-item'>$row[Name]</a></li>";

                                    }
                                }
                                
                            ?>
                                
                            </ul>
                        </div>
                        <div class="dropdown-tab-menu" style="border-left: 1px solid white;  ">
                            <h1 class="dropdown-header">Nhà Sản Xuất</h1>
                            <ul class="dropdown_block">
                                
                            <?php
                                include_once("../class/producer.php");
                               if($result=producer::selectAll()){
                                while($row=$result->fetch_array()){
                                    echo "<li><a href='index.php?position=top&id=6&idProd=$row[0]' 
                                    class='dropdown-item'>$row[1]</a></li>";
                                }
                                }
                            ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            
            
            <?php 
                if(isset($_SESSION['CusID']) && ($result=customer::getByID($_SESSION['CusID']))){
                    $cusid=$_SESSION['CusID'];
                   
                   
                        if($row=$result->fetch_array()){
            
            ?>
                <li class="nav_item">
                    <a href="index.php?id=3&position=top" class="nav-link">Đăng Xuất</a>

                </li>
                <li class="nav_item customer">
                    <a href="index.php?id=7&position=top" class="nav-link"><?php echo $row['Fullname'] ?></a>
                </li>
            <?php 
                    }
                }
                else{
            ?>
            
            <li class="nav_item dropdown">
                <a href="#" class="nav-link dropdown-toggle">Người Dùng</a>
                <div class="dropdown-menu" style="width: fit-content">
                    
                        <a href="index.php?id=4&position=top" class='dropdown-item'>Đăng Nhập</a>
                        <a href="index.php?id=5&position=top" class='dropdown-item'>Đăng Ký</a>
                    
                </div>
            </li>
                
               
            <?php
                }
            ?>
             <li class="nav_item link_cart" id="menu-top">
                    <a href="index.php?id=1&position=top" class="nav-link">
                        <i class="fa fa-cart-plus fa-fw fa-lg"></i>
                        <?php 
                            $count=0;
                            if(isset($_SESSION['cart']))
                                $count = count($_SESSION['cart']);

                        ?>
                        <span class="header-controls__count"><?php echo $count ?></span>
                    </a>
                    
            </li>

        </ul>
        
                
            
            <!--<input type="text" name="term" id="term" placeholder="search here...." class="form-control">
            -->   
            
            <div class="input-group ml-auto" >
                <form class="form_search" action="index.php?id=6&position=top" method="post">
                <input type="search" class="form-control" id="term" name="term" placeholder="Tìm kiếm....">
                
                    <div class="input-group-append">
                    <button class="btn btn_search" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                    </div>
                </form>
            </div>
            
     
    </div>
</nav>
<script type="text/javascript">
  $(function() {
      /*
     $( "#term" ).autocomplete({
       source: 'ajax-db-search.php',
     });
     */

    $('#term').autocomplete({
        source: "ajax-db-search.php",
        minLength: 1,
        
        select: function(event, ui)
        {
            $('#term').val(ui.item.value);
        },
        html: true
    })
    
    .data('ui-autocomplete')._renderItem = function(ul, item){

        return $("<li class='ui-autocomplete-row '></li>")
        .data("item.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };
    

  });
</script>
