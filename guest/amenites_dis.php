<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amenities</title>
    <link rel="stylesheet" href="amenities_dis.css">
</head>

<body>
    <div class="container">
        <h2>Amenities List</h2>
        <table>
            <thead>
                <tr>
                    <th>Amenities ID</th>
                    <th>Service Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                include('../admin/index.php');
                $sql = "SELECT * FROM amenities";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>{$row['Amenities_id']}</td>
                        <td>{$row['Service_name']}</td>
                        <td>{$row['Price']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No amenities found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
