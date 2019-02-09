<?php
session_start();
//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

//If jobseeker clicked login button 
if(isset($_POST)) {

	//Escape Special Characters in String
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));
    //sql query to check user login
	$sql = "SELECT id_user, firstname, lastname, email FROM jobseeker WHERE email='$email' AND password='$password'";
	$result = $conn->query($sql);
    //if user table has this login details
	if($result->num_rows > 0) {
		//output data
		while($row = $result->fetch_assoc()) {
			//Set some session variables for easy reference
			$_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['id_user'] = $row['id_user'];
			header("Location: jobseeker/dashboard.php");
			exit();
		}
 	} else {
 		//if no matching record found in user table then redirect them back to login page
 		$_SESSION['loginError'] = $conn->error;
 		header("Location: login.php");
		exit();
 	}

 	$conn->close();

} else {
	//redirect them back to login page
	header("Location: login.php");
	exit();
}