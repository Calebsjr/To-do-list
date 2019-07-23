<?php

    $con = mysqli_connect("localhost", "root", "");
    if(!$con){
        die("unable to connect" .mysqli_error());
    }else{
        echo  "";
    }
    mysqli_select_db($con, "todo");
?>