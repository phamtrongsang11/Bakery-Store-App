
<style>
    #sidebar .sidebar-header img{
        width: 100%;
    }

</style>
<?php 
    include_once("class/employee.php");
    include_once("class/privilege.php");
    include_once("class/catalogue.php");

    if($result=employee::getByID($_SESSION['EmpID'])){;
        if($row=$result->fetch_array()){
            $image=$row['Image'];
            $priv=$row['PrivID'];
            
        }
                    
?>

<nav id="sidebar">
    <div class="sidebar-header">
        <img src="<?php //echo "../images/logo/logo.jpg" ?>">
    </div>

    <ul class="list-unstyled components">
        <h5>MUN BAKERY</h5>
        <?php 
            if($rePriv = privilege::getPriv_Cata($priv)){
                while($rowPriv = $rePriv->fetch_array()){
                    $reCata = catalogue::getbyID($rowPriv['CataID']);
                    if($rowCata = $reCata->fetch_array())
                
        ?>
        <li>
            <a href="index.php?action=<?php echo strtolower($rowCata[2]) ?>"><?php echo $rowCata[1]?></a>
        </li>
        <?php 
                }
            }
        ?>
    </ul>
    <!--
    <ul class="list-unstyled CTAs">
        <li>
            <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
        </li>
        <li>
            <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
        </li>
    </ul>
    -->
</nav>

<?php 
    }

?>