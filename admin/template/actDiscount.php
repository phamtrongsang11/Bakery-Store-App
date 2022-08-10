<?php 
    include_once("../class/discount.php");
    if(isset($_POST['add'])&&isset($_POST['name'])){
        $name=$_POST['name'];
        $datefrom=$_POST['datefrom'];
        $dateto=$_POST['dateto'];

        echo $datefrom;
        
        $filename=$_FILES["images"]["name"];
        $tempname=$_FILES["images"]["tmp_name"];
        $folder="/dashboard/laptop/images/discount/$filename";
        
        $maxsize=16777216;
        $allowtypes=array('jpg','png');
        $filetype=pathinfo($folder,PATHINFO_EXTENSION);
        $allow=1;
        if (!in_array($filetype,$allowtypes))
        {
            echo "your's type file must be jpg, png";
            $allow=0;
        }

        if($_FILES["images"]["size"]>=$maxsize){
            echo "can't upload file larger than 2mb";
            $allow=0;
        }

        $fname="";
        if($allow==1){
            if (!move_uploaded_file($tempname,$_SERVER['DOCUMENT_ROOT'].$folder)){
                echo "Failed to upload image";
            }
            else{
                $fname=$filename;
            }
        }
        $dis=new discount($name,$datefrom,$dateto,$fname);
        discount::insert($dis);
        header("Location:../index.php?action=discount");
    }

    else if(isset($_POST['edit'])&&isset($_GET['id'])){
        $id=$_GET['id'];
        $name=$_POST['name'];
        $datefrom=$_POST['datefrom'];
        $dateto=$_POST['dateto'];
        echo $datefrom;
        
        $filename=$_FILES["images"]["name"];
        $tempname=$_FILES["images"]["tmp_name"];
        $folder="/dashboard/vegetable/images/discount/$filename";
        
        if($filename!=""){
            $maxsize=16777216;
            $allowtypes=array('jpg','png');
            $filetype=pathinfo($folder,PATHINFO_EXTENSION);
            $allow=1;
            if (!in_array($filetype,$allowtypes))
            {
                echo "your's type file must be jpg, png";
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
            $dis=new discount($name,$timefrom,$timeto,$fname);
            discount::update($dis,$id);
        }
        else
            discount::update_withoutImg($name,$datefrom,$dateto,$id);
        header("Location:../index.php?action=discount");
    }


?>