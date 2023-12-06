<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "database";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
    die("Connection error: " + mysqli_connect_error());
}

$userName = $_POST['userName'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordRepeat = $_POST['passwordRepeat'];
$maxLength = 128;

if ($password !== $passwordRepeat) {
    header("Location: html/registration.html");
    exit();
}

$sql = "SELECT * FROM users WHERE  users_email= '$email' OR users_name = '$userName'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: html/registration.html");
    exit();
}

if (strlen($userName) > $maxLength || strlen($email) > $maxLength || strlen($password) > $maxLength){
    header("Location: html/registration.html");
    exit();
}

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$sql = "INSERT INTO users (users_name, users_email, users_password) VALUES ('$userName', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo ("Registracia prebiehla uspesne");
    header("location: html/main.php");
} else {
    echo ("Nieco sa pokazilo");
    header("location: ../html/registration.html");
}

$conn->close();
