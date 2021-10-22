<?php

$name = 'localhost';
$username = 'root';
$password = "";
$database_name = "test_db";
 

$conn = mysqli_connect($name,$username,$password,$database_name);

if(!$conn){
    echo "Connection failed";
}

?>