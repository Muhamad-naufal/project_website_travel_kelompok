<?php
include "../public/config/connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    // SQL query to fetch user from the database
    $sql = "SELECT * FROM `admin` WHERE username_admin = '$username' AND password = '$password'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        session_start();
        $_SESSION["username_admin"] = $username;
        echo '<script>alert("Login berhasil"); window.location.href = "data.php";</script>';
        exit();
    } else {
        // Login failed
        echo '<script>alert("Invalid username or password"); window.location.href = "login.php";</script>';
    }
}

$connect->close();
