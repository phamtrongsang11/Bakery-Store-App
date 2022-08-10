<?php
if(isset($_GET['add'])&&isset($_GET['name'])){
    include_once("../class/catalogue.php");
    catalogue::add($_GET['name'], $_GET['filename']);   
    header("Location: ../index.php?action=catalogue");
}
?>