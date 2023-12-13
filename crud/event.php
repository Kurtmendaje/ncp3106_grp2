<?php
	$eventName = $_POST['eventName'];
	$eventDescription = $_POST['eventDescription'];
	$eventType = $_POST['eventType'];
	$date = $_POST['date'];
	$startTime = $_POST['startTime'];
	$endTime = $_POST['endTime'];
    $registrationFee = $_POST['registrationFee'];
    $venue = $_POST['venue'];
    $office = $_POST['office'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into events(eventName, eventDescription, eventType, date, startTime, endTime, registrationFee, venue, office) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssiiisss", $eventName, $eventDescription, $eventType, $date, $startTime, $endTime, $registrationFee, $venue, $office);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Process form data here
			
			// Redirect back to the HTML page
			header("Location: manage.html");
			exit();
		}

	}
?>