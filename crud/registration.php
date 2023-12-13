<?php

$StudentNumber = $_POST["StudentNumber"];
$LastName = $_POST["LastName"];
$FirstName = $_POST["FirstName"];
$Sex = $_POST["Sex"];
$Program = $_POST["Program"];
$YearLevel = $_POST["YearLevel"];
$UEemail = $_POST["UEemail"];

// Database Connection
$conn = new mysqli('localhost', 'root', '', 'mm_mysql');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO student_reg (StudentNumber, LastName, FirstName, Sex, Program, YearLevel, UEemail) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        die('Error in preparing statement: ' . $conn->error);
    }

    $stmt->bind_param("issssss", $StudentNumber, $LastName, $FirstName, $Sex, $Program, $YearLevel, $UEemail);

    if (!$stmt->execute()) {
        die('Error in executing statement: ' . $stmt->error);
    }

    echo "Registration Successful...8=D";
    
    $stmt->close();
    $conn->close();
}

?>
