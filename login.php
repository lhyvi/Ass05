<?php
session_start();

// Predefined credentials
$predefinedUsername = "admin";
$predefinedPassword = "password";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    // Validate credentials
    if ($username == $predefinedUsername && $password == $predefinedPassword) {
        // Successful login, continue to dashboard
		$_SESSION['uname'] = $username;
		header('Location: higherlower.php');
		exit();
    } else {
        // Redirect back to login page
        header('Location: index.php?error=Wrong Credentials');
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>