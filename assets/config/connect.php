<?php

$username = "root";
$password = "";
$host = "localhost";

$is_connect = mysqli_connect($host, $username, $password);

if($is_connect){
    mysqli_select_db($is_connect, "epres");
}else{
    echo 'gagl';
}