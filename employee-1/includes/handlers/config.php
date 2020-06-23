<?php

    $timezone= date_default_timezone_set("Asia/Kolkata");  // setting time zone as user sign in requires date 
   // session_start();
    $con=mysqli_connect("localhost","root","","employeemanagement");    // mysql -u root -p -h 127.0.0.1 access from shell 
    $date = date("Y-m-d");
    $ThisDate = date("d-m-Y", strtotime($date));
    if(mysqli_connect_errno()){
        echo "Failed to connect " . mysqli_connect_errno();
    }
?>