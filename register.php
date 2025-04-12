<?php

$conn = mysqli_connect('localhost', 'ps', 'ps', 'social');
if (mysqli_connect_errno()) {
    echo 'Failed to connect-------------: ' . mysqli_connect_errno();
}


//declaring variables to prevent errors
$fname = ""; //first name
$lname = ""; //last name
$email=""; //email
$email2=""; //email2
$password=""; //password
$password2=""; //password2
$date=""; //date
$error_array=""; //holds error

if(isset($_POST['btn_register'])){

    //firstname
    $fname = strip_tags($_POST['reg_fname']);//remove html tags
    $fname=str_replace(' ','',$fname);//remove spaces
    $fname = ucfirst(strtolower($fname));


    //lastname
    $lname = strip_tags($_POST['reg_lname']);//remove html tags
    $lname=str_replace(' ','',$lname);//remove spaces
    $lname = ucfirst(strtolower($lname));



    //email
    $email = strip_tags($_POST['reg_email']);//remove html tags
    $email=str_replace(' ','',$email);//remove spaces
    $email = ucfirst(strtolower($email));


    //email2
    $email2 = strip_tags($_POST['reg_email2']);//remove html tags
    $email2=str_replace(' ','',$email2);//remove spaces
    $email2 = ucfirst(strtolower($email2));


    //password
    $password = strip_tags($_POST['reg_password']);//remove html tags
    $password2 = strip_tags($_POST['reg_password2']);//remove html tags


    //date
    $date = date("y-m-d");//current date

    if($email==$email2){

        //check if email format is valid

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //$email=validated version of $email
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            //check if email already exsist

        }
        else{
          echo "Invalid email";
        }

    }
    else{
        echo "email dont match";
    }

}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Swirlfeed</title>
</head>

<body>

    <form action="register.php" method="POST">
        <input type="text" name="reg_fname" placeholder="First Name" required />
        <br>
        <input type="text" name="reg_lname" placeholder="Last Name" required />
        <br>
        <input type="email" name="reg_email" placeholder="Email" required />
        <br>
        <input type="email" name="reg_email2" placeholder="Confirm Email" required />
        <br>
        <input type="password" name="reg_password" placeholder="Password" required />
        <br>
        <input type="password" name="reg_password2" placeholder="Confirm Password" required />
        <br>
        <input type="submit" name="btn_register" value="Register" />
    </form>

</body>

</html>