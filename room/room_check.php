<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input
$room_type = $_POST['room_type'];
$num_rooms = $_POST['num_rooms'];

// Debug: Print user input
echo "Room Type: $room_type<br>";
echo "Number of Rooms: $num_rooms<br>";

// Find roomtype_id for the selected room type
$sql = "SELECT roomtype_id, price FROM room_type WHERE roomtype = '$room_type'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $roomtype_id = $row['roomtype_id'];
    $price = $row['price'];

    // Debug: Print roomtype_id
    echo "Room Type ID: $roomtype_id<br>";

    // Check for available rooms
    $sql = "SELECT room_no FROM room WHERE roomtype_id = $roomtype_id AND status = 'available' LIMIT $num_rooms";
    $result = $conn->query($sql);
    $available_rooms = [];

    if ($result->num_rows >= $num_rooms) {
        while ($row = $result->fetch_assoc()) {
            $available_rooms[] = $row['room_no'];
        }

        // Calculate total cost
        $total_cost = $price * $num_rooms;
        $room_nos = implode(",", $available_rooms);

        // Redirect to registration form with room type, price, total cost, and room numbers
        header("Location: ../admin/index.html?room_type=$room_type&price=$price&total_cost=$total_cost&room_nos=$room_nos");
        exit(); // Terminate the script after redirection
    } else {
        // Display message and redirect to home screen
        echo "<script>alert('Sorry, no rooms available.'); window.location.href='../index.html';</script>";
    }
} else {
    // Invalid room type
    echo "Invalid room type";
}

$conn->close();
?>
