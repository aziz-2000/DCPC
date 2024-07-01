<?php
// Replace with your authentication logic
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Example: Hardcoded check for demo purposes
if ($username === 'aziz' && $password === 'Oman@12345') {
    // Start the session
    session_start();

    // Set session variables
    $_SESSION['username'] = $username;

    // Redirect to home page after successful login
    header('Location: home.php');
    exit;
} else {
    // Redirect back to login page with error
    header('Location: index.php');
    exit;
}
?>
