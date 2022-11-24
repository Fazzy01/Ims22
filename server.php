<?php
session_start();

$server = mysqli_connect("localhost", "root", "", "ims22") or die("Connection error");

if(!$server){
    echo "Connection to db failed..";
}


?>