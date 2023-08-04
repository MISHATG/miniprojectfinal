<?php 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con = mysqli_connect('localhost','root','','swiss_collection');
    if(!$con)
    {
        echo 'please check your Database connection';
    }

?>