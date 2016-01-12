<?php

// Connect to database
$con = mysqli_connect("localhost","root","root","webleads");


// Gets the email value from the sendEmail ajax post
$email = $_POST['email'];



if (isset($email)) { // Check to see if the email is set.

	global $name, $email, $con; // Call global variables into function.

	$checkQry = "SELECT * FROM webtoleads WHERE email = '" . $email . "'"; // Qry to check to see if email exists in 'webtoleads' table

	$check = mysqli_query($con, $checkQry); // Send the query and store the results in $check

	if (mysqli_num_rows($check) > 0) { // Count how many rows the email appears in $check

		updateQry($email); // If the email is present, call updateQry function

	} else {

		insertQry($email); // If the email is not present, call inseryQry function
		
	}

}

function updateQry($email) {

	global $con;

	$updateQry = "UPDATE webtoleads SET submitted = submitted + 1 WHERE email = '" . $email . "'";

	mysqli_query($con, $updateQry);

	createCookie($email);

}

function insertQry($email) {

	global $con;

	$expiry = time() + (365 * 24 * 60 * 60);

	$insertQry = "INSERT INTO webtoleads (email) VALUES ('". $email ."')" ;

	mysqli_query($con, $insertQry);

	createCookie($email);

}

function createCookie($email) {

	global $con;

	$selectQry = "SELECT * FROM webtoleads WHERE email = '" . $email . "'"; // Get the user's record from the db

	$data = mysqli_query($con, $selectQry);

	$dataArray = mysqli_fetch_assoc($data);

	$expiry = time() + (365 * 24 * 60 * 60);

	$value =  array(
		"id" => $dataArray["id"],
		"email" => $dataArray["email"],
		"submitted" => $dataArray["submitted"]
	);

	setcookie("TestCookie", json_encode($value), $expiry);

}

?>