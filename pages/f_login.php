<?php
include "../public/config/connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // SQL query to fetch user from the database
    $sql = "SELECT * FROM `user` WHERE username = '$username' AND password = '$password'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        session_start();
        $_SESSION["username"] = $username;
        echo '<script>alert("Login berhasil"); window.location.href = "../index.php";</script>';
        exit();
    } else {
        // Login failed
        echo '<script>alert("Invalid username or password"); window.location.href = "../index.php";</script>';
    }
}

$connect->close();