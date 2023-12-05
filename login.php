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
    $username = $row['users_name'];

    if (password_verify($password, $hashedPasswordInDatabase)) {
        //$_SESSION['successMessage'] = "Úspešné prihlásenie! Vitajte, " . $username . "!";
        echo "Úspešné prihlásenie! Vitajte, " . $username . "!";

        header("Location: html/main.html");
    } else {
        echo "Nesprávne prihlasovacie údaje.";
    }
}

$conn->close();