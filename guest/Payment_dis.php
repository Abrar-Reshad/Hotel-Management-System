<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amenities</title>
    <link rel="stylesheet" href="payment_dis.css">
</head>

<body>
    <div class="container">
        <h2>Payment List</h2>
        <table>
            <thead>
                <tr>
                    <th>Guest Name</th>
                    <th>Room Rate</th>
                    <th>Amenities Rate</th>
                    <th>Food Rate</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                include('../admin/index.php');
                $sql = "SELECT CONCAT(First_name, ' ', Last_name) AS Name,Room_rate,Amenities_rate,Food_rate,Total_Bill FROM payment NATURAL JOIN guest;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>{$row['Name']}</td>
                        <td>{$row['Room_rate']}</td>
                        <td>{$row['Amenities_rate']}</td>
                        <td>{$row['Food_rate']}</td>
                        <td>{$row['Total_Bill']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No payment found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
