<?php
if(isset($_POST['studentnumber'])) {
    $studentnumber = $_POST['studentnumber'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        // Check if $studentnumber is not empty before inserting
        if (!empty($studentnumber)) {
            $stmt = $conn->prepare("INSERT INTO student (studentnumber) VALUES (?)");
            $stmt->bind_param("s", $studentnumber);
            
            // Execute the statement and check for success
            if ($stmt->execute()) {
                echo "Registration successfully...";
            } else {
                echo "Error: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            echo "Error: 'studentnumber' cannot be empty.";
        }

        $conn->close();
    }
} else {
    echo "Error: 'studentnumber' not found in POST data.";
}
?>
