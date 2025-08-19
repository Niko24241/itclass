<?php

$conn = new mysqli("localhost", "root", "", "itclass");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM student WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    session_start();
    $_SESSION['username'] = $username;
    header("Location: welcome.html");
    exit();
} else {
    echo "Login failed. Invalid username or password.";
}   

mysqli_close($conn);
?>