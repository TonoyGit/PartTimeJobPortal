<?php
session_start();
require_once("../db.php");

//if user clicked update profile button
if(isset($_POST)) {

	//Escape Special Characters
	$firstname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lname']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$district = mysqli_real_escape_string($conn, $_POST['district']);
	$division = mysqli_real_escape_string($conn, $_POST['division']);
	$contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
	$qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
	$stream = mysqli_real_escape_string($conn, $_POST['stream']);
	$passingyear = mysqli_real_escape_string($conn, $_POST['passingyear']);
	$dob = mysqli_real_escape_string($conn, $_POST['dob']);
	$age = mysqli_real_escape_string($conn, $_POST['age']);
	$designation = mysqli_real_escape_string($conn, $_POST['designation']);
	 

	//Update Query
	$sql = "UPDATE jobseeker SET firstname='$firstname', lastname='$lastname', address='$address', district='$district', division='$division', contactno='$contactno', qualification='$qualification', stream='$stream', passingyear='$passingyear', dob='$dob', age='$age', designation='$designation'  WHERE id_user='$_SESSION[id_user]'";

	if($conn->query($sql) === TRUE) {
		header("Location: dashboard.php");
		exit();
	} else {
		//If data failed to insert then show that error.
		echo "Error ". $sql . "<br>" . $conn->error;
	}

	$conn->close();

} else {
	header("Location: dashboard.php");
	exit();
}