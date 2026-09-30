<?php
// Simulate authentication (replace this with actual authentication logic)
$loginConfigPath = dirname(__DIR__) . '/.env';
$loginConfig = is_file($loginConfigPath) ? parse_ini_file($loginConfigPath) : [];
$loginConfig = is_array($loginConfig) ? $loginConfig : [];
$valid_username = $loginConfig['HOTEL_ADMIN_USERNAME'] ?? getenv('HOTEL_ADMIN_USERNAME');
$valid_password = $loginConfig['HOTEL_ADMIN_PASSWORD'] ?? getenv('HOTEL_ADMIN_PASSWORD');

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Check if username and password are correct
if ($valid_username !== false && $valid_username !== '' &&
    $valid_password !== false && $valid_password !== '' &&
    $username === $valid_username && $password === $valid_password) {
    echo "Login successful. Welcome, $username!";
    header("Location:dashboard.html");
} else {
    echo "Invalid username or password. Please try again.";
}
?>
