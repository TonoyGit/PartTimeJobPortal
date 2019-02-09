<?php
session_start();
require_once("db.php");

//If user clicked register button
if(isset($_POST)) {

	//Escape Special Characters In String First
	$companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
	$division = mysqli_real_escape_string($conn, $_POST['division']);
	$district = mysqli_real_escape_string($conn, $_POST['district']);
	$contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
	$website = mysqli_real_escape_string($conn, $_POST['website']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));

	//sql query to check if email already exists or not
	$sql = "SELECT email FROM company WHERE email='$email'";
	$result = $conn->query($sql);

	if($result->num_rows == 0) {

		$sql = "INSERT INTO company(companyname, division, district, contactno, website, email, password) VALUES ('$companyname', '$division', '$district', '$contactno', '$website', '$email', '$password')";

		if($conn->query($sql)===TRUE) {
			$_SESSION['registerCompleted'] = true;
			header("Location: company-login.php");
			exit();
		} else {
			//If data failed to insert then show that error.
			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else {
		$_SESSION['registerError'] = true;
		header("Location: company-register.php");
		exit();
	}

	$conn->close();

} else {
	header("Location: company-register.php");
	exit();
}