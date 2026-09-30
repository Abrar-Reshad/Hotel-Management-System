<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amenities</title>
    <link rel="stylesheet" href="room_View.css">
</head>

<body>
    <div class="container">
        <h2>Room List</h2>
        <table>
            <thead>
                <tr>
                    <th>Room no</th>
                    <th>Floor</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                include('../admin/index.php');
                $sql = "SELECT Room_no,Floor,Status FROM room";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>{$row['Room_no']}</td>
                        <td>{$row['Floor']}</td>
                        <td>{$row['Status']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No room found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
