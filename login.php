<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "database";

$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Pripojenie zlyhalo: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE users_email = '$email'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashedPasswordInDatabase = $row['users_password'];

    if (password_verify($password, $hashedPasswordInDatabase)) {
        //$_SESSION['successMessage'] = "Úspešné prihlásenie! Vitajte, " . $username . "!";
        session_start();
        $username = $row['users_name'];
        $email = $row['users_email'];

        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        header("Location: html/main.php");
    } else {
        echo "Nesprávne prihlasovacie údaje.";
    }
}

$conn->close();