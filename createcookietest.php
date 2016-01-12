<?php

// Connect to database
$con = mysqli_connect("localhost","root","root","webleads");

function createCookie($email) {

		global $con;

		$selectQry = "SELECT * FROM webtoleads WHERE email = '" . $email . "'"; // Get the user's record from the db


		$data = mysqli_query($con, $selectQry);

		$dataArray = mysqli_fetch_assoc($data);

		// echo $dataArray["id"];

		$expiry = time() + (365 * 24 * 60 * 60);

		$value =  array(
		"id" => $dataArray["id"],
		"email" => $dataArray["email"],
		);

		setcookie("TestCookie", json_encode($value), $expiry);

}

createCookie("test2@test.com");


?>

