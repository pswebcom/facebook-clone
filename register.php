<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>


<!doctype html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Welcome to Swirlfeed</title>

    <link rel="stylesheet" type="text/css" href="assets/css/Register_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>


<div class="wrapper-register">
    <div class="login-box">
        <form action="register.php" method="POST">
            <input type="email" name="login_email" placeholder="Email Address" value="<?php
            if (isset($_SESSION['login_email'])) {
                echo($_SESSION['login_email']);
            }
            ?>" required/><br>


            <input type="password" name="login-password" placeholder="Password"/><br>
            <input type="submit" name="login_btn" value="login"/>

            <?php if (in_array('Email or Password was incorrect<br>', $error_array)) echo "Email or Password was incorrect<br>";

            ?>
        </form>

        <form action='register.php' method='POST'>
            <input type='text' name='reg_fname' placeholder='First Name' value="<?php
            if (isset($_SESSION['reg_fname'])) {
                echo($_SESSION['reg_fname']);
            }
            ?>" required/>
            <br>
            <?php if (in_array('Firstname must be between 2 and 25 characters<br>', $error_array)) echo 'Firstname must be between 2 and 25 characters<br>';
            ?>

            <input type='text' name='reg_lname' placeholder='Last Name' value="<?php
            if (isset($_SESSION['reg_lname'])) {
                echo($_SESSION['reg_lname']);
            }
            ?>" required/>
            <br>
            <?php if (in_array('Lastname must be between 2 and 25 characters<br>', $error_array)) echo 'Lastname must be between 2 and 25 characters<br>';
            ?>
            <input type='email' name='reg_email' placeholder='Email' value="<?php
            if (isset($_SESSION['reg_email'])) {
                echo($_SESSION['reg_email']);
            }
            ?>" required/>
            <br>
            <input type='email' name='reg_email2' placeholder='Confirm Email' value="<?php
            if (isset($_SESSION['reg_email2'])) {
                echo($_SESSION['reg_email2']);
            }
            ?>" required/>
            <br>
            <?php

            if (in_array('Email already in use<br>', $error_array)) {
                echo 'Email already in use<br>';
            } else if (in_array('Invalid email format<br>', $error_array)) {
                echo 'Invalid email format<br>';
            } else if (in_array("Emails don't match<br>", $error_array)) {
                echo "Emails don't match<br>";
            }
            ?>
            <input type='password' name='reg_password' placeholder='Password' required/>
            <br>
            <input type='password' name='reg_password2' placeholder='Confirm Password' required/>
            <br>


            <?php
            if (in_array('Passwords do not match<br>', $error_array)) {
                echo 'Passwords do not match<br>';
            } else if (in_array('Password can only have english characters and numbers<br>', $error_array)) {
                echo 'Password can only have english characters and numbers<br>';
            } else if (in_array("Password  must be between 5 and 30 characters<br>", $error_array)) {
                echo "Password  must be between 5 and 30 characters<br>";
            }
            ?>

            <input type='submit' name='btn_register' value='Register'/>
            <?php if (in_array("<span style='color:#14c808;'>You are all set!Go ahead and login! </span><br>", $error_array)) {
                echo "<br><span style='color:#14c808;'>You are all set!Go ahead and login! </span><br>";
            }
            ?>
        </form>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</html>