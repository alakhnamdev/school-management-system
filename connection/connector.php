<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "erpdb";
$con = mysqli_connect($hostname,$username,$password,$database);
if(!$con){
    die("Connecttion Failed! ".mysqli_connect_error());
}
?>