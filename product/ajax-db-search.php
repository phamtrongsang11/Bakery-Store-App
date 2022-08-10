<?php 

    include_once("../class/product.php");
    if (isset($_GET['term'])) {
        $name=$_GET['term'];
        
        $result = product::getByName($name);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_array()) {
                $temp_array = array();
                $temp_array['value'] = $row['ProductName'];
                
                $temp_array['label'] = '<img src="../'.$row['Image'].'" width="120" height="100" />&nbsp;&nbsp;&nbsp;'.$row['ProductName'].'';
                
                //$res[] = $row['ProductName'];
                $res[] = $temp_array;
            }
        } 
        
 
        echo json_encode($res);
     }

?>