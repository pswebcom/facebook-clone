<?php
session_start();

$conn = mysqli_connect('localhost', 'ps', 'ps', 'social');
if (mysqli_connect_errno()) {
    echo 'Failed to connect-------------: ' . mysqli_connect_errno();
}

//declaring variables to prevent errors
$fname = '';
//first name
$lname = '';
//last name
$email = '';
//email
$email2 = '';
//email2
$password = '';
//password
$password2 = '';
//password2
$date = '';
//date
$error_array = [];
//holds errors

$username = "";


if (isset($_POST['btn_register'])) {

    //firstname
    $fname = strip_tags($_POST['reg_fname']);
    //remove html tags
    $fname = str_replace(' ', '', $fname);
    //remove spaces
    $fname = ucfirst(strtolower($fname));
    $_SESSION['reg_fname'] = $fname;

    //lastname
    $lname = strip_tags($_POST['reg_lname']);
    //remove html tags
    $lname = str_replace(' ', '', $lname);
    //remove spaces
    $lname = ucfirst(strtolower($lname));
    $_SESSION['reg_lname'] = $lname;

    //email
    $email = strip_tags($_POST['reg_email']);
    //remove html tags
    $email = str_replace(' ', '', $email);
    //remove spaces
    $email = ucfirst(strtolower($email));
    $_SESSION['reg_email'] = $email;

    //email2
    $email2 = strip_tags($_POST['reg_email2']);
    //remove html tags
    $email2 = str_replace(' ', '', $email2);
    //remove spaces
    $email2 = ucfirst(strtolower($email2));
    $_SESSION['reg_email2'] = $email;

    //password
    $password = strip_tags($_POST['reg_password']);
    //remove html tags
    $password2 = strip_tags($_POST['reg_password2']);
    //remove html tags

    //date
    $date = date('y-m-d');
    //current date
    if ($email == $email2) {

        //check if email format is valid
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //$email = validated version of $email
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            //check if email already exist in database
            $email_check = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");

            //count number of rows returned if email already exist, OW nothing will be returned
            $num_rows = mysqli_num_rows($email_check);
            if ($num_rows > 0) {
                //store in error array
                array_push($error_array, 'Email already in use<br>');
            }
        } else {
            array_push($error_array, 'Invalid email format<br>');
        }
    } else {
        array_push($error_array, "Emails don't match<br>");
    }

    //validate other fields
    if (strlen($fname) > 25 || strlen($fname) < 2) {
        array_push($error_array, 'Firstname must be between 2 and 25 characters<br>');
    }


    if (strlen($lname) > 25 || strlen($lname) < 2) {
        array_push($error_array, 'Lastname must be between 2 and 25 characters<br>');
    }

    if ($password != $password2) {
        array_push($error_array, 'Passwords do not match<br>');
    } else {
        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($error_array, 'Password can only have english characters and numbers<br>');
        }
    }

    if (strlen($password) > 30 || strlen($password) < 2) {
        array_push($error_array, 'Password  must be between 5 and 30 characters<br>');
    }


    //insert into database
    if (empty($error_array)) {

        //encrypt
        $password = md5($password);

        //generate unique username by concating firstname and lastname
        $username = strtolower($fname . " " . $lname);

        $check_username_query = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");


        $i = 0;
        //if username already exists add number to username
        while (mysqli_num_rows($check_username_query) != 0) {
            $i++;
            $username = $username . " " . $i;
        }


        //random profile picture on account creation
        $rand = rand(1, 2);

        if ($rand == 1) {
            $profile_pic = "assets/profile_pics/images/defaults/head_deep_blue";
        } else {
            $profile_pic = "assets/profile_pics/images/defaults/head_emerald.png";
        }

        $query = mysqli_query($conn,"INSERT INTO users VALUES(null,'$fname','$lname','$username','$email','$password','$date','$profile_pic','0','0','no','')");
    }

}
?>


<!doctype html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Welcome to Swirlfeed</title>
</head>

<body>

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
</form>
</body>

</html>