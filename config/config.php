<?php 
ob_start();//TURNS ON OUTPUT BUFFER
session_start();

$timezone = date_default_timezone_set("America/Toronto");

$conn = mysqli_connect('localhost', 'ps', 'ps', 'social');
if (mysqli_connect_errno()) {
    echo 'Failed to connect-------------: ' . mysqli_connect_errno();
}


 ?>