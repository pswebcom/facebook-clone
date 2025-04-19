<?php
require 'config/config.php';

//it's set in login form when not failed
if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
}
else{
    header("Location: register.php");
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>

<div class="top-bar">
    <div class="logo">
        <a href="index.php">Swirlfeed</a>
    </div>

    <nav>
        <a href="#"><i class="fa fa-home fa-lg"></i></a>
        <a href="#"><i class="fa fa-envelope fa-lg"></i></a>
        <a href="#"><i class="fa fa-bell fa-lg"></i></a>
        <a href="#"><i class="fa fa-users fa-lg"></i></a>
        <a href="#"><i class="fa fa-cog fa-lg"></i></a>
    </nav>
</div>


</body>
</html>
