
<?php	
    include_once("../class/category.php");
?>
<div class="block-title mb-3"><h3><span>SHOP</span></h3></div>
<div class='leftcolumn'>
	<div class="block-content">
		<div class="expanded" style="margin-top:5px">
			<h5>Category <i class="fa fa-angle-right"></i></h5>
		</div>
        <form action="index.php" method="get">
            <?php
                $result=category::getAll();
                while($row=$result->fetch_array()){
            ?>
            
                <div class='item-left'>
                    <input type="checkbox" id="<?php echo $row[0]?>" name="cate[]" value="<?php echo $row[0]?>">
                    <label for="<?php echo $row[0]?>"><?php echo $row[1]?></label>
                </div>
            <?php
                }
            ?>
            <input type="submit" class="btn button" name="filter" value="Filter">
        </form>
	</div>
	
</div>

			