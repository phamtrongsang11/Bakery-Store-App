<?php
    include_once("../class/category.php");
    if(isset($_POST['add'])){

        $name = $_POST['name'];
        $des = $_POST['des'];

        $filename=$_FILES["images"]["name"];
        $tempname=$_FILES["images"]["tmp_name"];
        $folder="/dashboard/bakery/images/category/$filename";
        
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
                $fname=$filename;
            }
        }

        $cate=new category($name,$des,$fname);
        $cate=category::add($cate);
        header("Location: ../index.php?action=category");
    }
    else if(isset($_POST['edit'])&&isset($_GET['id'])){

        $id=$_GET['id'];
        
        $name = $_POST['name'];
        $des = $_POST['des'];

        $filename=$_FILES["images"]["name"];
        $tempname=$_FILES["images"]["tmp_name"];
        $folder="/dashboard/bakery/images/category/$filename";
        
        if($filename!=""){
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
                    $fname=$filename;
                }
            }
            $cate=new category($name,$des,$fname);
            $cate=category::update($cate,$id);
            header("Location: ../index.php?action=category");
        }   
        else{
            $cate=category::update_without_image($name,$des,$id);
            header("Location: ../index.php?action=category");
        } 
        
    }

?>