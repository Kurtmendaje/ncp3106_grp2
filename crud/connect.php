<?php
	$studentNumber = $_POST['studentNumber'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$yearLevel = $_POST['yearLevel'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(studentNumber, firstName, lastName, gender, email, yearLevel) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("isssss", $studentNumber, $firstName, $lastName, $gender, $email,  $yearLevel);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();

	}
?>