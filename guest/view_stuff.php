<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amenities</title>
    <link rel="stylesheet" href="view_stufff.css">
</head>

<body>
    <div class="container">
        <h2>Stuff List</h2>
        <table>
            <thead>
                <tr>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Mobile no</th>
                    
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                include('../admin/index.php');
                $sql = "SELECT * FROM staff";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>{$row['Staff_id']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['Location']}</td>
                        <td>{$row['Mobile_no']}</td>
                        <td>{$row['Title']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No stuff found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
