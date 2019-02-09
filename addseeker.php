<?php
session_start();
require_once("db.php");

//If user clicked register button
if(isset($_POST)) {

	//Escape Special Characters In String First
	$firstname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));
    //sql query to check if email already exists or not
	$sql = "SELECT email FROM jobseeker WHERE email='$email'";
	$result = $conn->query($sql);

	//if email not found then we can insert new data
	if($result->num_rows == 0) {

		$sql = "INSERT INTO jobseeker(firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";

		if($conn->query($sql)===TRUE) {
			$_SESSION['registerCompleted'] = true;
			header("Location: login.php");
			exit();
		} else {
			//If data failed to insert then show that error.
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else {
		//if email found in database then show email already exists error.
		$_SESSION['registerError'] = true;
		header("Location: register.php");
		exit();
	}

	$conn->close();

} else {
	//redirect them back to register page if they didn't click register button
	header("Location: register.php");
	exit();
}