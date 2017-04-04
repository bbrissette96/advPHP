<?php

$sqlHost = 'localhost';
$sqlUser = 'user';
$sqlPass = 'pass';

$conn =  new mysqli($sqlHost, $sqlUser, $sqlPass, 'phpadvclassspring2017') ;
if($conn->connect_errno){
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
else{
    echo "Database Shit Works";
}

?>