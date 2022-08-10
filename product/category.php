<style>
.containt_cate{
    width: 100%;
    height: fit-content;
}
.containt_cate_row{
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    margin-bottom: 20px;

}


.cate_item{
    width: 30%;
    height: auto;
    margin: 20px;
}

.cate_item img:hover{
    border: 2px solid #0075d9;
}

.cate_title{
    text-align: center;
}
.cate_item a{
    text-decoration: none;
    color: white;
    font-size: 18px;
}

.cate_item a:hover{
    color: rgba(197,228,255);
    
}


.cate_item img{
    width: 100%;
    border-radius: 10px;
    height: auto;

}
</style>

<?php 

include_once("../class/category.php");
    if($reCate = category::getAll()){
        $numRow=ceil(($reCate->num_rows)/3);
?>

<div class="block-title">
	<h3><span>Loại Bánh</span></h3>
</div>
    <div class="containt_cate">
        <?php 
        for($i=0; $i < $numRow; $i++){
            $count = 0; 
            echo "<div class='containt_cate_row'>";

            while($rowCate = $reCate->fetch_array()){
                $count++;

        ?>
            
                <div class="cate_item">
                    <a href="index.php?position=top&id=6&idAction=<?php echo $rowCate['CategoryID']?>"><img src="<?php echo "../images/category/$rowCate[Image]" ?>" >
                    <div class="cate_title"><?php echo "$rowCate[Name]" ?></div>
                    </a>
                </div>
          
            <?php
                if($count == 4) break;
                }
                echo "</div>";
            }
            ?>    

    </div>


<?php 

    }
?>