<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Card</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>



.form {
    position: absolute;
    right: 510px;
    top:400px;
}

body{
    font-family: Poppins;
    color:#D2B68A;
}

.card{
    margin-left: 10vh;
    position: absolute;
    right: 0%;
    border-right:2px solid black ;
    border-left:2px solid black ;
}

</style>
</head>

<body>
    <div class="card" style="width: 100vh; height: 100vh; background-color: #222D52; ">
        <h1 class="login" style="position: absolute; top: 50px; left: 260px; font-size: 40px;">Attendees</h1>



        <div class="container">
            <form action ="" method = "POST">
                <select id="program" name="program">
                    <option value="cpe">Computer Engineering</option>
                    <option value="ce">Civil Engineering</option>
                    <option value="me">Mechanical Engineering</option>
                    <option value="ee">Electrical Engineering</option>
                </select>
            </form>
            <table>
                <tr>
                    <th>Student Number </th>
                    <th>First Name </th>
                    <th>Last Name </th>
                    <th>Gender </th>
                    <th>e-mail </th>
                    <th>Year Level </th>
                    <th>Program </th>
                </tr>
            </table>





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

            if(isset($_POST['program'])){
                $program = $_POST['program']
                $query = "SELECT * FROM 'Register' WHERE program='$program' ";
                $query_run = mysqli_query($connection,$query);

                while($row = mysqli_fetch_array($query_run))
                {
                    ?>
                    <tr>
                        <td><?php echo $row['studentNumber']; ?> </td>
                        <td><?php echo $row['firstName']; ?> </td>
                        <td><?php echo $row['lastName']; ?> </td>
                        <td><?php echo $row['gender']; ?> </td>
                        <td><?php echo $row['email']; ?> </td>
                        <td><?php echo $row['yearLevel']; ?> </td>
                        <td><?php echo $row['program']; ?> </td>
                    </tr>
                    <?php
                }
            }
            ?>



            

        </div>

        

        
        <form class="form" action="manage.html" method="post">
            <button style="position: absolute; left: 0px; top: 170px; width: 320px; height: 50px; border-radius: 10px; border: 2px solid #D2B68A; background: #222D52; color: #D2B68A;" type="submit" value="manageEvents" href="">Manage Event</button>
            <br><br>
        </form>
        <form class="form" action="login.html" method="post">

            <button style="position: absolute; left: 0px; top: 240px; width: 320px; height: 50px; border-radius: 10px; border: 2px solid #D2B68A; background: #222D52; color: #D2B68A;" type="submit" value="logout" href="">Logout</button>
        </form>
    </div>
</body>

</html>