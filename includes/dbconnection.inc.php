<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "blog";

$conn = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
?>