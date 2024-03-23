<?php

    $errorconn = '';

    $connections = mysqli_connect('localhost:3307','root','','kkk');

    if(mysqli_connect_error()){
        $errorconn = "Cant connect: " . mysqli_connect_error();
    }else{
        $errorconn ='Connected to database!';
    }
    
?>