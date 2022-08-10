<?php
    if(isset($_SESSION['EmpID']))
    unset($_SESSION['EmpID']);
    session_destroy();
    echo "<script type='text/javascript'>document.location='login.php';</script>";
?>