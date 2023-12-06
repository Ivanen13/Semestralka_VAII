<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "database";

$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    header("location: html/main.php");
}


    session_start();

    $email = $_POST["email"];
    $password = $_POST['password'];

    $queryUser = "SELECT * FROM users WHERE users_email= '$email'";
    $result = mysqli_query($conn, $queryUser);

    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword= $row['users_password'];

        if (password_verify($password, $hashedPassword)) {
            $queryUser = "DELETE FROM users WHERE users_email = '$email' AND users_password = '$hashedPassword'";

            if(mysqli_query($conn, $queryUser)) {
                $_SESSION['logged_in'] = false;
                header("location: html/main.php");
            } else {
                header("location: html/main.php");
            }
        }
    }
    header("location: html/delete.php");
