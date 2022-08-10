<?php 
    include_once("../class/product.php");
    if(isset($_POST['add'])&&isset($_POST['name'])){
        $name=$_POST['name'];
        $cateid=$_POST['cate'];
        $prodid=$_POST['prod'];
        $weight=$_POST['weight'];
        $ser=$_POST['ser'];
        $calory=$_POST['calory'];
        $ing=$_POST['ing'];
        $des=$_POST['des'];
        $amount=$_POST['amount'];
        $cost=$_POST['cost'];
        $profit=$_POST['profit'];
        $price=$_POST['price'];

        $filename=$_FILES["images"]["name"];
        $tempname=$_FILES["images"]["tmp_name"];
        $folder="/dashboard/bakery/images/$filename";
        
        $maxsize=16777216;
        $allowtypes=array('jpg','jpeg','png');
        $filetype=pathinfo($folder,PATHINFO_EXTENSION);
        $allow=1;
        if (!in_array($filetype,$allowtypes))
        {
            echo "your's type file must be jpg, jpeg, png";
            $allow=0;
        }

        if($_FILES["images"]["size"]>=$maxsize){
            echo "can't upload file larger than 2mb";
            $allow=0;
        }

        $fname="";
        if($allow==1){
            if (!move_uploaded_file($tempname, $_SERVER['DOCUMENT_ROOT'].$folder)){
                echo "Failed to upload image";
            }
            else{
                $fname="images/".$filename;
            }
        }
        
        $prod=new product($cateid,$prodid,$name,$weight,$ser,$calory,$ing,$des,$amount,$fname,$cost,$profit,$price);
        product::insert($prod);
        header("Location:../index.php?action=product");

    }


?>