<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'test');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Initialize $searchResult variable
$searchResult = "";

if (isset($_POST['search'])) {
    $studentNumber = $mysqli->real_escape_string($_POST['studentnumber']);
    $sql = "SELECT * FROM register WHERE studentNumber = '$studentNumber';";
    $result = $mysqli->query($sql);

    if ($result) {
        $resultCheck = $result->num_rows;

        if ($resultCheck > 0) {
            while ($row = $result->fetch_assoc()) {
                $searchResult .= $row['lastName'] . ', ' . $row['firstName'] . "<br>";
            }
        } else {
            $searchResult = "No records found.";
        }
    } else {
        // Handle query error
        $searchResult = "Query error: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    <style>
        .form {
            position: absolute;
            right: 425px;
            top: 250px;
        }

        body {
            font-family: Poppins;
            color: #cd8f2b;
        }

        .card {
            margin-left: 100vh;
            position: absolute;
            right: 0%;
            border-right: 2px solid black;
            border-left: 2px solid black;
        }

        .search-results {
            position: absolute;
            left: 20px;
            top: 80px;
            color: #D2B68A;
            width: 200px;
        }
    </style>
</head>

<body>
    <div class="card" style="width: 70vh; height: 100vh; background-color: #222D52; ">

        <form class="form" method="post" action="">
            <!-- Your form fields go here -->
            <label for="studentnumber" style="position: absolute; left: 20px; top: 0px; width: 150px;">Student Number:</label>
            <input style="position: absolute; left: 20px; top: 40px; border: 2px solid; border-radius: 10px; border: 2px solid #D2B68A; width: 200px;" type="number" name="studentnumber" placeholder="Enter Student Number" />
            <input type="submit" name="search" value="Search" style="position: absolute; left: 230px; top: 40px; border: 2px solid; border-radius: 10px; border: 2px solid #D2B68A; width: 100px;">
            <br><br>

            <!-- Display search results below the input -->
            <div class="search-results">
                <?php echo $searchResult; ?>
            </div>
        </form>

        <form class="form" action="attendees.html" method="post">
            <button style="position: absolute; left: 15px; top: 150px; width: 320px; height: 50px; border-radius: 10px; border: 2px solid #D2B68A; background: #222D52; color: #D2B68A;" type="submit" value="manageEvents" href="">View attendees</button>
            <br><br>
        </form>
        <form class="form" action="tite.html" method="post">
            <button style="position: absolute; left: 15px; top: 220px; width: 320px; height: 50px; border-radius: 10px; border: 2px solid #D2B68A; background: #222D52; color: #D2B68A;" type="submit" value="logout" href="">Add student</button>
        </form>

    </div>
</body>

</html>
