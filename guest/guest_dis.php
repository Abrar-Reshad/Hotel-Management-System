<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Courses</title>
    <link rel="stylesheet" href="guest_dis.css">
</head>

<body>
    <div class="container">
        <h2>Guest List</h2>
        <table>
            <thead>
                <tr>
                    <th>Guest ID</th>
                    <th>NID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile no</th>
                    <th>Check in Time</th>
                    <th>Check out Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                include('../admin/index.php');
                $sql = "SELECT * FROM guest";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>{$row['Guest_id']}</td>
                        <td>{$row['NID']}</td>
                        <td>{$row['First_name']}</td>
                        <td>{$row['Last_name']}</td>
                        <td>{$row['Mobile_no']}</td>
                        <td>{$row['Check_in_time']}</td>
                        <td>{$row['Check_out_time']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No Guest found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
