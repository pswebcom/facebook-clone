
<?php 

if(isset($_POST['login_btn'])){

	$email = filter_var($_POST['login_email'],FILTER_SANITIZE_EMAIL);//sanitize. email

	$_SESSION['login_email'] = $email;

	$password = md5($_POST['login-password']);

	echo $password;


	$check_db_query = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'");
	$result_rows= mysqli_num_rows($check_db_query);

	if($result_rows==1){

		//access results from query and store it in $row
		$row = mysqli_fetch_array($check_db_query); 


		$username = $row['username'];

		

		$_SESSION['username'] = $username;

		header("Location:index.php");

	}

	else{
		array_push($error_array,"Email or Password was incorrect<br>");
	}
}

 ?>