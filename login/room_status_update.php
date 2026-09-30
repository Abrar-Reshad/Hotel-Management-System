<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Room Status</title>
    <link rel="stylesheet" href="status_update.css">
</head>
<body>
    <h1>Update Room Status</h1>
    <form action="update_status.php" method="post">
        <div id="roomsContainer">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "project";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT Room_no, Floor, Status FROM room";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="room">';
                        echo '<p>Room No: ' . $row['Room_no'] . ', Floor: ' . $row['Floor'] . ', Status: ' . $row['Status'] . '</p>';
                        echo '<input type="hidden" name="Room_no[]" value="' . $row['Room_no'] . '">';
                        echo '<select name="Status[]">';
                        echo '<option value="Available"' . ($row['Status'] == 'Available' ? ' selected' : '') . '>Available</option>';
                        echo '<option value="Booked"' . ($row['Status'] == 'Booked' ? ' selected' : '') . '>Booked</option>';
                        echo '</select>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No rooms found.</p>';
                }

                $conn->close();
            ?>
        </div>
        <button type="submit">Update Status</button>
    </form>
</body>
</html>
