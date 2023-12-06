<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "database";

$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Pripojenie zlyhalo: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    session_start();

    $userName = $_POST["userName"];
    $email = $_POST["email"];
    $password = $_POST['password'];
    $newPassword = $_POST['newPassword'];
    $maxLength = 128;

    $queryUser = "SELECT * FROM users WHERE users_email= '$email'";
    $result = mysqli_query($conn, $queryUser);

    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword= $row['users_password'];

        if (password_verify($password, $hashedPassword)) {
            $userId = $row['users_id'];
            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            if (strlen($userName) > $maxLength || strlen($newPassword) > $maxLength){
                header("Location: html/change.php");
                exit();
            }
            $queryUpdate = "UPDATE users SET users_name = '$userName', users_password = '$newPassword' WHERE users_id = $userId";
            if(mysqli_query($conn, $queryUpdate)) {
                header("location: html/main.php");
            } else {
                header("location: html/change.php");
            }
        }
        header("location: html/change.php");
    }
}
