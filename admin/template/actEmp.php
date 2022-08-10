<?php 
    include_once("../class/employee.php");
    if(isset($_POST['add'])&&isset($_POST['name'])){
        $name=$_POST['name'];
        $username=$_POST['username'];
        $pass=md5($_POST['pass']);
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $priv=$_POST['priv'];
        
        $filename=$_FILES["images"]["name"];
        $tempname=$_FILES["images"]["tmp_name"];
        $folder="/dashboard/bakery/images/employee/$filename";
        
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
        $emp=new employee($name,$username,$pass,$email,$phone,$address,$fname,$priv);
        employee::insert($emp);
        header("Location:../index.php?action=employee");
    }

    else if(isset($_POST['edit'])&&isset($_GET['id'])){
        $id=$_GET['id'];
        $name=$_POST['name'];
        $username=$_POST['username'];
        $pass=$_POST['pass'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $priv=$_POST['priv'];
        
        $filename=$_FILES["images"]["name"];
        $tempname=$_FILES["images"]["tmp_name"];
        $folder="/dashboard/bakery/images/employee/$filename";
        echo $folder;
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
            $emp=new employee($name,$username,$pass,$email,$phone,$address,$fname,$priv);
            employee::update($emp,$id);
        }
        else
            employee::update_WithoutImg($name,$username,$pass,$email,$phone,$address,$priv,$id);
        header("Location:../index.php?action=employee");
    }


?>