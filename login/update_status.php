<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$roomNos = $_POST['Room_no'];
$statuses = $_POST['Status'];

for ($i = 0; $i < count($roomNos); $i++) {
    $room_no = $roomNos[$i];
    $status = $statuses[$i];
    $sql = "UPDATE room SET Status = '$status' WHERE Room_no = '$room_no'";
    $conn->query($sql);
}

$conn->close();
header('Location: dashboard.html?status=success');
?>
