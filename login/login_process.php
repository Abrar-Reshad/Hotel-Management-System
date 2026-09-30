<?php
// Simulate authentication (replace this with actual authentication logic)
$valid_username = getenv('HOTEL_ADMIN_USERNAME');
$valid_password = getenv('HOTEL_ADMIN_PASSWORD');

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Check if username and password are correct
if ($valid_username !== false && $valid_password !== false &&
    $username === $valid_username && $password === $valid_password) {
    echo "Login successful. Welcome, $username!";
    header("Location:dashboard.html");
} else {
    echo "Invalid username or password. Please try again.";
}
?>
